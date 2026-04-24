<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Events;

use HubSpotSDK\BaseProperty;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubSpotSDK\Events\Definitions\DefinitionCreateParams;
use HubSpotSDK\Events\Definitions\DefinitionCreatePropertyParams;
use HubSpotSDK\Events\Definitions\DefinitionDeletePropertyParams;
use HubSpotSDK\Events\Definitions\DefinitionListParams;
use HubSpotSDK\Events\Definitions\DefinitionSendBatchParams;
use HubSpotSDK\Events\Definitions\DefinitionUpdateParams;
use HubSpotSDK\Events\Definitions\DefinitionUpdatePropertyParams;
use HubSpotSDK\Events\Definitions\ExternalBehavioralEventPropertyCreate;
use HubSpotSDK\Events\Definitions\ExternalBehavioralEventTypeDefinition;
use HubSpotSDK\Events\Definitions\ExternalObjectResolutionMappingRequest;
use HubSpotSDK\OptionInput;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Events\DefinitionsRawContract;

/**
 * @phpstan-import-type ExternalBehavioralEventPropertyCreateShape from \HubSpotSDK\Events\Definitions\ExternalBehavioralEventPropertyCreate
 * @phpstan-import-type ExternalObjectResolutionMappingRequestShape from \HubSpotSDK\Events\Definitions\ExternalObjectResolutionMappingRequest
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubSpotSDK\Events\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type OptionInputShape from \HubSpotSDK\OptionInput
 */
final class DefinitionsRawService implements DefinitionsRawContract
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
     *   includeDefaultProperties: bool,
     *   label: string,
     *   propertyDefinitions: list<ExternalBehavioralEventPropertyCreate|ExternalBehavioralEventPropertyCreateShape>,
     *   customMatchingID?: ExternalObjectResolutionMappingRequest|ExternalObjectResolutionMappingRequestShape,
     *   description?: string,
     *   name?: string,
     *   primaryObject?: string,
     * }|DefinitionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function create(
        array|DefinitionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'events/2026-03/event-definitions',
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
     * @param array{
     *   description?: string, label?: string
     * }|DefinitionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $eventName,
        array|DefinitionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['events/2026-03/event-definitions/%1$s', $eventName],
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
     * }|DefinitionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExternalBehavioralEventTypeDefinition>>
     *
     * @throws APIException
     */
    public function list(
        array|DefinitionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'events/2026-03/event-definitions',
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $eventName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['events/2026-03/event-definitions/%1$s', $eventName],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a new property for an existing event definition.
     *
     * @param array{
     *   label: string,
     *   type: string,
     *   description?: string,
     *   name?: string,
     *   options?: list<OptionInput|OptionInputShape>,
     * }|DefinitionCreatePropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BaseProperty>
     *
     * @throws APIException
     */
    public function createProperty(
        string $eventName,
        array|DefinitionCreatePropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionCreatePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['events/2026-03/event-definitions/%1$s/property', $eventName],
            body: (object) $parsed,
            options: $options,
            convert: BaseProperty::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing property from a custom event definition.
     *
     * @param array{eventName: string}|DefinitionDeletePropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        array|DefinitionDeletePropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionDeletePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventName = $parsed['eventName'];
        unset($parsed['eventName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'events/2026-03/event-definitions/%1$s/property/%2$s',
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function get(
        string $eventName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['events/2026-03/event-definitions/%1$s', $eventName],
            options: $requestOptions,
            convert: ExternalBehavioralEventTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Send multiple event occurrences at once.
     *
     * @param array{
     *   inputs: list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape>,
     * }|DefinitionSendBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function sendBatch(
        array|DefinitionSendBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionSendBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'events/2026-03/send/batch',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update an existing property in a custom event definition.
     *
     * @param string $propertyName Path param
     * @param array{
     *   eventName: string,
     *   description?: string,
     *   label?: string,
     *   options?: list<OptionInput|OptionInputShape>,
     * }|DefinitionUpdatePropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BaseProperty>
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        array|DefinitionUpdatePropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionUpdatePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventName = $parsed['eventName'];
        unset($parsed['eventName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'events/2026-03/event-definitions/%1$s/property/%2$s',
                $eventName,
                $propertyName,
            ],
            body: (object) array_diff_key($parsed, array_flip(['eventName'])),
            options: $options,
            convert: BaseProperty::class,
        );
    }
}
