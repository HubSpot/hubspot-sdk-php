<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Orders\OrderCreateParams;
use HubspotSDK\Crm\Objects\Orders\OrderGetParams;
use HubspotSDK\Crm\Objects\Orders\OrderListParams;
use HubspotSDK\Crm\Objects\Orders\OrderSearchParams;
use HubspotSDK\Crm\Objects\Orders\OrderUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface OrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|OrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|OrderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|OrderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $orderID,
        array|OrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|OrderListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|OrderListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|OrderGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $orderID,
        array|OrderGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|OrderSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|OrderSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
