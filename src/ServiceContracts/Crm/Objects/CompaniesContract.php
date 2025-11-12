<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Companies\CompanyCreateParams;
use HubspotSDK\Crm\Objects\Companies\CompanyGetParams;
use HubspotSDK\Crm\Objects\Companies\CompanyListParams;
use HubspotSDK\Crm\Objects\Companies\CompanyMergeParams;
use HubspotSDK\Crm\Objects\Companies\CompanySearchParams;
use HubspotSDK\Crm\Objects\Companies\CompanyUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CompaniesContract
{
    /**
     * @api
     *
     * @param array<mixed>|CompanyCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CompanyCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CompanyUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $companyID,
        array|CompanyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CompanyListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|CompanyListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CompanyGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $companyID,
        array|CompanyGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|CompanyMergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        array|CompanyMergeParams $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CompanySearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|CompanySearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
