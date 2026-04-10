<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Campaigns;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\Assets\AssetDeleteParams;
use HubSpotSDK\Marketing\Campaigns\Assets\AssetListParams;
use HubSpotSDK\Marketing\Campaigns\Assets\AssetUpdateParams;
use HubSpotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface AssetsRawContract
{
    /**
     * @api
     *
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
     * @param string $assetType Path param
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
