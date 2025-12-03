<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Contacts\ContactCreateParams;
use HubspotSDK\Crm\Objects\Contacts\ContactGdprDeleteParams;
use HubspotSDK\Crm\Objects\Contacts\ContactGetParams;
use HubspotSDK\Crm\Objects\Contacts\ContactListParams;
use HubspotSDK\Crm\Objects\Contacts\ContactMergeParams;
use HubspotSDK\Crm\Objects\Contacts\ContactSearchParams;
use HubspotSDK\Crm\Objects\Contacts\ContactUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ContactsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ContactCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ContactCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ContactUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $contactID,
        array|ContactUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ContactListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|ContactListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $contactID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ContactGdprDeleteParams $params
     *
     * @throws APIException
     */
    public function gdprDelete(
        array|ContactGdprDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ContactGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $contactID,
        array|ContactGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|ContactMergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        array|ContactMergeParams $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ContactSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ContactSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
