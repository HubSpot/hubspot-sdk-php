<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\Cms\SiteSearch\IndexedData;
use HubSpotSDK\Cms\SiteSearch\PublicSearchResults;
use HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams\Language;
use HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams\Length;
use HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
