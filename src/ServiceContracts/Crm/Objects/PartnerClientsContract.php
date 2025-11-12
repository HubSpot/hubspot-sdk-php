<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\PartnerClients\PartnerClientGetParams;
use HubspotSDK\Crm\Objects\PartnerClients\PartnerClientListParams;
use HubspotSDK\Crm\Objects\PartnerClients\PartnerClientSearchParams;
use HubspotSDK\Crm\Objects\PartnerClients\PartnerClientUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface PartnerClientsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PartnerClientUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $partnerClientID,
        array|PartnerClientUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|PartnerClientListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|PartnerClientListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|PartnerClientGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $partnerClientID,
        array|PartnerClientGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|PartnerClientSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|PartnerClientSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
