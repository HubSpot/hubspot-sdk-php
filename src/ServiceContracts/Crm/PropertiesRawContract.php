<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\CollectionResponseProperty;
use HubspotSDK\Crm\Properties\CreatedResponseProperty;
use HubspotSDK\Crm\Properties\PropertyCreateParams;
use HubspotSDK\Crm\Properties\PropertyDeleteParams;
use HubspotSDK\Crm\Properties\PropertyGetParams;
use HubspotSDK\Crm\Properties\PropertyListParams;
use HubspotSDK\Crm\Properties\PropertyUpdateParams;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

interface PropertiesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PropertyCreateParams $params
     *
     * @return BaseResponse<CreatedResponseProperty>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PropertyCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName Path param:
     * @param array<string,mixed>|PropertyUpdateParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        array|PropertyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PropertyListParams $params
     *
     * @return BaseResponse<CollectionResponseProperty>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|PropertyListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PropertyDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        array|PropertyDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName Path param:
     * @param array<string,mixed>|PropertyGetParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
