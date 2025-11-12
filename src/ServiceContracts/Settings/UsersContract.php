<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

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

interface UsersContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): PublicUser;

    /**
     * @api
     *
     * @param array<mixed>|UserUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $userID,
        array|UserUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicUser;

    /**
     * @api
     *
     * @param array<mixed>|UserListParams $params
     *
     * @return Page<PublicUser>
     *
     * @throws APIException
     */
    public function list(
        array|UserListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|UserDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        array|UserDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|UserGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        array|UserGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicUser;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listRoles(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicPermissionSetNoPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listTeams(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicTeamNoPaging;
}
