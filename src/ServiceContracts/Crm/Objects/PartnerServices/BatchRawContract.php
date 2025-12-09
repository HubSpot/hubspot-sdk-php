<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\PartnerServices;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\PartnerServices\Batch\BatchGetParams;
use HubspotSDK\Crm\Objects\PartnerServices\Batch\BatchUpdateParams;
use HubspotSDK\RequestOptions;

interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|BatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
