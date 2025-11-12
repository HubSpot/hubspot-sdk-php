<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Listings\ListingCreateParams;
use HubspotSDK\Crm\Objects\Listings\ListingGetParams;
use HubspotSDK\Crm\Objects\Listings\ListingListParams;
use HubspotSDK\Crm\Objects\Listings\ListingSearchParams;
use HubspotSDK\Crm\Objects\Listings\ListingUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ListingsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ListingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ListingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ListingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $listingID,
        array|ListingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ListingListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|ListingListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $listingID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ListingGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $listingID,
        array|ListingGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|ListingSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ListingSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
