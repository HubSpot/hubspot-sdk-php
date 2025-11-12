<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Objects\ObjectCreateParams;
use HubspotSDK\Crm\Objects\Objects\ObjectDeleteParams;
use HubspotSDK\Crm\Objects\Objects\ObjectGetParams;
use HubspotSDK\Crm\Objects\Objects\ObjectListParams;
use HubspotSDK\Crm\Objects\Objects\ObjectSearchParams;
use HubspotSDK\Crm\Objects\Objects\ObjectUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ObjectsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ObjectCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|ObjectCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ObjectUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|ObjectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ObjectListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|ObjectListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|ObjectDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|ObjectDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ObjectGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|ObjectGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|ObjectSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        array|ObjectSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
