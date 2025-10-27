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

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $campaignGuid
     * @param string $assetType
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        $campaignGuid,
        $assetType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['campaignGuid' => $campaignGuid, 'assetType' => $assetType];

        return $this->updateRaw($assetID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $assetID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AssetUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);
        $assetType = $parsed['assetType'];
        unset($parsed['assetType']);

        // @phpstan-ignore-next-line;
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
     * @param string $campaignGuid
     * @param string $after A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D
     * @param string $endDate End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     * @param string $limit The maximum number of results to return.
     * Default: 10
     * @param string $startDate Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     *
     * @throws APIException
     */
    public function list(
        string $assetType,
        $campaignGuid,
        $after = omit,
        $endDate = omit,
        $limit = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicCampaignAssetForwardPaging {
        $params = [
            'campaignGuid' => $campaignGuid,
            'after' => $after,
            'endDate' => $endDate,
            'limit' => $limit,
            'startDate' => $startDate,
        ];

        return $this->listRaw($assetType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $assetType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicCampaignAssetForwardPaging {
        [$parsed, $options] = AssetListParams::parseRequest(
            $params,
            $requestOptions
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line;
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
     * @param string $campaignGuid
     * @param string $assetType
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        $campaignGuid,
        $assetType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['campaignGuid' => $campaignGuid, 'assetType' => $assetType];

        return $this->deleteRaw($assetID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $assetID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AssetDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);
        $assetType = $parsed['assetType'];
        unset($parsed['assetType']);

        // @phpstan-ignore-next-line;
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
