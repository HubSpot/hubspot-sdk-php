<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\AssetsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AssetsService implements AssetsContract
{
    /**
     * @api
     */
    public AssetsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AssetsRawService($client);
    }

    /**
     * @api
     *
     * Associate a specified asset with a campaign. Using the API, you can create and remove associations for the following asset types: forms, static lists, external website pages, sequences, meetings, playbooks, feedback surveys, podcast episodes, sales documents, marketing emails, case studies, knowledge base articles, calls, and CTAs.
     *
     * For other asset types, it is recommended to manage your associations directly in the campaign tool in HubSpot.
     *
     * @param string $assetID Id of the asset
     * @param string $campaignGuid Unique identifier for the campaign, formatted as a UUID
     * @param string $assetType The type of asset
     * Important: Currently, only the following asset types are available for association via the API: FORM, OBJECT_LIST, EXTERNAL_WEB_URL
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        string $campaignGuid,
        string $assetType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['campaignGuid' => $campaignGuid, 'assetType' => $assetType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($assetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint lists all assets of the campaign by asset type. The assetType parameter is required, and each request can only fetch assets of a single type.
     * Asset metrics can also be fetched along with the assets; they are available only if start and end dates are provided.
     *
     * @param string $assetType path param: The type of asset to fetch
     * @param string $campaignGuid path param: Unique identifier for the campaign, formatted as a UUID
     * @param string $after Query param: A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D
     * @param string $endDate Query param: End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     * @param string $limit Query param: The maximum number of results to return.
     * Default: 10
     * @param string $startDate Query param: Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $assetType,
        string $campaignGuid,
        ?string $after = null,
        ?string $endDate = null,
        ?string $limit = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicCampaignAssetForwardPaging {
        $params = Util::removeNulls(
            [
                'campaignGuid' => $campaignGuid,
                'after' => $after,
                'endDate' => $endDate,
                'limit' => $limit,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($assetType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Disassociate a specified asset from a campaign.
     * Important: Currently, only the following asset types can be associated and disassociated via the API: Forms, Static lists, External website pages
     *
     * @param string $assetID Id of the asset
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param string $assetType The type of asset
     * Important: Currently, only the following asset types are available for disassociation via the API: FORM, OBJECT_LIST, EXTERNAL_WEB_URL
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        string $campaignGuid,
        string $assetType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['campaignGuid' => $campaignGuid, 'assetType' => $assetType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($assetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
