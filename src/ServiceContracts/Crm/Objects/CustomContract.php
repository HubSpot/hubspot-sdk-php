<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Custom\CustomCreateParams;
use HubspotSDK\Crm\Objects\Custom\CustomDeleteParams;
use HubspotSDK\Crm\Objects\Custom\CustomGetParams;
use HubspotSDK\Crm\Objects\Custom\CustomListParams;
use HubspotSDK\Crm\Objects\Custom\CustomMergeParams;
use HubspotSDK\Crm\Objects\Custom\CustomSearchParams;
use HubspotSDK\Crm\Objects\Custom\CustomUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CustomContract
{
    /**
     * @api
     *
     * @param array<mixed>|CustomCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|CustomCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CustomUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|CustomUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CustomListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|CustomListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|CustomDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|CustomDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CustomGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|CustomGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|CustomMergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        string $objectType,
        array|CustomMergeParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CustomSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        array|CustomSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
