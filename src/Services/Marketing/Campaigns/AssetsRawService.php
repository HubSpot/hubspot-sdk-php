<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing\Campaigns;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\Assets\AssetDeleteParams;
use HubSpotSDK\Marketing\Campaigns\Assets\AssetListParams;
use HubSpotSDK\Marketing\Campaigns\Assets\AssetUpdateParams;
use HubSpotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\Campaigns\AssetsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * Associate a specified asset with a campaign. Using the API, you can create associations for the following asset types: ads, blog posts, calls, case studies, CTAs, CTAs (legacy), external website pages, feedback surveys, forms, files, knowledge base articles, landing pages, marketing email, marketing events, meetings, playbooks, podcast episodes, sales documents, sales emails, sequences, SMS, social posts, static lists, videos, website pages, and workflows.
     *
     * For other asset types, it is recommended to manage your associations directly in the campaign tool in HubSpot.
     *
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
     * This endpoint lists all assets of the campaign by asset type. The assetType parameter is required, and each request can only fetch assets of a single type.
     * Asset metrics can also be fetched along with the assets; they are available only if start and end dates are provided.
     *
     * @param string $assetType Path param
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
     * Disassociate a specified asset from a campaign. Using the API, you can remove associations for the following asset types: ads, blog posts, calls, case studies, CTAs, CTAs (legacy), external website pages, feedback surveys, forms, files, knowledge base articles, landing pages, marketing email, marketing events, meetings, playbooks, podcast episodes, sales documents, sales emails, sequences, SMS, social posts, static lists, videos, website pages, and workflows.
     *
     * For other asset types, it is recommended to manage your associations directly in the campaign tool in HubSpot.
     *
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
