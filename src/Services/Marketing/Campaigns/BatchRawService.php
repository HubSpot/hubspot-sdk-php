<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing\Campaigns;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\Batch\BatchCreateParams;
use HubSpotSDK\Marketing\Campaigns\Batch\BatchDeleteParams;
use HubSpotSDK\Marketing\Campaigns\Batch\BatchGetParams;
use HubSpotSDK\Marketing\Campaigns\Batch\BatchUpdateParams;
use HubSpotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubSpotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignDeleteInput;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignInput;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignReadInput;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\Campaigns\BatchRawContract;

/**
 * @phpstan-import-type PublicCampaignInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignInput
 * @phpstan-import-type PublicCampaignBatchUpdateItemShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem
 * @phpstan-import-type PublicCampaignDeleteInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignDeleteInput
 * @phpstan-import-type PublicCampaignReadInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignReadInput
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
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
     *   inputs: list<PublicCampaignInput|PublicCampaignInputShape>
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/campaigns/2026-03/batch/create',
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
     * @param array{
     *   inputs: list<PublicCampaignBatchUpdateItem|PublicCampaignBatchUpdateItemShape>
     * }|BatchUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicCampaign>
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/campaigns/2026-03/batch/update',
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
     * @param array{
     *   inputs: list<PublicCampaignDeleteInput|PublicCampaignDeleteInputShape>
     * }|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/campaigns/2026-03/batch/archive',
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
     * @param array{
     *   inputs: list<PublicCampaignReadInput|PublicCampaignReadInputShape>,
     *   endDate?: string,
     *   properties?: list<string>,
     *   startDate?: string,
     * }|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicCampaignWithAssets>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['endDate', 'properties', 'startDate']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/campaigns/2026-03/batch/read',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePublicCampaignWithAssets::class,
        );
    }
}
