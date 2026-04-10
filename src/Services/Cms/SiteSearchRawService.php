<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\SiteSearch\IndexedData;
use HubSpotSDK\Cms\SiteSearch\PublicSearchResults;
use HubSpotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;
use HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams;
use HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams\Language;
use HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams\Length;
use HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
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

    /**
     * @api
     *
     * Returns any website content matching the given search criteria for a given HubSpot account. Searches can be filtered by content type, domain, or URL path. Includes options for weighing results by recency and popularity, along with language support.
     *
     * @param array{
     *   analytics?: bool,
     *   autocomplete?: bool,
     *   boostLimit?: float,
     *   boostRecent?: string,
     *   domain?: list<string>,
     *   groupID?: list<int>,
     *   hubdbQuery?: string,
     *   language?: value-of<Language>,
     *   length?: Length|value-of<Length>,
     *   limit?: int,
     *   matchPrefix?: bool,
     *   offset?: int,
     *   pathPrefix?: list<string>,
     *   popularityBoost?: float,
     *   property?: list<string>,
     *   q?: string,
     *   tableID?: int,
     *   type?: list<string>,
     *   types?: list<Type|value-of<Type>>,
     * }|SiteSearchSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSearchResults>
     *
     * @throws APIException
     */
    public function search(
        array|SiteSearchSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SiteSearchSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/site-search/2026-03/search',
            query: Util::array_transform_keys(
                $parsed,
                ['groupID' => 'groupId', 'tableID' => 'tableId']
            ),
            options: $options,
            convert: PublicSearchResults::class,
        );
    }
}
