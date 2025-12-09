<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface AssociationsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        string $partnerClientID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $partnerClientID Path param:
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $includeFa Query param:
     * @param int $limit query param: The maximum number of results to display per page
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        string $partnerClientID,
        ?string $after = null,
        bool $includeFa = false,
        int $limit = 500,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        string $partnerClientID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
