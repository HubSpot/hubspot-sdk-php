<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Assets\AssetDeleteParams;
use HubspotSDK\Marketing\Campaigns\Assets\AssetListParams;
use HubspotSDK\Marketing\Campaigns\Assets\AssetUpdateParams;
use HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\AssetsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AssetsRawService implements AssetsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Associate an asset with a specific campaign in your HubSpot account. This operation allows you to link an asset of a specified type and ID to a campaign, facilitating better organization and tracking of campaign resources.
     *
     * @param string $assetID the unique identifier of the asset to be associated with the campaign
     * @param array{campaignGuid: string, assetType: string}|AssetUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = AssetUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);
        $assetType = $parsed['assetType'];
        unset($parsed['assetType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'marketing/campaigns/2026-03/%1$s/assets/%2$s/%3$s',
                $campaignGuid,
                $assetType,
                $assetID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * List all assets of a specified campaign by asset type. This endpoint allows you to retrieve assets associated with a campaign, filtered by the type of asset. It supports pagination and date filtering to manage and refine the results.
     *
     * @param string $assetType path param: The type of asset to list for the specified campaign
     * @param array{
     *   campaignGuid: string,
     *   after?: string,
     *   endDate?: string,
     *   limit?: string,
     *   startDate?: string,
     * }|AssetListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = AssetListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/campaigns/2026-03/%1$s/assets/%2$s',
                $campaignGuid,
                $assetType,
            ],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePublicCampaignAssetForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Disassociate an asset from a specific campaign. This operation removes the association between the specified asset and campaign, effectively detaching the asset from the campaign's context.
     *
     * @param string $assetID the unique identifier of the asset to be disassociated from the campaign
     * @param array{campaignGuid: string, assetType: string}|AssetDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = AssetDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);
        $assetType = $parsed['assetType'];
        unset($parsed['assetType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'marketing/campaigns/2026-03/%1$s/assets/%2$s/%3$s',
                $campaignGuid,
                $assetType,
                $assetID,
            ],
            options: $options,
            convert: null,
        );
    }
}
