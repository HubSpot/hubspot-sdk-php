<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Batch\BatchGetParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\BatchResponseProperty;
use HubspotSDK\Core\Exceptions\APIException;
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
