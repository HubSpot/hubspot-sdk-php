<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\URLRedirects\URLMapping;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface URLRedirectsContract
{
    /**
     * @api
     *
     * @param string $destination the destination URL, where the target URL should be redirected if it matches the routePrefix
     * @param int $redirectStyle The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy).
     * @param string $routePrefix the target incoming URL, path, or pattern to match for redirection
     * @param bool $isMatchFullURL whether the routePrefix should match on the entire URL, including the domain
     * @param bool $isMatchQueryString whether the routePrefix should match on the entire URL path, including the query string
     * @param bool $isOnlyAfterNotFound Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     * @param bool $isPattern whether the routePrefix should match based on pattern
     * @param bool $isProtocolAgnostic whether the routePrefix should match both HTTP and HTTPS protocols
     * @param bool $isTrailingSlashOptional whether a trailing slash will be ignored
     * @param int $precedence Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the lower precedence will be used.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $destination,
        int $redirectStyle,
        string $routePrefix,
        ?bool $isMatchFullURL = null,
        ?bool $isMatchQueryString = null,
        ?bool $isOnlyAfterNotFound = null,
        ?bool $isPattern = null,
        ?bool $isProtocolAgnostic = null,
        ?bool $isTrailingSlashOptional = null,
        ?int $precedence = null,
        RequestOptions|array|null $requestOptions = null,
    ): URLMapping;

    /**
     * @api
     *
     * @param string $urlRedirectID the unique identifier of the URL redirect to update
     * @param string $id the unique ID of this URL redirect
     * @param \DateTimeInterface $created the date and time when the URL mapping was initially created
     * @param string $destination the destination URL, where the target URL should be redirected if it matches the `routePrefix`
     * @param bool $isMatchFullURL whether the `routePrefix` should match on the entire URL, including the domain
     * @param bool $isMatchQueryString whether the `routePrefix` should match on the entire URL path, including the query string
     * @param bool $isOnlyAfterNotFound Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     * @param bool $isPattern whether the `routePrefix` should match based on pattern
     * @param bool $isProtocolAgnostic whether the `routePrefix` should match both HTTP and HTTPS protocols
     * @param bool $isTrailingSlashOptional whether a trailing slash will be ignored
     * @param int $precedence Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the **lower** precedence will be used.
     * @param int $redirectStyle The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy). Find more details [here](https://knowledge.hubspot.com/cos-general/how-to-redirect-a-hubspot-page).
     * @param string $routePrefix the target incoming URL, path, or pattern to match for redirection
     * @param \DateTimeInterface $updated the date and time when the URL mapping was last modified
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        string $id,
        \DateTimeInterface $created,
        string $destination,
        bool $isMatchFullURL,
        bool $isMatchQueryString,
        bool $isOnlyAfterNotFound,
        bool $isPattern,
        bool $isProtocolAgnostic,
        bool $isTrailingSlashOptional,
        int $precedence,
        int $redirectStyle,
        string $routePrefix,
        \DateTimeInterface $updated,
        RequestOptions|array|null $requestOptions = null,
    ): URLMapping;

    /**
     * @api
     *
     * @param string $after A cursor token for pagination. Use the value from the previous response's paging.next.after field.
     * @param bool $archived whether to return only results that have been archived
     * @param \DateTimeInterface $createdAfter Filter redirects created after a specific timestamp. Format must be date-time.
     * @param \DateTimeInterface $createdAt Filter redirects by their exact creation timestamp. Format must be date-time.
     * @param \DateTimeInterface $createdBefore Filter redirects created before a specific timestamp. Format must be date-time.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort Specify the order in which to sort the results. Accepts an array of strings.
     * @param \DateTimeInterface $updatedAfter Filter redirects updated after a specific timestamp. Format must be date-time.
     * @param \DateTimeInterface $updatedAt Filter redirects by their exact update timestamp. Format must be date-time.
     * @param \DateTimeInterface $updatedBefore Filter redirects updated before a specific timestamp. Format must be date-time.
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<URLMapping>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?int $limit = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $urlRedirectID the unique identifier of the URL redirect to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $urlRedirectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $urlRedirectID the unique identifier of the URL redirect to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $urlRedirectID,
        RequestOptions|array|null $requestOptions = null
    ): URLMapping;
}
