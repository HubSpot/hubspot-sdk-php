<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Crm\Users\UserCreateParams;
use HubspotSDK\Crm\Users\UserGetParams;
use HubspotSDK\Crm\Users\UserListParams;
use HubspotSDK\Crm\Users\UserSearchParams;
use HubspotSDK\Crm\Users\UserUpdateParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface UsersContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|UserUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $userID,
        array|UserUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|UserListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|UserListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|UserGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $userID,
        array|UserGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|UserSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|UserSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
