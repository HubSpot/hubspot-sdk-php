<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\PartnerClients\Batch\BatchBatchGetParams;
use HubspotSDK\Crm\Objects\PartnerClients\Batch\BatchBatchUpdateParams;
use HubspotSDK\RequestOptions;

interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|BatchBatchGetParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function batchGet(
        array|BatchBatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchBatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|BatchBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
