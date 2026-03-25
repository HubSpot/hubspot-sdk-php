<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\Events\ExternalBehavioralEventPropertyCreate;
use HubspotSDK\Events\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Events\ExternalObjectResolutionMappingRequest;
use HubspotSDK\OptionInput;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\SendContract;

/**
 * @phpstan-import-type ExternalBehavioralEventPropertyCreateShape from \HubspotSDK\Events\ExternalBehavioralEventPropertyCreate
 * @phpstan-import-type ExternalObjectResolutionMappingRequestShape from \HubspotSDK\Events\ExternalObjectResolutionMappingRequest
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 */
final class SendService implements SendContract
{
    /**
     * @api
     */
    public SendRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SendRawService($client);
    }

    /**
     * @api
     *
     * @param string $label Human readable label for the event. Used in HubSpot UI
     * @param list<ExternalBehavioralEventPropertyCreate|ExternalBehavioralEventPropertyCreateShape> $propertyDefinitions List of custom properties on event
     * @param ExternalObjectResolutionMappingRequest|ExternalObjectResolutionMappingRequestShape $customMatchingID
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $name Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     * @param string $primaryObject The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createEventDefinition(
        bool $includeDefaultProperties,
        string $label,
        array $propertyDefinitions,
        ExternalObjectResolutionMappingRequest|array|null $customMatchingID = null,
        ?string $description = null,
        ?string $name = null,
        ?string $primaryObject = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition {
        $params = Util::removeNulls(
            [
                'includeDefaultProperties' => $includeDefaultProperties,
                'label' => $label,
                'propertyDefinitions' => $propertyDefinitions,
                'customMatchingID' => $customMatchingID,
                'description' => $description,
                'name' => $name,
                'primaryObject' => $primaryObject,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createEventDefinition(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $label Human readable label for the property. Used in HubSpot UI
     * @param string $type The data type of the property. Can be one of the following: [string, number, enumeration, datetime]
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param string $name Internal property name, which must be used when referencing the property from the API
     * @param list<OptionInput|OptionInputShape> $options A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createEventDefinitionProperty(
        string $eventName,
        string $label,
        string $type,
        ?string $description = null,
        ?string $name = null,
        ?array $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property {
        $params = Util::removeNulls(
            [
                'label' => $label,
                'type' => $type,
                'description' => $description,
                'name' => $name,
                'options' => $options,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createEventDefinitionProperty($eventName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteEventDefinition(
        string $eventName,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteEventDefinition($eventName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteEventDefinitionProperty(
        string $propertyName,
        string $eventName,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['eventName' => $eventName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteEventDefinitionProperty($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEventDefinition(
        string $eventName,
        RequestOptions|array|null $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEventDefinition($eventName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function listEventDefinitions(
        ?string $after = null,
        ?bool $includeProperties = null,
        ?int $limit = null,
        ?string $searchString = null,
        ?string $sortOrder = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'includeProperties' => $includeProperties,
                'limit' => $limit,
                'searchString' => $searchString,
                'sortOrder' => $sortOrder,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listEventDefinitions(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $eventName Internal name of the event-type to trigger
     * @param array<string,string> $properties Map of properties for the event in the format property internal name - property value
     * @param string $email Email of visitor
     * @param string $objectID The object id that this event occurred on. Could be a contact id or a visitor id.
     * @param \DateTimeInterface $occurredAt The time when this event occurred (if any). If this isn't set, the current time will be used
     * @param string $utk User token
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendEvent(
        string $eventName,
        array $properties,
        ?string $email = null,
        ?string $objectID = null,
        ?\DateTimeInterface $occurredAt = null,
        ?string $utk = null,
        ?string $uuid = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'eventName' => $eventName,
                'properties' => $properties,
                'email' => $email,
                'objectID' => $objectID,
                'occurredAt' => $occurredAt,
                'utk' => $utk,
                'uuid' => $uuid,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendEventBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendEventBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $label Human readable label for the event. Used in HubSpot UI
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateEventDefinition(
        string $eventName,
        ?string $description = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition {
        $params = Util::removeNulls(
            ['description' => $description, 'label' => $label]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateEventDefinition($eventName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param string $eventName Path param
     * @param string $description body param: A description of the property that will be shown as help text in HubSpot
     * @param string $label Body param: Human readable label for the property. Used in HubSpot UI
     * @param list<OptionInput|OptionInputShape> $options Body param: A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateEventDefinitionProperty(
        string $propertyName,
        string $eventName,
        ?string $description = null,
        ?string $label = null,
        ?array $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property {
        $params = Util::removeNulls(
            [
                'eventName' => $eventName,
                'description' => $description,
                'label' => $label,
                'options' => $options,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateEventDefinitionProperty($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
