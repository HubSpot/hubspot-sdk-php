<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Properties;

use HubSpotSDK\CollectionResponsePropertyGroupNoPaging;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Properties\Groups\GroupCreateParams;
use HubSpotSDK\Crm\Properties\Groups\GroupDeleteParams;
use HubSpotSDK\Crm\Properties\Groups\GroupGetParams;
use HubSpotSDK\Crm\Properties\Groups\GroupListParams;
use HubSpotSDK\Crm\Properties\Groups\GroupUpdateParams;
use HubSpotSDK\PropertyGroup;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
