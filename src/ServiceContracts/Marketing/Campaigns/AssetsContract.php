<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Campaigns;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface AssetsContract
{
    /**
     * @api
     *
     * @param string $assetID The id of asset to disassociate, required
     * Example: 154543
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param string $assetType The type of asset to disassociate, required
     * Example: OBJECT_LIST
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        string $campaignGuid,
        string $assetType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $assetType Path param: The type of asset to fetch, required
     * Example: MARKETING_EVENT
     * @param string $campaignGuid Path param: The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $endDate Query param: End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.  If not provided, no asset metrics will be fetched.
     * Example: 2024-01-27
     * @param string $limit query param: The maximum number of results to display per page
     * @param string $startDate Query param: Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.  If not provided, no asset metrics will be fetched.
     * Example: 2023-01-20
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
    ): CollectionResponsePublicCampaignAssetForwardPaging;

    /**
     * @api
     *
     * @param string $assetID The id of asset to disassociate, required
     * Example: 154543
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param string $assetType The type of asset to disassociate, required
     * Example: OBJECT_LIST
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        string $campaignGuid,
        string $assetType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
