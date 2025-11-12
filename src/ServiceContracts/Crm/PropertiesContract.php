<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

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

interface PropertiesContract
{
    /**
     * @api
     *
     * @param array<mixed>|PropertyCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PropertyCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseProperty;

    /**
     * @api
     *
     * @param array<mixed>|PropertyUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        array|PropertyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param array<mixed>|PropertyListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|PropertyListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseProperty;

    /**
     * @api
     *
     * @param array<mixed>|PropertyDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        array|PropertyDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PropertyGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): Property;
}
