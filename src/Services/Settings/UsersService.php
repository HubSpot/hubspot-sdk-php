<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\UsersContract;
use HubspotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class UsersService implements UsersContract
{
    /**
     * @api
     */
    public UsersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsersRawService($client);
    }

    /**
     * @api
     *
     * @param string $email the user's email
     * @param bool $sendWelcomeEmail whether to send a welcome email
     * @param string $firstName the user's first name
     * @param string $lastName the user's last name
     * @param string $primaryTeamID the user's primary team
     * @param string $roleID the user's role
     * @param list<string> $secondaryTeamIDs the user's additional teams
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $email,
        bool $sendWelcomeEmail,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicUser {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'sendWelcomeEmail' => $sendWelcomeEmail,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'primaryTeamID' => $primaryTeamID,
                'roleID' => $roleID,
                'secondaryTeamIDs' => $secondaryTeamIDs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Modifies a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param string $userID Path param
     * @param IDProperty|value-of<IDProperty> $idProperty Query param
     * @param string $firstName body param: The first name of the user
     * @param string $lastName body param: The last name of the user
     * @param string $primaryTeamID body param: The user's primary team
     * @param string $roleID body param: The user's role
     * @param list<string> $secondaryTeamIDs body param: The user's additional teams
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $userID,
        IDProperty|string|null $idProperty = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicUser {
        $params = Util::removeNulls(
            [
                'idProperty' => $idProperty,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'primaryTeamID' => $primaryTeamID,
                'roleID' => $roleID,
                'secondaryTeamIDs' => $secondaryTeamIDs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicUser>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(['after' => $after, 'limit' => $limit]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param \HubspotSDK\Settings\Users\UserDeleteParams\IDProperty|value-of<\HubspotSDK\Settings\Users\UserDeleteParams\IDProperty> $idProperty
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        \HubspotSDK\Settings\Users\UserDeleteParams\IDProperty|string|null $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['idProperty' => $idProperty]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param \HubspotSDK\Settings\Users\UserGetParams\IDProperty|value-of<\HubspotSDK\Settings\Users\UserGetParams\IDProperty> $idProperty
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        \HubspotSDK\Settings\Users\UserGetParams\IDProperty|string|null $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicUser {
        $params = Util::removeNulls(['idProperty' => $idProperty]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the roles on an account
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listRoles(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicPermissionSetNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRoles(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View teams for this account
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTeams(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicTeamNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTeams(requestOptions: $requestOptions);

        return $response->parse();
    }
}
