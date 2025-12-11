<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\EventDefinitionsContract;

final class EventDefinitionsService implements EventDefinitionsContract
{
    /**
     * @api
     */
    public EventDefinitionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventDefinitionsRawService($client);
    }

    /**
     * @api
     *
     * Create a custom event definition.
     *
     * @param string $label Human readable label for the event. Used in HubSpot UI
     * @param list<array{
     *   label: string,
     *   type: string,
     *   description?: string,
     *   name?: string,
     *   options?: list<array{
     *     displayOrder: int,
     *     hidden: bool,
     *     label: string,
     *     value: string,
     *     description?: string,
     *   }>,
     * }> $propertyDefinitions List of custom properties on event
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $name Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     * @param string $primaryObject The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     *
     * @throws APIException
     */
    public function create(
        string $label,
        array $propertyDefinitions,
        ?string $description = null,
        ?string $name = null,
        ?string $primaryObject = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition {
        $params = Util::removeNulls(
            [
                'label' => $label,
                'propertyDefinitions' => $propertyDefinitions,
                'description' => $description,
                'name' => $name,
                'primaryObject' => $primaryObject,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific custom event definition by name.
     *
     * @param string $eventName the internal name of the custom event
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $label Human readable label for the event. Used in HubSpot UI
     *
     * @throws APIException
     */
    public function update(
        string $eventName,
        ?string $description = null,
        ?string $label = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition {
        $params = Util::removeNulls(
            ['description' => $description, 'label' => $label]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($eventName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve existing custom event definitions.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param string $searchString Characters in the event name that the user is searching for. This search is a naive “contains” search, no fuzzy matching is done.
     *
     * @return Page<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $includeProperties = null,
        ?int $limit = null,
        ?string $searchString = null,
        ?string $sortOrder = null,
        ?RequestOptions $requestOptions = null,
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
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a custom event definition by name.
     *
     * @param string $eventName the name of the event definition
     *
     * @throws APIException
     */
    public function delete(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($eventName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new property for an existing event definition.
     *
     * @param string $eventName the internal name of the custom event
     * @param string $label Human readable label for the property. Used in HubSpot UI
     * @param string $type The data type of the property. Can be one of the following: [string, number, enumeration, datetime]
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param string $name Internal property name, which must be used when referencing the property from the API
     * @param list<array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string,
     * }> $options A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @throws APIException
     */
    public function createProperty(
        string $eventName,
        string $label,
        string $type,
        ?string $description = null,
        ?string $name = null,
        ?array $options = null,
        ?RequestOptions $requestOptions = null,
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
        $response = $this->raw->createProperty($eventName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing property from a custom event definition.
     *
     * @param string $propertyName the internal name of the property to delete
     * @param string $eventName the internal name of the custom event
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        string $eventName,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['eventName' => $eventName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteProperty($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch a single custom event definition by name.
     *
     * @param string $eventName the internal name of the custom event
     *
     * @throws APIException
     */
    public function get(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($eventName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing property in a custom event definition.
     *
     * @param string $propertyName path param: The internal name of the property to update
     * @param string $eventName path param: The internal name of the custom event
     * @param string $description body param: A description of the property that will be shown as help text in HubSpot
     * @param string $label Body param: Human readable label for the property. Used in HubSpot UI
     * @param list<array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string,
     * }> $options Body param: A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        string $eventName,
        ?string $description = null,
        ?string $label = null,
        ?array $options = null,
        ?RequestOptions $requestOptions = null,
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
        $response = $this->raw->updateProperty($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
