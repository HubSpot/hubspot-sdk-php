<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\PartnerClients\Batch\BatchBatchGetParams;
use HubspotSDK\Crm\Objects\PartnerClients\Batch\BatchBatchUpdateParams;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param array<mixed>|BatchBatchGetParams $params
     *
     * @throws APIException
     */
    public function batchGet(
        array|BatchBatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|BatchBatchUpdateParams $params
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|BatchBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject;
}
