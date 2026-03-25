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
use HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;
use HubspotSDK\Marketing\Campaigns\PublicCampaignDeleteInput;
use HubspotSDK\Marketing\Campaigns\PublicCampaignInput;
use HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\BatchRawContract;

/**
 * @phpstan-import-type PublicCampaignInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignInput
 * @phpstan-import-type PublicCampaignBatchUpdateItemShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem
 * @phpstan-import-type PublicCampaignDeleteInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignDeleteInput
 * @phpstan-import-type PublicCampaignReadInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Create a batch of campaigns with specified properties. This endpoint allows for the creation of multiple campaigns in a single request. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
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
     * Update a batch of marketing campaigns with specified properties. This endpoint allows you to modify multiple campaigns in one request. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
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
     * Archive a batch of marketing campaigns in your HubSpot account. This operation permanently removes the specified campaigns, making them inaccessible. It is useful for cleaning up outdated or unnecessary campaigns in bulk.
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
     * Retrieve a batch of campaigns with specified properties and date range. This endpoint allows you to filter campaigns by start and end dates and specify which properties to include in the response.
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
