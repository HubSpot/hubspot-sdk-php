<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\UsersContract;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserCreateParams;
use HubspotSDK\Settings\Users\UserDeleteParams;
use HubspotSDK\Settings\Users\UserDeleteParams\IDProperty;
use HubspotSDK\Settings\Users\UserListParams;
use HubspotSDK\Settings\Users\UserReadParams;
use HubspotSDK\Settings\Users\UserReplaceParams;

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
     * Retrieves a list of users from an account
     *
     * @param string $after
     * @param int $limit
     *
     * @return Page<PublicUser>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['after' => $after, 'limit' => $limit];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicUser>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
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
            convert: PublicUser::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Removes a user
     *
     * @param IDProperty|value-of<IDProperty> $idProperty
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
     * @param UserReadParams\IDProperty|value-of<UserReadParams\IDProperty> $idProperty
     *
     * @throws APIException
     */
    public function read(
        string $userID,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null
    ): PublicUser {
        $params = ['idProperty' => $idProperty];

        return $this->readRaw($userID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $userID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicUser {
        [$parsed, $options] = UserReadParams::parseRequest(
            $params,
            $requestOptions
        );

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
     * Modifies a user
     *
     * @param UserReplaceParams\IDProperty|value-of<UserReplaceParams\IDProperty> $idProperty
     * @param string $firstName
     * @param string $lastName
     * @param string $primaryTeamID
     * @param string $roleID
     * @param list<string> $secondaryTeamIDs
     *
     * @throws APIException
     */
    public function replace(
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

        return $this->replaceRaw($userID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $userID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicUser {
        [$parsed, $options] = UserReplaceParams::parseRequest(
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
}
