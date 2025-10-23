<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\EventDefinitions\EventDefinitionCreateParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionCreatePropertyParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionDeletePropertyParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionListParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionUpdateParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionUpdatePropertyParams;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventPropertyCreate;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\OptionInput;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\EventDefinitionsContract;

use const HubspotSDK\Core\OMIT as omit;

final class EventDefinitionsService implements EventDefinitionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a custom event definition.
     *
     * @param string $label Human readable label for the event. Used in HubSpot UI
     * @param list<ExternalBehavioralEventPropertyCreate> $propertyDefinitions List of custom properties on event
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $name Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     * @param string $primaryObject The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     *
     * @throws APIException
     */
    public function create(
        $label,
        $propertyDefinitions,
        $description = omit,
        $name = omit,
        $primaryObject = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition {
        $params = [
            'label' => $label,
            'propertyDefinitions' => $propertyDefinitions,
            'description' => $description,
            'name' => $name,
            'primaryObject' => $primaryObject,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition {
        [$parsed, $options] = EventDefinitionCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'events/v3/event-definitions',
            body: (object) $parsed,
            options: $options,
            convert: ExternalBehavioralEventTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Update a specific custom event definition by name.
     *
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $label Human readable label for the event. Used in HubSpot UI
     *
     * @throws APIException
     */
    public function update(
        string $eventName,
        $description = omit,
        $label = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition {
        $params = ['description' => $description, 'label' => $label];

        return $this->updateRaw($eventName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $eventName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition {
        [$parsed, $options] = EventDefinitionUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['events/v3/event-definitions/%1$s', $eventName],
            body: (object) $parsed,
            options: $options,
            convert: ExternalBehavioralEventTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Retrieve existing custom event definitions.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $includeProperties
     * @param int $limit the maximum number of results to display per page
     * @param string $searchString Characters in the event name that the user is searching for. This search is a naive “contains” search, no fuzzy matching is done.
     * @param string $sortOrder
     *
     * @return Page<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $includeProperties = omit,
        $limit = omit,
        $searchString = omit,
        $sortOrder = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'includeProperties' => $includeProperties,
            'limit' => $limit,
            'searchString' => $searchString,
            'sortOrder' => $sortOrder,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = EventDefinitionListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'events/v3/event-definitions',
            query: $parsed,
            options: $options,
            convert: ExternalBehavioralEventTypeDefinition::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a custom event definition by name.
     *
     * @throws APIException
     */
    public function delete(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['events/v3/event-definitions/%1$s', $eventName],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a new property for an existing event definition.
     *
     * @param string $label Human readable label for the property. Used in HubSpot UI
     * @param string $type The data type of the property. Can be one of the following: [string, number, enumeration, datetime]
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param string $name Internal property name, which must be used when referencing the property from the API
     * @param list<OptionInput> $options A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @throws APIException
     */
    public function createProperty(
        string $eventName,
        $label,
        $type,
        $description = omit,
        $name = omit,
        $options = omit,
        ?RequestOptions $requestOptions = null,
    ): Property {
        $params = [
            'label' => $label,
            'type' => $type,
            'description' => $description,
            'name' => $name,
            'options' => $options,
        ];

        return $this->createPropertyRaw($eventName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createPropertyRaw(
        string $eventName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Property {
        [$parsed, $options] = EventDefinitionCreatePropertyParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['events/v3/event-definitions/%1$s/property', $eventName],
            body: (object) $parsed,
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing property from a custom event definition.
     *
     * @param string $eventName
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        $eventName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['eventName' => $eventName];

        return $this->deletePropertyRaw($propertyName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deletePropertyRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = EventDefinitionDeletePropertyParams::parseRequest(
            $params,
            $requestOptions
        );
        $eventName = $parsed['eventName'];
        unset($parsed['eventName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'events/v3/event-definitions/%1$s/property/%2$s',
                $eventName,
                $propertyName,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Fetch a single custom event definition by name.
     *
     * @throws APIException
     */
    public function get(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['events/v3/event-definitions/%1$s', $eventName],
            options: $requestOptions,
            convert: ExternalBehavioralEventTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Update an existing property in a custom event definition.
     *
     * @param string $eventName
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param string $label Human readable label for the property. Used in HubSpot UI
     * @param list<OptionInput> $options A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        $eventName,
        $description = omit,
        $label = omit,
        $options = omit,
        ?RequestOptions $requestOptions = null,
    ): Property {
        $params = [
            'eventName' => $eventName,
            'description' => $description,
            'label' => $label,
            'options' => $options,
        ];

        return $this->updatePropertyRaw($propertyName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updatePropertyRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Property {
        [$parsed, $options] = EventDefinitionUpdatePropertyParams::parseRequest(
            $params,
            $requestOptions
        );
        $eventName = $parsed['eventName'];
        unset($parsed['eventName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'events/v3/event-definitions/%1$s/property/%2$s',
                $eventName,
                $propertyName,
            ],
            body: (object) array_diff_key($parsed, ['eventName']),
            options: $options,
            convert: Property::class,
        );
    }
}
