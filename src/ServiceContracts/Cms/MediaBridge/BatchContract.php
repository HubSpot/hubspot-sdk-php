<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\Batch\BatchGetParams\DataSensitivity;
use HubSpotSDK\Cms\MediaBridge\BatchResponseProperty;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\PropertyCreate;
use HubSpotSDK\PropertyName;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PropertyCreateShape from \HubSpotSDK\PropertyCreate
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubSpotSDK\PropertyName
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param string $objectType Path param
     * @param int $appID Path param
     * @param list<PropertyCreate|PropertyCreateShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param int $appID Path param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param int $appID Path param
     * @param bool $archived Body param
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity Body param
     * @param list<PropertyName|PropertyNameShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        int $appID,
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseProperty;
}
