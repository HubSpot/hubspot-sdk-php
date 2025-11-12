<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Fees\FeeCreateParams;
use HubspotSDK\Crm\Objects\Fees\FeeGetParams;
use HubspotSDK\Crm\Objects\Fees\FeeListParams;
use HubspotSDK\Crm\Objects\Fees\FeeSearchParams;
use HubspotSDK\Crm\Objects\Fees\FeeUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface FeesContract
{
    /**
     * @api
     *
     * @param array<mixed>|FeeCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FeeCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|FeeUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $feeID,
        array|FeeUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|FeeListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|FeeListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $feeID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|FeeGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $feeID,
        array|FeeGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|FeeSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|FeeSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
