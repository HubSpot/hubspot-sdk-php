<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface AssetsContract
{
    /**
     * @api
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
    ): mixed;

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
    ): mixed;

    /**
     * @api
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
    ): CollectionResponsePublicCampaignAssetForwardPaging;

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
    ): CollectionResponsePublicCampaignAssetForwardPaging;

    /**
     * @api
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
    ): mixed;

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
    ): mixed;
}
