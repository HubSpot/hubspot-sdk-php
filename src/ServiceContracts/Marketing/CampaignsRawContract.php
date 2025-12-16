<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CampaignCreateParams;
use HubspotSDK\Marketing\Campaigns\CampaignGetParams;
use HubspotSDK\Marketing\Campaigns\CampaignListParams;
use HubspotSDK\Marketing\Campaigns\CampaignUpdateParams;
use HubspotSDK\Marketing\Campaigns\PublicCampaign;
use HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CampaignsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CampaignCreateParams $params
     *
     * @return BaseResponse<PublicCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|CampaignCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param array<string,mixed>|CampaignUpdateParams $params
     *
     * @return BaseResponse<PublicCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        array|CampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CampaignListParams $params
     *
     * @return BaseResponse<Page<PublicCampaign>>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param array<string,mixed>|CampaignGetParams $params
     *
     * @return BaseResponse<PublicCampaignWithAssets>
     *
     * @throws APIException
     */
    public function get(
        string $campaignGuid,
        array|CampaignGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
