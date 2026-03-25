<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\SiteSearch\IndexedData;
use HubspotSDK\Cms\SiteSearch\PublicSearchResults;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Language;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Length;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SiteSearchContract
{
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
    ): IndexedData;

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
    ): PublicSearchResults;
}
