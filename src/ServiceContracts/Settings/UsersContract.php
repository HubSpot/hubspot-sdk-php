<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Users\PublicUser;
use HubspotSDK\Settings\Users\UserDeleteParams\IDProperty;

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
     * @param IDProperty|value-of<IDProperty> $idProperty
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
     * @param \HubspotSDK\Settings\Users\UserReadParams\IDProperty|value-of<\HubspotSDK\Settings\Users\UserReadParams\IDProperty> $idProperty
     *
     * @throws APIException
     */
    public function read(
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
    public function readRaw(
        string $userID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicUser;

    /**
     * @api
     *
     * @param \HubspotSDK\Settings\Users\UserReplaceParams\IDProperty|value-of<\HubspotSDK\Settings\Users\UserReplaceParams\IDProperty> $idProperty
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
    ): PublicUser;

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
    ): PublicUser;
}
