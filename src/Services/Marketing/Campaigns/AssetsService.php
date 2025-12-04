<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Assets\AssetDeleteParams;
use HubspotSDK\Marketing\Campaigns\Assets\AssetListParams;
use HubspotSDK\Marketing\Campaigns\Assets\AssetUpdateParams;
use HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\AssetsContract;

final class AssetsService implements AssetsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Associate a specified asset with a campaign. Using the API, you can create and remove associations for the following asset types: forms, static lists, external website pages, sequences, meetings, playbooks, feedback surveys, podcast episodes, sales documents, marketing emails, case studies, knowledge base articles, calls, and CTAs.
     *
     * For other asset types, it is recommended to manage your associations directly in the campaign tool in HubSpot.
     *
     * @param array{campaignGuid: string, assetType: string}|AssetUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        array|AssetUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
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
                'marketing/v3/campaigns/%1$s/assets/%2$s/%3$s',
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
     * @param array{
     *   campaignGuid: string,
     *   after?: string,
     *   endDate?: string,
     *   limit?: string,
     *   startDate?: string,
     * }|AssetListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $assetType,
        array|AssetListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicCampaignAssetForwardPaging {
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
                'marketing/v3/campaigns/%1$s/assets/%2$s', $campaignGuid, $assetType,
            ],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePublicCampaignAssetForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Disassociate a specified asset from a campaign.
     * Important: Currently, only the following asset types can be associated and disassociated via the API: Forms, Static lists, External website pages
     *
     * @param array{campaignGuid: string, assetType: string}|AssetDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        array|AssetDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
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
                'marketing/v3/campaigns/%1$s/assets/%2$s/%3$s',
                $campaignGuid,
                $assetType,
                $assetID,
            ],
            options: $options,
            convert: null,
        );
    }
}
