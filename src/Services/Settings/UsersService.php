<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\UsersContract;
use HubspotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

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
     * New users will only have minimal permissions, which is contacts-base. A welcome email will prompt them to set a password and log in to HubSpot.
     *
     * @param string $email the user's email
     * @param string $firstName the user's first name
     * @param string $lastName the user's last name
     * @param string $primaryTeamID the user's primary team
     * @param string $roleID the user's role
     * @param list<string> $secondaryTeamIDs the user's additional teams
     * @param bool $sendWelcomeEmail whether to send a welcome email
     *
     * @throws APIException
     */
    public function create(
        string $email,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
        ?bool $sendWelcomeEmail = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Modifies a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param string $userID Path param: Identifier of user to retrieve
     * @param 'EMAIL'|'USER_ID'|IDProperty $idProperty Query param: The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
     * @param string $firstName body param: The first name of the user
     * @param string $lastName body param: The last name of the user
     * @param string $primaryTeamID body param: The user's primary team
     * @param string $roleID body param: The user's role
     * @param list<string> $secondaryTeamIDs body param: The user's additional teams
     *
     * @throws APIException
     */
    public function update(
        string $userID,
        string|IDProperty|null $idProperty = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a list of users from an account
     *
     * @param string $after Results will display maximum 100 users per page. Additional results will be on the next page.
     * @param int $limit The number of users to retrieve
     *
     * @return Page<PublicUser>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['after' => $after, 'limit' => $limit];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param string $userID Identifier of user to delete
     * @param 'EMAIL'|'USER_ID'|\HubspotSDK\Settings\Users\UserDeleteParams\IDProperty $idProperty The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        string|\HubspotSDK\Settings\Users\UserDeleteParams\IDProperty|null $idProperty = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['idProperty' => $idProperty];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
     *
     * @param string $userID Identifier of user to retrieve
     * @param 'EMAIL'|'USER_ID'|\HubspotSDK\Settings\Users\UserGetParams\IDProperty $idProperty The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        string|\HubspotSDK\Settings\Users\UserGetParams\IDProperty|null $idProperty = null,
        ?RequestOptions $requestOptions = null,
    ): PublicUser {
        $params = ['idProperty' => $idProperty];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRoles(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View teams for this account
     *
     * @throws APIException
     */
    public function listTeams(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicTeamNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTeams(requestOptions: $requestOptions);

        return $response->parse();
    }
}
