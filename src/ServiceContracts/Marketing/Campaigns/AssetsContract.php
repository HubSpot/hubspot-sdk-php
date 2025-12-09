<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubspotSDK\RequestOptions;

interface AssetsContract
{
    /**
     * @api
     *
     * @param string $assetID Id of the asset
     * @param string $campaignGuid Unique identifier for the campaign, formatted as a UUID
     * @param string $assetType The type of asset
     * Important: Currently, only the following asset types are available for association via the API: FORM, OBJECT_LIST, EXTERNAL_WEB_URL
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        string $campaignGuid,
        string $assetType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
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
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicCampaignAssetForwardPaging;

    /**
     * @api
     *
     * @param string $assetID Id of the asset
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param string $assetType The type of asset
     * Important: Currently, only the following asset types are available for disassociation via the API: FORM, OBJECT_LIST, EXTERNAL_WEB_URL
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        string $campaignGuid,
        string $assetType,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
