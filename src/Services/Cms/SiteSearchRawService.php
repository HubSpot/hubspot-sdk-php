<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\SiteSearch\IndexedData;
use HubSpotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\SiteSearchRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SiteSearchRawService implements SiteSearchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return all indexed data for an asset (e.g., page, blog post, HubDB table), specified by ID. This is useful when debugging why a particular asset is not returned from a custom search.
     *
     * @param array{type?: string}|SiteSearchGetIndexedDataParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IndexedData>
     *
     * @throws APIException
     */
    public function getIndexedData(
        string $contentID,
        array|SiteSearchGetIndexedDataParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SiteSearchGetIndexedDataParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/site-search/2026-03/indexed-data/%1$s', $contentID],
            query: $parsed,
            options: $options,
            convert: IndexedData::class,
        );
    }
}
