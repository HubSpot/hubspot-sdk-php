<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\SiteSearch\IndexedData;
use HubspotSDK\Cms\SiteSearch\PublicSearchResults;
use HubspotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Language;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Length;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\SiteSearchRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
