<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Cms\MediaBridge\Groups\GroupCreateParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupDeleteByNameParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupGetByNameParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupListParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupUpdateByNameParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;

interface GroupsContract
{
    /**
     * @api
     *
     * @param array<mixed>|GroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|GroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup;

    /**
     * @api
     *
     * @param array<mixed>|GroupListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|GroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePropertyGroupNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|GroupDeleteByNameParams $params
     *
     * @throws APIException
     */
    public function deleteByName(
        string $groupName,
        array|GroupDeleteByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|GroupGetByNameParams $params
     *
     * @throws APIException
     */
    public function getByName(
        string $groupName,
        array|GroupGetByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup;

    /**
     * @api
     *
     * @param array<mixed>|GroupUpdateByNameParams $params
     *
     * @throws APIException
     */
    public function updateByName(
        string $groupName,
        array|GroupUpdateByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup;
}
