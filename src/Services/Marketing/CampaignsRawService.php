<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\CampaignCreateParams;
use HubSpotSDK\Marketing\Campaigns\CampaignGetParams;
use HubSpotSDK\Marketing\Campaigns\CampaignListParams;
use HubSpotSDK\Marketing\Campaigns\CampaignUpdateParams;
use HubSpotSDK\Marketing\Campaigns\PublicCampaign;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\CampaignsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class CampaignsRawService implements CampaignsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a campaign with the specified properties and receive a copy of the campaign object, including its ID. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
     *
     * @param array{properties: array<string,string>}|CampaignCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|CampaignCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/campaigns/2026-03',
            body: (object) $parsed,
            options: $options,
            convert: PublicCampaign::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of a campaign identified by the specified campaignGuid. Provided property values will be overwritten. Read-only and non-existent properties will cause 400 error.
     * If an empty string is passed for any property in the Batch Update, it will reset that property's value.
     *
     * @param array{properties: array<string,string>}|CampaignUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        array|CampaignUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['marketing/campaigns/2026-03/%1$s', $campaignGuid],
            body: (object) $parsed,
            options: $options,
            convert: PublicCampaign::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of campaigns from your HubSpot account. This endpoint allows you to specify sorting, pagination, and filtering options to tailor the results to your needs.
     *
     * @param array{
     *   after?: string,
     *   limit?: int,
     *   name?: string,
     *   properties?: list<string>,
     *   sort?: string,
     * }|CampaignListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicCampaign>>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/campaigns/2026-03',
            query: $parsed,
            options: $options,
            convert: PublicCampaign::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a specified campaign from the system.
     * This call will return a 204 No Content response regardless of whether the campaignGuid provided corresponds to an existing campaign or not.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['marketing/campaigns/2026-03/%1$s', $campaignGuid],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a campaign identified by a specific campaignGuid with the given properties. Along with the campaign information, it also returns information about assets. Depending on the query parameters used, this can also be used to return information about the corresponding assets' metrics. Metrics are available only if startDate and endDate are provided.
     *
     * @param array{
     *   endDate?: string, properties?: list<string>, startDate?: string
     * }|CampaignGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCampaignWithAssets>
     *
     * @throws APIException
     */
    public function get(
        string $campaignGuid,
        array|CampaignGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/campaigns/2026-03/%1$s', $campaignGuid],
            query: $parsed,
            options: $options,
            convert: PublicCampaignWithAssets::class,
        );
    }
}
