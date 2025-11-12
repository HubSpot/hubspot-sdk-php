<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Taxes\TaxCreateParams;
use HubspotSDK\Crm\Objects\Taxes\TaxGetParams;
use HubspotSDK\Crm\Objects\Taxes\TaxListParams;
use HubspotSDK\Crm\Objects\Taxes\TaxSearchParams;
use HubspotSDK\Crm\Objects\Taxes\TaxUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface TaxesContract
{
    /**
     * @api
     *
     * @param array<mixed>|TaxCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TaxCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|TaxUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $taxID,
        array|TaxUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|TaxListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|TaxListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $taxID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TaxGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $taxID,
        array|TaxGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|TaxSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|TaxSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
