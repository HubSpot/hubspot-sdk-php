<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Assets\AssetDeleteParams;
use HubspotSDK\Marketing\Campaigns\Assets\AssetListParams;
use HubspotSDK\Marketing\Campaigns\Assets\AssetUpdateParams;
use HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubspotSDK\RequestOptions;

interface AssetsRawContract
{
    /**
     * @api
     *
     * @param string $assetID Id of the asset
     * @param array<mixed>|AssetUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        array|AssetUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $assetType path param: The type of asset to fetch
     * @param array<mixed>|AssetListParams $params
     *
     * @return BaseResponse<CollectionResponsePublicCampaignAssetForwardPaging>
     *
     * @throws APIException
     */
    public function list(
        string $assetType,
        array|AssetListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $assetID Id of the asset
     * @param array<mixed>|AssetDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        array|AssetDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
