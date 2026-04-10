<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubSpotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubSpotSDK\Settings\Users\PublicUser;
use HubSpotSDK\Settings\Users\UserUpdateParams\IDProperty;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface UsersContract
{
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
    ): PublicUser;

    /**
     * @api
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
    ): PublicUser;

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
    ): Page;

    /**
     * @api
     *
     * @param \HubSpotSDK\Settings\Users\UserDeleteParams\IDProperty|value-of<\HubSpotSDK\Settings\Users\UserDeleteParams\IDProperty> $idProperty
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        \HubSpotSDK\Settings\Users\UserDeleteParams\IDProperty|string|null $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param \HubSpotSDK\Settings\Users\UserGetParams\IDProperty|value-of<\HubSpotSDK\Settings\Users\UserGetParams\IDProperty> $idProperty
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        \HubSpotSDK\Settings\Users\UserGetParams\IDProperty|string|null $idProperty = null,
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
