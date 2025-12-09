<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CampaignCreateParams;
use HubspotSDK\Marketing\Campaigns\CampaignGetParams;
use HubspotSDK\Marketing\Campaigns\CampaignListParams;
use HubspotSDK\Marketing\Campaigns\CampaignUpdateParams;
use HubspotSDK\Marketing\Campaigns\PublicCampaign;
use HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\CampaignsRawContract;

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
     * Create a campaign with the given properties and return the campaign object, including the campaignGuid and created properties.
     *
     * @param array{properties: array<string,string>}|CampaignCreateParams $params
     *
     * @return BaseResponse<PublicCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|CampaignCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CampaignCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/campaigns/',
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
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param array{properties: array<string,string>}|CampaignUpdateParams $params
     *
     * @return BaseResponse<PublicCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        array|CampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/campaigns/%1$s', $campaignGuid],
            body: (object) $parsed,
            options: $options,
            convert: PublicCampaign::class,
        );
    }

    /**
     * @api
     *
     * This endpoint allows users to search for and return a page of campaigns based on various query parameters. Users can filter by name, sort, and paginate through the campaigns, as well as control which properties are returned in the response.
     *
     * @param array{
     *   after?: string,
     *   limit?: int,
     *   name?: string,
     *   properties?: list<string>,
     *   sort?: string,
     * }|CampaignListParams $params
     *
     * @return BaseResponse<Page<PublicCampaign>>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CampaignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/campaigns/',
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
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/campaigns/%1$s', $campaignGuid],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a campaign identified by a specific campaignGuid with the given properties. Along with the campaign information, it also returns information about assets. Depending on the query parameters used, this can also be used to return information about the corresponding assets' metrics. Metrics are available only if startDate and endDate are provided.
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param array{
     *   endDate?: string, properties?: list<string>, startDate?: string
     * }|CampaignGetParams $params
     *
     * @return BaseResponse<PublicCampaignWithAssets>
     *
     * @throws APIException
     */
    public function get(
        string $campaignGuid,
        array|CampaignGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/campaigns/%1$s', $campaignGuid],
            query: $parsed,
            options: $options,
            convert: PublicCampaignWithAssets::class,
        );
    }
}
