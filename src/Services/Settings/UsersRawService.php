<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\UsersRawContract;
use HubspotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserCreateParams;
use HubspotSDK\Settings\Users\UserDeleteParams;
use HubspotSDK\Settings\Users\UserGetParams;
use HubspotSDK\Settings\Users\UserListParams;
use HubspotSDK\Settings\Users\UserUpdateParams;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class UsersRawService implements UsersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   email: string,
     *   sendWelcomeEmail: bool,
     *   firstName?: string,
     *   lastName?: string,
     *   primaryTeamID?: string,
     *   roleID?: string,
     *   secondaryTeamIDs?: list<string>,
     * }|UserCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicUser>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/users/2026-03',
            body: (object) $parsed,
            options: $options,
            convert: PublicUser::class,
        );
    }

    /**
     * @api
     *
     * Modifies a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param string $userID Path param
     * @param array{
     *   idProperty?: IDProperty|value-of<IDProperty>,
     *   firstName?: string,
     *   lastName?: string,
     *   primaryTeamID?: string,
     *   roleID?: string,
     *   secondaryTeamIDs?: list<string>,
     * }|UserUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = UserUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['idProperty']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['settings/users/2026-03/%1$s', $userID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicUser::class,
        );
    }

    /**
     * @api
     *
     * @param array{after?: string, limit?: int}|UserListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicUser>>
     *
     * @throws APIException
     */
    public function list(
        array|UserListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/users/2026-03',
            query: $parsed,
            options: $options,
            convert: PublicUser::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Removes a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param array{
     *   idProperty?: UserDeleteParams\IDProperty|value-of<UserDeleteParams\IDProperty>,
     * }|UserDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = UserDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['settings/users/2026-03/%1$s', $userID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieves a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param array{
     *   idProperty?: UserGetParams\IDProperty|value-of<UserGetParams\IDProperty>,
     * }|UserGetParams $params
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
    ): BaseResponse {
        [$parsed, $options] = UserGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['settings/users/2026-03/%1$s', $userID],
            query: $parsed,
            options: $options,
            convert: PublicUser::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the roles on an account
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicPermissionSetNoPaging>
     *
     * @throws APIException
     */
    public function listRoles(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/users/2026-03/roles',
            options: $requestOptions,
            convert: CollectionResponsePublicPermissionSetNoPaging::class,
        );
    }

    /**
     * @api
     *
     * View teams for this account
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicTeamNoPaging>
     *
     * @throws APIException
     */
    public function listTeams(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/users/2026-03/teams',
            options: $requestOptions,
            convert: CollectionResponsePublicTeamNoPaging::class,
        );
    }
}
