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
     * @param string $assetType Path param
     * @param string $campaignGuid Path param
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $endDate Query param
     * @param string $limit query param: The maximum number of results to display per page
     * @param string $startDate Query param
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
