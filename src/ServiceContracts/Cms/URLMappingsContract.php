<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\URLMappings\URLMappingCreateParams\CosObjectType;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface URLMappingsContract
{
    /**
     * @api
     *
     * @param int $id the unique identifier for the URL mapping, represented as a 64-bit integer
     * @param int $cdnPurgeEmbargoTime a Unix timestamp in milliseconds indicating the embargo time for CDN purge related to the URL mapping
     * @param int $contentGroupID a 64-bit integer representing the content group associated with the URL mapping
     * @param CosObjectType|value-of<CosObjectType> $cosObjectType A string representing the type of content object associated with the URL mapping. Valid values include various content types such as 'CONTENT', 'LAYOUT', 'FILE', etc.
     * @param int $created a Unix timestamp in milliseconds indicating when the URL mapping was created
     * @param int $createdByID the identifier of the user who created the URL mapping
     * @param int $deletedAt a Unix timestamp in milliseconds indicating when the URL mapping was deleted
     * @param string $destination the destination URL to which the routePrefix is redirected
     * @param bool $internallyCreated a boolean indicating if the URL mapping was created internally by the system
     * @param bool $isActive a boolean indicating if the URL mapping is currently active
     * @param bool $isMatchFullURL a boolean indicating if the full URL should be matched
     * @param bool $isMatchQueryString a boolean indicating if the query string should be matched
     * @param bool $isOnlyAfterNotFound a boolean indicating if the mapping should only be applied after a 404 Not Found response
     * @param bool $isPattern a boolean indicating if the routePrefix is a pattern
     * @param bool $isProtocolAgnostic a boolean indicating if the mapping should ignore the URL protocol (http/https)
     * @param bool $isRegex a boolean indicating if the routePrefix should be treated as a regular expression
     * @param bool $isTrailingSlashOptional a boolean indicating if the trailing slash in the URL is optional
     * @param string $label a label for the URL mapping
     * @param string $name the name of the URL mapping
     * @param string $note a string containing notes about the URL mapping
     * @param int $portalID the identifier for the HubSpot portal associated with this URL mapping
     * @param int $precedence an integer representing the precedence of the URL mapping, used to determine order of evaluation
     * @param int $redirectStyle an integer representing the style of redirection used
     * @param string $routePrefix the prefix of the URL path that is being mapped
     * @param int $updated a Unix timestamp in milliseconds indicating when the URL mapping was last updated
     * @param int $updatedByID the identifier of the user who last updated the URL mapping
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $id,
        int $cdnPurgeEmbargoTime,
        int $contentGroupID,
        CosObjectType|string $cosObjectType,
        int $created,
        int $createdByID,
        int $deletedAt,
        string $destination,
        bool $internallyCreated,
        bool $isActive,
        bool $isMatchFullURL,
        bool $isMatchQueryString,
        bool $isOnlyAfterNotFound,
        bool $isPattern,
        bool $isProtocolAgnostic,
        bool $isRegex,
        bool $isTrailingSlashOptional,
        string $label,
        string $name,
        string $note,
        int $portalID,
        int $precedence,
        int $redirectStyle,
        string $routePrefix,
        int $updated,
        int $updatedByID,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): string;
}
