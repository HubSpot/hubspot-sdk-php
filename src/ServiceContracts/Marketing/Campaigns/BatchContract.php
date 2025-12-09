<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<array{properties: array<string,string>}> $inputs
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign;

    /**
     * @api
     *
     * @param list<array{id: string, properties: array<string,string>}> $inputs
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign;

    /**
     * @api
     *
     * @param list<array{id: string}> $inputs
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<array{id: string}> $inputs Body param:
     * @param string $endDate Query param: End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     * @param list<string> $properties Query param: A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     * @param string $startDate Query param: Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        ?string $endDate = null,
        ?array $properties = null,
        ?string $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicCampaignWithAssets;
}
