<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Cms\MediaBridge\Groups\GroupCreateParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupDeleteByNameParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupGetByNameParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupListParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupUpdateByNameParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;

interface GroupsRawContract
{
    /**
     * @api
     *
     * @param string $objectType path param: The object type to create the new property group for
     * @param array<mixed>|GroupCreateParams $params
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|GroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType the type of object to get the property groups for
     * @param array<mixed>|GroupListParams $params
     *
     * @return BaseResponse<CollectionResponsePropertyGroupNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|GroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupName the name of the property group to be deleted
     * @param array<mixed>|GroupDeleteByNameParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByName(
        string $groupName,
        array|GroupDeleteByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupName the name for the property group you want to get the details for
     * @param array<mixed>|GroupGetByNameParams $params
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function getByName(
        string $groupName,
        array|GroupGetByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupName path param: The name of the property group to update
     * @param array<mixed>|GroupUpdateByNameParams $params
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function updateByName(
        string $groupName,
        array|GroupUpdateByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
