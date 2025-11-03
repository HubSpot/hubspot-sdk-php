<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

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
        $body,
        ?RequestOptions $requestOptions = null
    ): PublicBatchMigrationMapping;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateIDMappingRaw(
        array $params,
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
        $legacyListID = omit,
        ?RequestOptions $requestOptions = null
    ): PublicMigrationMapping;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getIDMappingRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicMigrationMapping;
}
