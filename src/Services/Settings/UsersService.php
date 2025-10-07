<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\UsersContract;
use HubspotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicUserForwardPaging;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserCreateParams;
use HubspotSDK\Settings\Users\UserDeleteParams;
use HubspotSDK\Settings\Users\UserGetParams;
use HubspotSDK\Settings\Users\UserListParams;
use HubspotSDK\Settings\Users\UserUpdateParams;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

use const HubspotSDK\Core\OMIT as omit;

final class UsersService implements UsersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds a user
     *
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $primaryTeamID
     * @param string $roleID
     * @param list<string> $secondaryTeamIDs
     * @param bool $sendWelcomeEmail
     *
     * @throws APIException
     */
    public function create(
        $email,
        $firstName = omit,
        $lastName = omit,
        $primaryTeamID = omit,
        $roleID = omit,
        $secondaryTeamIDs = omit,
        $sendWelcomeEmail = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicUser {
        $params = [
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'primaryTeamID' => $primaryTeamID,
            'roleID' => $roleID,
            'secondaryTeamIDs' => $secondaryTeamIDs,
            'sendWelcomeEmail' => $sendWelcomeEmail,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicUser {
        [$parsed, $options] = UserCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'settings/v3/users/',
            body: (object) $parsed,
            options: $options,
            convert: PublicUser::class,
        );
    }

    /**
     * @api
     *
     * Modifies a user
     *
     * @param IDProperty|value-of<IDProperty> $idProperty
     * @param string $firstName
     * @param string $lastName
     * @param string $primaryTeamID
     * @param string $roleID
     * @param list<string> $secondaryTeamIDs
     *
     * @throws APIException
     */
    public function update(
        string $userID,
        $idProperty = omit,
        $firstName = omit,
        $lastName = omit,
        $primaryTeamID = omit,
        $roleID = omit,
        $secondaryTeamIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicUser {
        $params = [
            'idProperty' => $idProperty,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'primaryTeamID' => $primaryTeamID,
            'roleID' => $roleID,
            'secondaryTeamIDs' => $secondaryTeamIDs,
        ];

        return $this->updateRaw($userID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $userID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicUser {
        [$parsed, $options] = UserUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['idProperty'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['settings/v3/users/%1$s', $userID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicUser::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a list of users from an account
     *
     * @param string $after
     * @param int $limit
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicUserForwardPaging {
        $params = ['after' => $after, 'limit' => $limit];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicUserForwardPaging {
        [$parsed, $options] = UserListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'settings/v3/users/',
            query: $parsed,
            options: $options,
            convert: CollectionResponsePublicUserForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Removes a user
     *
     * @param UserDeleteParams\IDProperty|value-of<UserDeleteParams\IDProperty> $idProperty
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['idProperty' => $idProperty];

        return $this->deleteRaw($userID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $userID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = UserDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['settings/v3/users/%1$s', $userID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieves a user
     *
     * @param UserGetParams\IDProperty|value-of<UserGetParams\IDProperty> $idProperty
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null
    ): PublicUser {
        $params = ['idProperty' => $idProperty];

        return $this->getRaw($userID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $userID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicUser {
        [$parsed, $options] = UserGetParams::parseRequest($params, $requestOptions);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['settings/v3/users/%1$s', $userID],
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
     * @throws APIException
     */
    public function listRoles(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicPermissionSetNoPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'settings/v3/users/roles',
            options: $requestOptions,
            convert: CollectionResponsePublicPermissionSetNoPaging::class,
        );
    }

    /**
     * @api
     *
     * See details about this account's teams
     *
     * @throws APIException
     */
    public function listTeams(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicTeamNoPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'settings/v3/users/teams',
            options: $requestOptions,
            convert: CollectionResponsePublicTeamNoPaging::class,
        );
    }
}
