<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\SiteSearch\IndexedData;
use HubspotSDK\Cms\SiteSearch\PublicSearchResults;
use HubspotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Language;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\SiteSearchContract;

final class SiteSearchService implements SiteSearchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * For a given account and document ID (page ID, blog post ID, HubDB row ID, etc.), return all indexed data for that document. This is useful when debugging why a particular document is not returned from a custom search.
     *
     * @param array{
     *   type?: 'BLOG_POST'|'KNOWLEDGE_ARTICLE'|'LANDING_PAGE'|'LISTING_PAGE'|'SITE_PAGE',
     * }|SiteSearchGetIndexedDataParams $params
     *
     * @throws APIException
     */
    public function getIndexedData(
        string $contentID,
        array|SiteSearchGetIndexedDataParams $params,
        ?RequestOptions $requestOptions = null,
    ): IndexedData {
        [$parsed, $options] = SiteSearchGetIndexedDataParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/site-search/indexed-data/%1$s', $contentID],
            query: $parsed,
            options: $options,
            convert: IndexedData::class,
        );
    }

    /**
     * @api
     *
     * Returns any website content matching the given search criteria for a given HubSpot account. Searches can be filtered by content type, domain, or URL path.
     *
     * @param array{
     *   autocomplete?: bool,
     *   boostLimit?: float,
     *   boostRecent?: string,
     *   domain?: list<string>,
     *   groupId?: list<int>,
     *   hubdbQuery?: string,
     *   language?: value-of<Language>,
     *   length?: 'LONG'|'SHORT',
     *   limit?: int,
     *   matchPrefix?: bool,
     *   offset?: int,
     *   pathPrefix?: list<string>,
     *   popularityBoost?: float,
     *   property?: list<string>,
     *   q?: string,
     *   tableId?: int,
     *   type?: list<'LANDING_PAGE'|'BLOG_POST'|'SITE_PAGE'|'KNOWLEDGE_ARTICLE'|'LISTING_PAGE'>,
     * }|SiteSearchSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|SiteSearchSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): PublicSearchResults {
        [$parsed, $options] = SiteSearchSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/site-search/search',
            query: $parsed,
            options: $options,
            convert: PublicSearchResults::class,
        );
    }
}
