<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Properties\CollectionResponsePropertyNoPaging;
use HubSpotSDK\Crm\Properties\PropertyCreateParams;
use HubSpotSDK\Crm\Properties\PropertyDeleteParams;
use HubSpotSDK\Crm\Properties\PropertyGetParams;
use HubSpotSDK\Crm\Properties\PropertyListParams;
use HubSpotSDK\Crm\Properties\PropertyUpdateParams;
use HubSpotSDK\Crm\Property;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface PropertiesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PropertyCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PropertyCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param array<string,mixed>|PropertyUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        array|PropertyUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PropertyListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePropertyNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|PropertyListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PropertyDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        array|PropertyDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param array<string,mixed>|PropertyGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
