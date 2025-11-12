<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\PartnerServices\PartnerServiceGetParams;
use HubspotSDK\Crm\Objects\PartnerServices\PartnerServiceListParams;
use HubspotSDK\Crm\Objects\PartnerServices\PartnerServiceSearchParams;
use HubspotSDK\Crm\Objects\PartnerServices\PartnerServiceUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface PartnerServicesContract
{
    /**
     * @api
     *
     * @param array<mixed>|PartnerServiceUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $partnerServiceID,
        array|PartnerServiceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|PartnerServiceListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|PartnerServiceListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|PartnerServiceGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $partnerServiceID,
        array|PartnerServiceGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|PartnerServiceSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|PartnerServiceSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
