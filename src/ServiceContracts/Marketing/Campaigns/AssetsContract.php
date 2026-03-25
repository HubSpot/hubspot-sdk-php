<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AssetsContract
{
    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): CollectionResponsePublicCampaignAssetForwardPaging;

    /**
     * @api
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
    ): mixed;
}
