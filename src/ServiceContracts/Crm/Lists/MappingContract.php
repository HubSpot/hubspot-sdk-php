<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\Mapping\MappingBatchCreateIDMappingParams;
use HubspotSDK\Crm\Lists\Mapping\MappingGetIDMappingParams;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\RequestOptions;

interface MappingContract
{
    /**
     * @api
     *
     * @param array<mixed>|MappingBatchCreateIDMappingParams $params
     *
     * @throws APIException
     */
    public function batchCreateIDMapping(
        array|MappingBatchCreateIDMappingParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicBatchMigrationMapping;

    /**
     * @api
     *
     * @param array<mixed>|MappingGetIDMappingParams $params
     *
     * @throws APIException
     */
    public function getIDMapping(
        array|MappingGetIDMappingParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicMigrationMapping;
}
