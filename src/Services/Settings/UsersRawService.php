<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Settings;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Settings\UsersRawContract;
use HubSpotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubSpotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubSpotSDK\Settings\Users\PublicUser;
use HubSpotSDK\Settings\Users\UserCreateParams;
use HubSpotSDK\Settings\Users\UserDeleteParams;
use HubSpotSDK\Settings\Users\UserGetParams;
use HubSpotSDK\Settings\Users\UserListParams;
use HubSpotSDK\Settings\Users\UserUpdateParams;
use HubSpotSDK\Settings\Users\UserUpdateParams\IDProperty;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
