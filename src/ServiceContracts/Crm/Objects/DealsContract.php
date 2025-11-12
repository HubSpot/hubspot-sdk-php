<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Deals\DealCreateParams;
use HubspotSDK\Crm\Objects\Deals\DealGetParams;
use HubspotSDK\Crm\Objects\Deals\DealListParams;
use HubspotSDK\Crm\Objects\Deals\DealMergeParams;
use HubspotSDK\Crm\Objects\Deals\DealSearchParams;
use HubspotSDK\Crm\Objects\Deals\DealUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface DealsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DealCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DealCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|DealUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $dealID,
        array|DealUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|DealListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|DealListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $dealID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|DealGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $dealID,
        array|DealGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|DealMergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        array|DealMergeParams $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|DealSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|DealSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
