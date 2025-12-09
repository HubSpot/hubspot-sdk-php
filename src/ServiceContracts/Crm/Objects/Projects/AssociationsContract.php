<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\Projects;

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
        string $projectID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $projectID Path param:
     * @param string $after Query param:
     * @param bool $includeFa Query param:
     * @param int $limit Query param:
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        string $projectID,
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
        string $projectID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
