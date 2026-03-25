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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AssetsRawContract
{
    /**
     * @api
     *
     * @param string $assetID the unique identifier of the asset to be associated with the campaign
     * @param array<string,mixed>|AssetUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        array|AssetUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $assetType path param: The type of asset to list for the specified campaign
     * @param array<string,mixed>|AssetListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicCampaignAssetForwardPaging>
     *
     * @throws APIException
     */
    public function list(
        string $assetType,
        array|AssetListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $assetID the unique identifier of the asset to be disassociated from the campaign
     * @param array<string,mixed>|AssetDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        array|AssetDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
