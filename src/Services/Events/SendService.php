<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\Events\Send\ExternalBehavioralEventPropertyCreate;
use HubspotSDK\Events\Send\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Events\Send\ExternalObjectResolutionMappingRequest;
use HubspotSDK\Events\Send\OptionInput;
use HubspotSDK\Events\Send\Property;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\SendContract;

/**
 * @phpstan-import-type ExternalBehavioralEventPropertyCreateShape from \HubspotSDK\Events\Send\ExternalBehavioralEventPropertyCreate
 * @phpstan-import-type ExternalObjectResolutionMappingRequestShape from \HubspotSDK\Events\Send\ExternalObjectResolutionMappingRequest
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type OptionInputShape from \HubspotSDK\Events\Send\OptionInput
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
     * @param string $label human readable label for the event for display in HubSpot's UI
     * @param list<ExternalBehavioralEventPropertyCreate|ExternalBehavioralEventPropertyCreateShape> $propertyDefinitions List of custom properties on event
     * @param ExternalObjectResolutionMappingRequest|ExternalObjectResolutionMappingRequestShape $customMatchingID
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $name Internal event name, which must be used when referencing the event from the API. If a name is not supplied, one will be generated based on the label. The name does not include the `pe<PORTAL_ID>_` prefix used when sending event completions.
     * @param string $primaryObject The object type to associate this event to. Can be one of `CONTACT`, `COMPANY`, `DEAL`, `TICKET`. If no value is supplied, will default to `CONTACT`.
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
     * @param string $eventName The event's fully qualified name. This value (formatted as `pe{HubID}_{name}`) can be retrieved through the [event definitions API](https://developers.hubspot.com/docs/reference/api/analytics-and-events/custom-events/custom-event-definitions#get-%2Fevents%2Fv3%2Fevent-definitions) or in [HubSpot's UI](https://knowledge.hubspot.com/reports/create-custom-behavioral-events-with-the-code-wizard#find-internal-name).
     * @param array<string,string> $properties The event properties to update. Takes the format of key-value pairs (property internal name and property value). Learn more about [HubSpot's default event properties](https://developers.hubspot.com/docs/guides/api/analytics-and-events/custom-events/custom-event-definitions#hubspot-s-default-event-properties).
     * @param string $email The visitor's email address. Used for associating the event data with a CRM record.
     * @param string $objectID The ID of the record for which the event occurred (e.g., contact ID or visitor ID).
     * @param \DateTimeInterface $occurredAt The time when this event occurred. If this isn't set, the current time will be used.
     * @param string $utk The visitor's usertoken. Used for associating the event data with a CRM record.
     * @param string $uuid Include a universally unique identifier to assign a unique ID to the event occurrence. Can be useful for matching data between HubSpot and other external systems.
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
