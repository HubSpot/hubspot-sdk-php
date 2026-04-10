<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubSpotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubSpotSDK\Settings\Users\PublicUser;
use HubSpotSDK\Settings\Users\UserCreateParams;
use HubSpotSDK\Settings\Users\UserDeleteParams;
use HubSpotSDK\Settings\Users\UserGetParams;
use HubSpotSDK\Settings\Users\UserListParams;
use HubSpotSDK\Settings\Users\UserUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface UsersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UserCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicUser>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userID Path param
     * @param array<string,mixed>|UserUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicUser>
     *
     * @throws APIException
     */
    public function update(
        string $userID,
        array|UserUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicUser>>
     *
     * @throws APIException
     */
    public function list(
        array|UserListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|UserDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicUser>
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        array|UserGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicPermissionSetNoPaging>
     *
     * @throws APIException
     */
    public function listRoles(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicTeamNoPaging>
     *
     * @throws APIException
     */
    public function listTeams(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
