<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\Events\Send\ExternalBehavioralEventPropertyCreate;
use HubspotSDK\Events\Send\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Events\Send\ExternalObjectResolutionMappingRequest;
use HubspotSDK\Events\Send\OptionInput;
use HubspotSDK\Events\Send\Property;
use HubspotSDK\Events\Send\SendCreateEventDefinitionParams;
use HubspotSDK\Events\Send\SendCreateEventDefinitionPropertyParams;
use HubspotSDK\Events\Send\SendDeleteEventDefinitionPropertyParams;
use HubspotSDK\Events\Send\SendListEventDefinitionsParams;
use HubspotSDK\Events\Send\SendSendEventBatchParams;
use HubspotSDK\Events\Send\SendSendEventParams;
use HubspotSDK\Events\Send\SendUpdateEventDefinitionParams;
use HubspotSDK\Events\Send\SendUpdateEventDefinitionPropertyParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\SendRawContract;

/**
 * @phpstan-import-type ExternalBehavioralEventPropertyCreateShape from \HubspotSDK\Events\Send\ExternalBehavioralEventPropertyCreate
 * @phpstan-import-type ExternalObjectResolutionMappingRequestShape from \HubspotSDK\Events\Send\ExternalObjectResolutionMappingRequest
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type OptionInputShape from \HubspotSDK\Events\Send\OptionInput
 */
final class SendRawService implements SendRawContract
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
     * }|SendCreateEventDefinitionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function createEventDefinition(
        array|SendCreateEventDefinitionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendCreateEventDefinitionParams::parseRequest(
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
     *   label: string,
     *   type: string,
     *   description?: string,
     *   name?: string,
     *   options?: list<OptionInput|OptionInputShape>,
     * }|SendCreateEventDefinitionPropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function createEventDefinitionProperty(
        string $eventName,
        array|SendCreateEventDefinitionPropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendCreateEventDefinitionPropertyParams::parseRequest(
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteEventDefinition(
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
     * @param array{eventName: string}|SendDeleteEventDefinitionPropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteEventDefinitionProperty(
        string $propertyName,
        array|SendDeleteEventDefinitionPropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendDeleteEventDefinitionPropertyParams::parseRequest(
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
    public function getEventDefinition(
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
     *   after?: string,
     *   includeProperties?: bool,
     *   limit?: int,
     *   searchString?: string,
     *   sortOrder?: string,
     * }|SendListEventDefinitionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExternalBehavioralEventTypeDefinition>>
     *
     * @throws APIException
     */
    public function listEventDefinitions(
        array|SendListEventDefinitionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendListEventDefinitionsParams::parseRequest(
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
     * @param array{
     *   eventName: string,
     *   properties: array<string,string>,
     *   email?: string,
     *   objectID?: string,
     *   occurredAt?: \DateTimeInterface,
     *   utk?: string,
     *   uuid?: string,
     * }|SendSendEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function sendEvent(
        array|SendSendEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendSendEventParams::parseRequest(
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
     * }|SendSendEventBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function sendEventBatch(
        array|SendSendEventBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendSendEventBatchParams::parseRequest(
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
     * @param array{
     *   description?: string, label?: string
     * }|SendUpdateEventDefinitionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function updateEventDefinition(
        string $eventName,
        array|SendUpdateEventDefinitionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendUpdateEventDefinitionParams::parseRequest(
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
     * @param string $propertyName Path param
     * @param array{
     *   eventName: string,
     *   description?: string,
     *   label?: string,
     *   options?: list<OptionInput|OptionInputShape>,
     * }|SendUpdateEventDefinitionPropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function updateEventDefinitionProperty(
        string $propertyName,
        array|SendUpdateEventDefinitionPropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendUpdateEventDefinitionPropertyParams::parseRequest(
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
