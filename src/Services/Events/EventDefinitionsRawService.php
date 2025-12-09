<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\EventDefinitions\EventDefinitionCreateParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionCreatePropertyParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionDeletePropertyParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionListParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionUpdateParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionUpdatePropertyParams;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\EventDefinitionsRawContract;

final class EventDefinitionsRawService implements EventDefinitionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a custom event definition.
     *
     * @param array{
     *   label: string,
     *   propertyDefinitions: list<array{
     *     label: string,
     *     type: string,
     *     description?: string,
     *     name?: string,
     *     options?: list<array<mixed>>,
     *   }>,
     *   description?: string,
     *   name?: string,
     *   primaryObject?: string,
     * }|EventDefinitionCreateParams $params
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function create(
        array|EventDefinitionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDefinitionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $eventName the internal name of the custom event
     * @param array{
     *   description?: string, label?: string
     * }|EventDefinitionUpdateParams $params
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $eventName,
        array|EventDefinitionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDefinitionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   after?: string,
     *   includeProperties?: bool,
     *   limit?: int,
     *   searchString?: string,
     *   sortOrder?: string,
     * }|EventDefinitionListParams $params
     *
     * @return BaseResponse<Page<ExternalBehavioralEventTypeDefinition>>
     *
     * @throws APIException
     */
    public function list(
        array|EventDefinitionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDefinitionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $eventName the name of the event definition
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $eventName the internal name of the custom event
     * @param array{
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
     * }|EventDefinitionCreatePropertyParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function createProperty(
        string $eventName,
        array|EventDefinitionCreatePropertyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDefinitionCreatePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $propertyName the internal name of the property to delete
     * @param array{eventName: string}|EventDefinitionDeletePropertyParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        array|EventDefinitionDeletePropertyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDefinitionDeletePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventName = $parsed['eventName'];
        unset($parsed['eventName']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $eventName the internal name of the custom event
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function get(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $propertyName path param: The internal name of the property to update
     * @param array{
     *   eventName: string,
     *   description?: string,
     *   label?: string,
     *   options?: list<array{
     *     displayOrder: int,
     *     hidden: bool,
     *     label: string,
     *     value: string,
     *     description?: string,
     *   }>,
     * }|EventDefinitionUpdatePropertyParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        array|EventDefinitionUpdatePropertyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDefinitionUpdatePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventName = $parsed['eventName'];
        unset($parsed['eventName']);

        // @phpstan-ignore-next-line return.type
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
