<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Properties;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\CollectionResponsePropertyGroup;
use HubspotSDK\Crm\Properties\CreatedResponsePropertyGroup;
use HubspotSDK\Crm\Properties\Groups\GroupCreateParams;
use HubspotSDK\Crm\Properties\Groups\GroupDeleteParams;
use HubspotSDK\Crm\Properties\Groups\GroupGetParams;
use HubspotSDK\Crm\Properties\Groups\GroupListParams;
use HubspotSDK\Crm\Properties\Groups\GroupUpdateParams;
use HubspotSDK\Crm\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;

interface GroupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|GroupCreateParams $params
     *
     * @return BaseResponse<CreatedResponsePropertyGroup>
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
     * @param string $groupName Path param:
     * @param array<string,mixed>|GroupUpdateParams $params
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function update(
        string $groupName,
        array|GroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GroupListParams $params
     *
     * @return BaseResponse<CollectionResponsePropertyGroup>
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
     * @param array<string,mixed>|GroupDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        array|GroupDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupName Path param:
     * @param array<string,mixed>|GroupGetParams $params
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function get(
        string $groupName,
        array|GroupGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
