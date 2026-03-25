<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\CampaignGetParams;
use HubspotSDK\Marketing\Campaigns\CampaignUpdateParams;
use HubspotSDK\Marketing\Campaigns\PublicCampaign;
use HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\CampaignsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Perform a partial update of a campaign identified by the specified ID. Provided property values will be overwritten. Read-only and non-existent properties will be ignored. Properties values can be cleared by passing an empty string. Note: The 'hs_goal' property is deprecated and will be ignored if provided.
     *
     * @param string $campaignGuid the unique identifier of the campaign to update
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
     * Delete a specified campaign from the system. This operation removes the campaign identified by the provided campaignGuid from your HubSpot account.
     *
     * @param string $campaignGuid the unique identifier of the campaign to delete
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
     * Read a campaign identified by a specified internal ID. This endpoint allows you to retrieve detailed information about a specific marketing campaign using its unique identifier. It supports filtering the response by specific properties and date ranges.
     *
     * @param string $campaignGuid the unique identifier of the campaign to retrieve
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
