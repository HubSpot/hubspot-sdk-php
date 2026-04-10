<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Properties;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Properties\Batch\BatchGetParams\DataSensitivity;
use HubSpotSDK\Crm\Properties\BatchResponseProperty;
use HubSpotSDK\Crm\Properties\PropertyCreate;
use HubSpotSDK\PropertyName;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PropertyCreateShape from \HubSpotSDK\Crm\Properties\PropertyCreate
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubSpotSDK\PropertyName
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
