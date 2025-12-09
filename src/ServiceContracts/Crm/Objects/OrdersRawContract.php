<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
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

interface OrdersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|OrderCreateParams $params
     *
     * @return BaseResponse<CreatedResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|OrderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $orderID Path param:
     * @param array<mixed>|OrderUpdateParams $params
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $orderID,
        array|OrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|OrderListParams $params
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|OrderListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|OrderGetParams $params
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $orderID,
        array|OrderGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|OrderSearchParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|OrderSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
