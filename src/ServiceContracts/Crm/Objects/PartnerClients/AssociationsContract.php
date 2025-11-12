<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationDeleteParams;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationListParams;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationUpdateParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface AssociationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AssociationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        array|AssociationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|AssociationListParams $params
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|AssociationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|AssociationDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        array|AssociationDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
