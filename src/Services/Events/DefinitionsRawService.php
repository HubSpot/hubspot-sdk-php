<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\Events\Definitions\DefinitionCreateParams;
use HubspotSDK\Events\Definitions\DefinitionCreatePropertyParams;
use HubspotSDK\Events\Definitions\DefinitionDeletePropertyParams;
use HubspotSDK\Events\Definitions\DefinitionListParams;
use HubspotSDK\Events\Definitions\DefinitionSendBatchParams;
use HubspotSDK\Events\Definitions\DefinitionSendParams;
use HubspotSDK\Events\Definitions\DefinitionUpdateParams;
use HubspotSDK\Events\Definitions\DefinitionUpdatePropertyParams;
use HubspotSDK\Events\ExternalBehavioralEventPropertyCreate;
use HubspotSDK\Events\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Events\ExternalObjectResolutionMappingRequest;
use HubspotSDK\OptionInput;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\DefinitionsRawContract;

/**
 * @phpstan-import-type ExternalBehavioralEventPropertyCreateShape from \HubspotSDK\Events\ExternalBehavioralEventPropertyCreate
 * @phpstan-import-type ExternalObjectResolutionMappingRequestShape from \HubspotSDK\Events\ExternalObjectResolutionMappingRequest
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
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
            path: 'events/custom/2026-03/event-definitions',
            body: (object) $parsed,
            options: $options,
            convert: ExternalBehavioralEventTypeDefinition::class,
        );
    }

    /**
     * @api
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
            path: ['events/custom/2026-03/event-definitions/%1$s', $eventName],
            body: (object) $parsed,
            options: $options,
            convert: ExternalBehavioralEventTypeDefinition::class,
        );
    }

    /**
     * @api
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
            path: 'events/custom/2026-03/event-definitions',
            query: $parsed,
            options: $options,
            convert: ExternalBehavioralEventTypeDefinition::class,
            page: Page::class,
        );
    }

    /**
     * @api
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
            path: ['events/custom/2026-03/event-definitions/%1$s', $eventName],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
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
     * @return BaseResponse<Property>
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
            path: [
                'events/custom/2026-03/event-definitions/%1$s/property', $eventName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
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
                'events/custom/2026-03/event-definitions/%1$s/property/%2$s',
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
            path: ['events/custom/2026-03/event-definitions/%1$s', $eventName],
            options: $requestOptions,
            convert: ExternalBehavioralEventTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   eventName: string,
     *   properties: array<string,string>,
     *   email?: string,
     *   objectID?: string,
     *   occurredAt?: \DateTimeInterface,
     *   utk?: string,
     *   uuid?: string,
     * }|DefinitionSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function send(
        array|DefinitionSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'events/custom/2026-03/send',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
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
            path: 'events/custom/2026-03/send/batch',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
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
     * @return BaseResponse<Property>
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
                'events/custom/2026-03/event-definitions/%1$s/property/%2$s',
                $eventName,
                $propertyName,
            ],
            body: (object) array_diff_key($parsed, array_flip(['eventName'])),
            options: $options,
            convert: Property::class,
        );
    }
}
