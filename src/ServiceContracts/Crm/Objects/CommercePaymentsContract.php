<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentCreateParams;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentGetParams;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentListParams;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentSearchParams;
use HubspotSDK\Crm\Objects\CommercePayments\CommercePaymentUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CommercePaymentsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CommercePaymentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CommercePaymentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CommercePaymentUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $commercePaymentID,
        array|CommercePaymentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CommercePaymentListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|CommercePaymentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $commercePaymentID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CommercePaymentGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $commercePaymentID,
        array|CommercePaymentGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|CommercePaymentSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|CommercePaymentSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
