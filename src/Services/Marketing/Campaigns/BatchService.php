<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Batch\BatchCreateParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchDeleteParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchGetParams;
use HubspotSDK\Marketing\Campaigns\Batch\BatchUpdateParams;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\BatchContract;

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
     * @param array{
     *   inputs: list<array{properties: array<string,string>}>
     * }|BatchCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponsePublicCampaign> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePublicCampaign::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint updates a batch of campaigns based on the provided input data.
     * The maximum number of items in a batch request is 50.
     * If an empty string ("") is passed for any property in the Batch Update, it will reset that property's value.
     *
     * @param array{
     *   inputs: list<array{id: string, properties: array<string,string>}>
     * }|BatchUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponsePublicCampaign> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePublicCampaign::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint deletes a batch of campaigns.
     * The maximum number of items in a batch request is 50.
     * The response will always be 204 No Content, regardless of whether the campaigns exist or not, whether they were successfully deleted or not, or if only some of the campaigns in the batch were deleted.
     *
     * @param array{inputs: list<array{id: string}>}|BatchDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint reads a batch of campaigns based on the provided input data and returns the campaigns along with their associated assets.
     * The maximum number of items in a batch request is 50.
     * The campaigns in the response are not guaranteed to be in the same order as they were provided in the request.
     * If duplicate campaign IDs are provided in the request, duplicates will be ignored. The response will include only unique IDs and will be returned without duplicates.
     *
     * @param array{
     *   inputs: list<array{id: string}>,
     *   endDate?: string,
     *   properties?: list<string>,
     *   startDate?: string,
     * }|BatchGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaignWithAssets {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['endDate', 'properties', 'startDate']);

        /** @var BaseResponse<BatchResponsePublicCampaignWithAssets> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePublicCampaignWithAssets::class,
        );

        return $response->parse();
    }
}
