<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\SiteSearch\IndexedData;
use HubspotSDK\Cms\SiteSearch\PublicSearchResults;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Language;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Length;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\SiteSearchContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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

    /**
     * @api
     *
     * @param list<string> $domain
     * @param list<int> $groupID
     * @param Language|value-of<Language> $language
     * @param Length|value-of<Length> $length
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $pathPrefix
     * @param list<string> $property
     * @param list<string> $type
     * @param list<Type|value-of<Type>> $types
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        ?bool $analytics = null,
        ?bool $autocomplete = null,
        ?float $boostLimit = null,
        ?string $boostRecent = null,
        ?array $domain = null,
        ?array $groupID = null,
        ?string $hubdbQuery = null,
        Language|string|null $language = null,
        Length|string|null $length = null,
        ?int $limit = null,
        ?bool $matchPrefix = null,
        ?int $offset = null,
        ?array $pathPrefix = null,
        ?float $popularityBoost = null,
        ?array $property = null,
        ?string $q = null,
        ?int $tableID = null,
        ?array $type = null,
        ?array $types = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSearchResults {
        $params = Util::removeNulls(
            [
                'analytics' => $analytics,
                'autocomplete' => $autocomplete,
                'boostLimit' => $boostLimit,
                'boostRecent' => $boostRecent,
                'domain' => $domain,
                'groupID' => $groupID,
                'hubdbQuery' => $hubdbQuery,
                'language' => $language,
                'length' => $length,
                'limit' => $limit,
                'matchPrefix' => $matchPrefix,
                'offset' => $offset,
                'pathPrefix' => $pathPrefix,
                'popularityBoost' => $popularityBoost,
                'property' => $property,
                'q' => $q,
                'tableID' => $tableID,
                'type' => $type,
                'types' => $types,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
