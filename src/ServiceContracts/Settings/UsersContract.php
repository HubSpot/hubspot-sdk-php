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

use const HubspotSDK\Core\OMIT as omit;

interface UsersContract
{
    /**
     * @api
     *
     * @param string $email The created user's email
     * @param string $firstName
     * @param string $lastName
     * @param string $primaryTeamID The user's primary team
     * @param string $roleID The user's role
     * @param list<string> $secondaryTeamIDs The user's additional teams
     * @param bool $sendWelcomeEmail Whether to send a welcome email
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
    ): PublicUser;

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
    ): PublicUser;

    /**
     * @api
     *
     * @param IDProperty|value-of<IDProperty> $idProperty The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
     * @param string $firstName
     * @param string $lastName
     * @param string $primaryTeamID The user's primary team
     * @param string $roleID The user's role
     * @param list<string> $secondaryTeamIDs The user's additional teams
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
    ): PublicUser;

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
    ): PublicUser;

    /**
     * @api
     *
     * @param string $after Results will display maximum 100 users per page. Additional results will be on the next page.
     * @param int $limit The number of users to retrieve
     *
     * @return Page<PublicUser>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): Page;

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
    ): Page;

    /**
     * @api
     *
     * @param \HubspotSDK\Settings\Users\UserDeleteParams\IDProperty|value-of<\HubspotSDK\Settings\Users\UserDeleteParams\IDProperty> $idProperty The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param \HubspotSDK\Settings\Users\UserGetParams\IDProperty|value-of<\HubspotSDK\Settings\Users\UserGetParams\IDProperty> $idProperty The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicUser;

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
