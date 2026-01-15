<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface UsersContract
{
    /**
     * @api
     *
     * @param string $email the user's email
     * @param string $firstName the user's first name
     * @param string $lastName the user's last name
     * @param string $primaryTeamID the user's primary team
     * @param string $roleID the user's role
     * @param list<string> $secondaryTeamIDs the user's additional teams
     * @param bool $sendWelcomeEmail whether to send a welcome email
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): PublicUser;

    /**
     * @api
     *
     * @param string $userID Path param: Identifier of user to retrieve
     * @param IDProperty|value-of<IDProperty> $idProperty Query param: The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
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
    ): PublicUser;

    /**
     * @api
     *
     * @param string $after Results will display maximum 100 users per page. Additional results will be on the next page.
     * @param int $limit The number of users to retrieve
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
    ): Page;

    /**
     * @api
     *
     * @param string $userID Identifier of user to delete
     * @param \HubspotSDK\Settings\Users\UserDeleteParams\IDProperty|value-of<\HubspotSDK\Settings\Users\UserDeleteParams\IDProperty> $idProperty The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        \HubspotSDK\Settings\Users\UserDeleteParams\IDProperty|string|null $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $userID Identifier of user to retrieve
     * @param \HubspotSDK\Settings\Users\UserGetParams\IDProperty|value-of<\HubspotSDK\Settings\Users\UserGetParams\IDProperty> $idProperty The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        \HubspotSDK\Settings\Users\UserGetParams\IDProperty|string|null $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicUser;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listRoles(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicPermissionSetNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTeams(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicTeamNoPaging;
}
