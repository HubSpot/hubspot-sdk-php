<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MappingContract
{
    /**
     * @api
     *
     * @param list<string> $body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchCreateIDMapping(
        array $body,
        RequestOptions|array|null $requestOptions = null
    ): PublicBatchMigrationMapping;

    /**
     * @api
     *
     * @param string $legacyListID the legacy list id from lists v1 API
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getIDMapping(
        ?string $legacyListID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicMigrationMapping;
}
