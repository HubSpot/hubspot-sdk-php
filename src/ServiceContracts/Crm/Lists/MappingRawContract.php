<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\Mapping\MappingBatchCreateIDMappingParams;
use HubspotSDK\Crm\Lists\Mapping\MappingGetIDMappingParams;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\RequestOptions;

interface MappingRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MappingBatchCreateIDMappingParams $params
     *
     * @return BaseResponse<PublicBatchMigrationMapping>
     *
     * @throws APIException
     */
    public function batchCreateIDMapping(
        array|MappingBatchCreateIDMappingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MappingGetIDMappingParams $params
     *
     * @return BaseResponse<PublicMigrationMapping>
     *
     * @throws APIException
     */
    public function getIDMapping(
        array|MappingGetIDMappingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
