<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Batch\BatchCreateParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchDeleteParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchGetParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchUpdateParams;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;
use HubspotSDK\Marketing\Campaigns\PublicCampaignDeleteInput;
use HubspotSDK\Marketing\Campaigns\PublicCampaignInput;
use HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\BatchContract;

use const HubspotSDK\Core\OMIT as omit;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint creates a batch of campaigns. The maximum number of items in a batch request is 50.
     * The campaigns in the response are not guaranteed to be in the same order as they were provided in the request.
     *
     * @param list<PublicCampaignInput> $inputs
     *
     * @throws APIException
     */
    public function create(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign {
        $params = ['inputs' => $inputs];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): BatchResponsePublicCampaign {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePublicCampaign::class,
        );
    }

    /**
     * @api
     *
     * This endpoint updates a batch of campaigns based on the provided input data.
     * The maximum number of items in a batch request is 50.
     * If an empty string ("") is passed for any property in the Batch Update, it will reset that property's value.
     *
     * @param list<PublicCampaignBatchUpdateItem> $inputs
     *
     * @throws APIException
     */
    public function update(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign {
        $params = ['inputs' => $inputs];

        return $this->updateRaw($params, $requestOptions);
    }

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
    ): BatchResponsePublicCampaign {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePublicCampaign::class,
        );
    }

    /**
     * @api
     *
     * This endpoint deletes a batch of campaigns.
     * The maximum number of items in a batch request is 50.
     * The response will always be 204 No Content, regardless of whether the campaigns exist or not, whether they were successfully deleted or not, or if only some of the campaigns in the batch were deleted.
     *
     * @param list<PublicCampaignDeleteInput> $inputs
     *
     * @throws APIException
     */
    public function delete(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->deleteRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * This endpoint reads a batch of campaigns based on the provided input data and returns the campaigns along with their associated assets.
     * The maximum number of items in a batch request is 50.
     * The campaigns in the response are not guaranteed to be in the same order as they were provided in the request.
     * If duplicate campaign IDs are provided in the request, duplicates will be ignored. The response will include only unique IDs and will be returned without duplicates.
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
    ): BatchResponsePublicCampaignWithAssets {
        $params = [
            'inputs' => $inputs,
            'endDate' => $endDate,
            'properties' => $properties,
            'startDate' => $startDate,
        ];

        return $this->getRaw($params, $requestOptions);
    }

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
    ): BatchResponsePublicCampaignWithAssets {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(['endDate', 'properties', 'startDate']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePublicCampaignWithAssets::class,
        );
    }
}
