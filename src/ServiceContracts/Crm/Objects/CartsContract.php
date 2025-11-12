<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Carts\CartCreateParams;
use HubspotSDK\Crm\Objects\Carts\CartGetParams;
use HubspotSDK\Crm\Objects\Carts\CartListParams;
use HubspotSDK\Crm\Objects\Carts\CartSearchParams;
use HubspotSDK\Crm\Objects\Carts\CartUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CartsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CartCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CartCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CartUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $cartID,
        array|CartUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CartListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|CartListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $cartID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CartGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $cartID,
        array|CartGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|CartSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|CartSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
