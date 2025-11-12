<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CampaignCreateParams;
use HubspotSDK\Marketing\Campaigns\CampaignGetParams;
use HubspotSDK\Marketing\Campaigns\CampaignListParams;
use HubspotSDK\Marketing\Campaigns\CampaignUpdateParams;
use HubspotSDK\Marketing\Campaigns\PublicCampaign;
use HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CampaignsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CampaignCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CampaignCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCampaign;

    /**
     * @api
     *
     * @param array<mixed>|CampaignUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        array|CampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCampaign;

    /**
     * @api
     *
     * @param array<mixed>|CampaignListParams $params
     *
     * @return Page<PublicCampaign>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CampaignGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $campaignGuid,
        array|CampaignGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCampaignWithAssets;
}
