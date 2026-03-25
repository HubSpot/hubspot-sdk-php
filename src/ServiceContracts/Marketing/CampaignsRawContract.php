<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CampaignGetParams;
use HubspotSDK\Marketing\Campaigns\CampaignUpdateParams;
use HubspotSDK\Marketing\Campaigns\PublicCampaign;
use HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CampaignsRawContract
{
    /**
     * @api
     *
     * @param string $campaignGuid the unique identifier of the campaign to update
     * @param array<string,mixed>|CampaignUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        array|CampaignUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignGuid the unique identifier of the campaign to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignGuid the unique identifier of the campaign to retrieve
     * @param array<string,mixed>|CampaignGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCampaignWithAssets>
     *
     * @throws APIException
     */
    public function get(
        string $campaignGuid,
        array|CampaignGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
