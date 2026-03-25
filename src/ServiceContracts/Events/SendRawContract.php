<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Send\ExternalBehavioralEventTypeDefinition;
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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SendRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SendCreateEventDefinitionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function createEventDefinition(
        array|SendCreateEventDefinitionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SendCreateEventDefinitionPropertyParams $params
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
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SendDeleteEventDefinitionPropertyParams $params
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
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SendListEventDefinitionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExternalBehavioralEventTypeDefinition>>
     *
     * @throws APIException
     */
    public function listEventDefinitions(
        array|SendListEventDefinitionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SendSendEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function sendEvent(
        array|SendSendEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SendSendEventBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function sendEventBatch(
        array|SendSendEventBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SendUpdateEventDefinitionParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param array<string,mixed>|SendUpdateEventDefinitionPropertyParams $params
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
    ): BaseResponse;
}
