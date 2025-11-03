<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface GroupsContract
{
    /**
     * @api
     *
     * @param string $appID
     * @param string $label
     * @param string $name
     * @param int $displayOrder
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $appID,
        $label,
        $name,
        $displayOrder = omit,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup;

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
    ): PropertyGroup;

    /**
     * @api
     *
     * @param string $appID
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyGroupNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePropertyGroupNoPaging;

    /**
     * @api
     *
     * @param string $appID
     * @param string $objectType
     *
     * @throws APIException
     */
    public function deleteByName(
        string $groupName,
        $appID,
        $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteByNameRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $appID
     * @param string $objectType
     *
     * @throws APIException
     */
    public function getByName(
        string $groupName,
        $appID,
        $objectType,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByNameRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup;

    /**
     * @api
     *
     * @param string $appID
     * @param string $objectType
     * @param int $displayOrder
     * @param string $label
     *
     * @throws APIException
     */
    public function updateByName(
        string $groupName,
        $appID,
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
    public function updateByNameRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup;
}
