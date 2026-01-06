<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserCreateParams;
use HubspotSDK\Settings\Users\UserDeleteParams;
use HubspotSDK\Settings\Users\UserGetParams;
use HubspotSDK\Settings\Users\UserListParams;
use HubspotSDK\Settings\Users\UserUpdateParams;

interface UsersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserCreateParams $params
     *
     * @return BaseResponse<PublicUser>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userID Path param: Identifier of user to retrieve
     * @param array<mixed>|UserUpdateParams $params
     *
     * @return BaseResponse<PublicUser>
     *
     * @throws APIException
     */
    public function update(
        string $userID,
        array|UserUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserListParams $params
     *
     * @return BaseResponse<Page<PublicUser>>
     *
     * @throws APIException
     */
    public function list(
        array|UserListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userID Identifier of user to delete
     * @param array<mixed>|UserDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|UserDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userID Identifier of user to retrieve
     * @param array<mixed>|UserGetParams $params
     *
     * @return BaseResponse<PublicUser>
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        array|UserGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CollectionResponsePublicPermissionSetNoPaging>
     *
     * @throws APIException
     */
    public function listRoles(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CollectionResponsePublicTeamNoPaging>
     *
     * @throws APIException
     */
    public function listTeams(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
