<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Definitions\DefinitionCreateParams;
use HubspotSDK\Events\Definitions\DefinitionCreatePropertyParams;
use HubspotSDK\Events\Definitions\DefinitionDeletePropertyParams;
use HubspotSDK\Events\Definitions\DefinitionListParams;
use HubspotSDK\Events\Definitions\DefinitionSendBatchParams;
use HubspotSDK\Events\Definitions\DefinitionUpdateParams;
use HubspotSDK\Events\Definitions\DefinitionUpdatePropertyParams;
use HubspotSDK\Events\Definitions\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface DefinitionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function create(
        array|DefinitionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExternalBehavioralEventTypeDefinition>>
     *
     * @throws APIException
     */
    public function list(
        array|DefinitionListParams $params,
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
    public function delete(
        string $eventName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionCreatePropertyParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionDeletePropertyParams $params
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
    public function get(
        string $eventName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionSendBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function sendBatch(
        array|DefinitionSendBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param array<string,mixed>|DefinitionUpdatePropertyParams $params
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
    ): BaseResponse;
}
