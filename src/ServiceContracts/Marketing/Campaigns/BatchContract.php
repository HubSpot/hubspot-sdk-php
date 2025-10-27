<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;
use HubspotSDK\Marketing\Campaigns\PublicCampaignDeleteInput;
use HubspotSDK\Marketing\Campaigns\PublicCampaignInput;
use HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<PublicCampaignInput> $inputs
     *
     * @throws APIException
     */
    public function create(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign;

    /**
     * @api
     *
     * @param list<PublicCampaignBatchUpdateItem> $inputs
     *
     * @throws APIException
     */
    public function update(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign;

    /**
     * @api
     *
     * @param list<PublicCampaignDeleteInput> $inputs
     *
     * @throws APIException
     */
    public function delete(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<PublicCampaignReadInput> $inputs
     * @param string $endDate End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     * @param list<string> $properties A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     * @param string $startDate Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     *
     * @throws APIException
     */
    public function get(
        $inputs,
        $endDate = omit,
        $properties = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicCampaignWithAssets;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaignWithAssets;
}
