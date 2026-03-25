<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Properties;

use HubspotSDK\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\Groups\GroupCreateParams;
use HubspotSDK\Crm\Properties\Groups\GroupDeleteParams;
use HubspotSDK\Crm\Properties\Groups\GroupGetParams;
use HubspotSDK\Crm\Properties\Groups\GroupListParams;
use HubspotSDK\Crm\Properties\Groups\GroupUpdateParams;
use HubspotSDK\PropertyGroup;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface GroupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|GroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|GroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupName Path param
     * @param array<string,mixed>|GroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function update(
        string $groupName,
        array|GroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePropertyGroupNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|GroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GroupDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        array|GroupDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupName Path param
     * @param array<string,mixed>|GroupGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function get(
        string $groupName,
        array|GroupGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
