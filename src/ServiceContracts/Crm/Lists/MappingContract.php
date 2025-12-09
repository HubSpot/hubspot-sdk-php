<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\RequestOptions;

interface MappingContract
{
    /**
     * @api
     *
     * @param list<string> $body
     *
     * @throws APIException
     */
    public function batchCreateIDMapping(
        array $body,
        ?RequestOptions $requestOptions = null
    ): PublicBatchMigrationMapping;

    /**
     * @api
     *
     * @param string $legacyListID the legacy list id from lists v1 API
     *
     * @throws APIException
     */
    public function getIDMapping(
        ?string $legacyListID = null,
        ?RequestOptions $requestOptions = null
    ): PublicMigrationMapping;
}
