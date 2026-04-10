<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing\Campaigns;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Marketing\Campaigns\CollectionResponsePublicCampaignAssetForwardPaging;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\Campaigns\AssetsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class AssetsService implements AssetsContract
{
    /**
     * @api
     */
    public AssetsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AssetsRawService($client);
    }

    /**
     * @api
     *
     * Associate a specified asset with a campaign. Using the API, you can create associations for the following asset types: ads, blog posts, calls, case studies, CTAs, CTAs (legacy), external website pages, feedback surveys, forms, files, knowledge base articles, landing pages, marketing email, marketing events, meetings, playbooks, podcast episodes, sales documents, sales emails, sequences, SMS, social posts, static lists, videos, website pages, and workflows.
     *
     * For other asset types, it is recommended to manage your associations directly in the campaign tool in HubSpot.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $assetID,
        string $campaignGuid,
        string $assetType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['campaignGuid' => $campaignGuid, 'assetType' => $assetType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($assetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint lists all assets of the campaign by asset type. The assetType parameter is required, and each request can only fetch assets of a single type.
     * Asset metrics can also be fetched along with the assets; they are available only if start and end dates are provided.
     *
     * @param string $assetType Path param
     * @param string $campaignGuid Path param
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $endDate Query param
     * @param string $limit query param: The maximum number of results to display per page
     * @param string $startDate Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $assetType,
        string $campaignGuid,
        ?string $after = null,
        ?string $endDate = null,
        ?string $limit = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicCampaignAssetForwardPaging {
        $params = Util::removeNulls(
            [
                'campaignGuid' => $campaignGuid,
                'after' => $after,
                'endDate' => $endDate,
                'limit' => $limit,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($assetType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Disassociate a specified asset from a campaign. Using the API, you can remove associations for the following asset types: ads, blog posts, calls, case studies, CTAs, CTAs (legacy), external website pages, feedback surveys, forms, files, knowledge base articles, landing pages, marketing email, marketing events, meetings, playbooks, podcast episodes, sales documents, sales emails, sequences, SMS, social posts, static lists, videos, website pages, and workflows.
     *
     * For other asset types, it is recommended to manage your associations directly in the campaign tool in HubSpot.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $assetID,
        string $campaignGuid,
        string $assetType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['campaignGuid' => $campaignGuid, 'assetType' => $assetType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($assetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
