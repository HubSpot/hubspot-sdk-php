<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Properties;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Properties\CollectionResponsePropertyGroup;
use HubspotSDK\CRM\Properties\CreatedResponsePropertyGroup;
use HubspotSDK\CRM\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface GroupsContract
{
    /**
     * @api
     *
     * @param string $label a human-readable label that will be shown in HubSpot
     * @param string $name the internal property group name, which must be used when referencing the property group via the API
     * @param int $displayOrder Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $label,
        $name,
        $displayOrder = omit,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponsePropertyGroup;

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
    ): CreatedResponsePropertyGroup;

    /**
     * @api
     *
     * @param string $objectType
     * @param int $displayOrder Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     * @param string $label a human-readable label that will be shown in HubSpot
     *
     * @throws APIException
     */
    public function update(
        string $groupName,
        $objectType,
        $displayOrder = omit,
        $label = omit,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyGroup;

    /**
     * @api
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        $objectType,
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
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function get(
        string $groupName,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup;
}
