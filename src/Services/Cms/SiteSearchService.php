<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\SiteSearch\IndexedData;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\SiteSearchContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SiteSearchService implements SiteSearchContract
{
    /**
     * @api
     */
    public SiteSearchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SiteSearchRawService($client);
    }

    /**
     * @api
     *
     * Return all indexed data for an asset (e.g., page, blog post, HubDB table), specified by ID. This is useful when debugging why a particular asset is not returned from a custom search.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getIndexedData(
        string $contentID,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): IndexedData {
        $params = Util::removeNulls(['type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getIndexedData($contentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
