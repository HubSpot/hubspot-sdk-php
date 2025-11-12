<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Assets\AssetDeleteParams;
use HubspotSDK\Marketing\Campaigns\Assets\AssetListParams;
use HubspotSDK\Marketing\Campaigns\Assets\AssetUpdateParams;
use HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubspotSDK\RequestOptions;

interface AssetsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AssetUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        array|AssetUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AssetListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $assetType,
        array|AssetListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicCampaignAssetForwardPaging;

    /**
     * @api
     *
     * @param array<mixed>|AssetDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        array|AssetDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
