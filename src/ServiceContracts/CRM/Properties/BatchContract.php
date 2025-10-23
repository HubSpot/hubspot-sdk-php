<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Properties;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Properties\Batch\BatchReadParams\DataSensitivity;
use HubspotSDK\CRM\Properties\BatchResponseProperty;
use HubspotSDK\CRM\Properties\PropertyCreate;
use HubspotSDK\CRM\Properties\PropertyName;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<PropertyCreate> $inputs
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param list<PropertyName> $inputs
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param bool $archived
     * @param list<PropertyName> $inputs
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     *
     * @throws APIException
     */
    public function read(
        string $objectType,
        $archived,
        $inputs,
        $dataSensitivity = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;
}
