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
     * Associate an asset with a specific campaign in your HubSpot account. This operation allows you to link an asset of a specified type and ID to a campaign, facilitating better organization and tracking of campaign resources.
     *
     * @param string $assetID the unique identifier of the asset to be associated with the campaign
     * @param string $campaignGuid the unique identifier of the campaign to which the asset will be associated
     * @param string $assetType the type of asset to be associated with the campaign
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
     * List all assets of a specified campaign by asset type. This endpoint allows you to retrieve assets associated with a campaign, filtered by the type of asset. It supports pagination and date filtering to manage and refine the results.
     *
     * @param string $assetType path param: The type of asset to list for the specified campaign
     * @param string $campaignGuid path param: The unique identifier of the campaign
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $endDate query param: The end date for filtering assets, in YYYY-MM-DD format
     * @param string $limit query param: The maximum number of results to display per page
     * @param string $startDate query param: The start date for filtering assets, in YYYY-MM-DD format
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
     * Disassociate an asset from a specific campaign. This operation removes the association between the specified asset and campaign, effectively detaching the asset from the campaign's context.
     *
     * @param string $assetID the unique identifier of the asset to be disassociated from the campaign
     * @param string $campaignGuid the unique identifier of the campaign from which the asset will be disassociated
     * @param string $assetType the type of asset to be disassociated from the campaign
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
