<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Users\CollectionResponsePublicPermissionSetNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicTeamNoPaging;
use HubspotSDK\Settings\Users\CollectionResponsePublicUserForwardPaging;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

use const HubspotSDK\Core\OMIT as omit;

interface UsersContract
{
    /**
     * @api
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
     * @param string $after
     * @param int $limit
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicUserForwardPaging;

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
    ): CollectionResponsePublicUserForwardPaging;

    /**
     * @api
     *
     * @param HubspotSDK\Settings\Users\UserDeleteParams\IDProperty|value-of<HubspotSDK\Settings\Users\UserDeleteParams\IDProperty> $idProperty
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
     * @param HubspotSDK\Settings\Users\UserGetParams\IDProperty|value-of<HubspotSDK\Settings\Users\UserGetParams\IDProperty> $idProperty
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
