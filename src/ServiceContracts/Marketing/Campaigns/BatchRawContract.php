<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Batch\BatchCreateParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchDeleteParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchGetParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchUpdateParams;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubspotSDK\RequestOptions;

interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateParams $params
     *
     * @return BaseResponse<BatchResponsePublicCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponsePublicCampaign>
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
     * @param array<string,mixed>|BatchDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponsePublicCampaignWithAssets>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
