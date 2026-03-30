<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Properties;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\Batch\BatchGetParams\DataSensitivity;
use HubspotSDK\Crm\Properties\BatchResponseProperty;
use HubspotSDK\PropertyCreate;
use HubspotSDK\PropertyName;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PropertyCreateShape from \HubspotSDK\PropertyCreate
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubspotSDK\PropertyName
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param list<PropertyCreate|PropertyCreateShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param list<PropertyName|PropertyNameShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param bool $archived Body param
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity Body param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param string $locale Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs,
        ?string $locale = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty;
}
