<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\URLRedirects\URLMapping;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\URLRedirectsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class URLRedirectsService implements URLRedirectsContract
{
    /**
     * @api
     */
    public URLRedirectsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new URLRedirectsRawService($client);
    }

    /**
     * @api
     *
     * Create a new URL redirect in your HubSpot account. This endpoint allows you to define a new URL mapping that redirects traffic from a specified route to a destination URL. This is useful for managing URL changes, handling outdated links, or creating short links.
     *
     * @param string $destination the destination URL, where the target URL should be redirected if it matches the `routePrefix`
     * @param int $redirectStyle The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy). Find more details [here](https://knowledge.hubspot.com/cos-general/how-to-redirect-a-hubspot-page).
     * @param string $routePrefix the target incoming URL, path, or pattern to match for redirection
     * @param bool $isMatchFullURL whether the `routePrefix` should match on the entire URL, including the domain
     * @param bool $isMatchQueryString whether the `routePrefix` should match on the entire URL path, including the query string
     * @param bool $isOnlyAfterNotFound Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     * @param bool $isPattern whether the `routePrefix` should match based on pattern
     * @param bool $isProtocolAgnostic whether the `routePrefix` should match both HTTP and HTTPS protocols
     * @param bool $isTrailingSlashOptional whether a trailing slash will be ignored
     * @param int $precedence Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the **lower** precedence will be used.
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
    ): URLMapping {
        $params = Util::removeNulls(
            [
                'destination' => $destination,
                'redirectStyle' => $redirectStyle,
                'routePrefix' => $routePrefix,
                'isMatchFullURL' => $isMatchFullURL,
                'isMatchQueryString' => $isMatchQueryString,
                'isOnlyAfterNotFound' => $isOnlyAfterNotFound,
                'isPattern' => $isPattern,
                'isProtocolAgnostic' => $isProtocolAgnostic,
                'isTrailingSlashOptional' => $isTrailingSlashOptional,
                'precedence' => $precedence,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the settings for an existing URL redirect.
     *
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
    ): URLMapping {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'created' => $created,
                'destination' => $destination,
                'isMatchFullURL' => $isMatchFullURL,
                'isMatchQueryString' => $isMatchQueryString,
                'isOnlyAfterNotFound' => $isOnlyAfterNotFound,
                'isPattern' => $isPattern,
                'isProtocolAgnostic' => $isProtocolAgnostic,
                'isTrailingSlashOptional' => $isTrailingSlashOptional,
                'precedence' => $precedence,
                'redirectStyle' => $redirectStyle,
                'routePrefix' => $routePrefix,
                'updated' => $updated,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($urlRedirectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of URL redirects configured in your HubSpot account. This endpoint allows you to filter redirects based on their creation or update timestamps, and sort the results. It supports pagination and can include archived redirects if specified.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'createdAfter' => $createdAfter,
                'createdAt' => $createdAt,
                'createdBefore' => $createdBefore,
                'limit' => $limit,
                'sort' => $sort,
                'updatedAfter' => $updatedAfter,
                'updatedAt' => $updatedAt,
                'updatedBefore' => $updatedBefore,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete one existing redirect, so it is no longer mapped.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $urlRedirectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($urlRedirectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details for a single existing URL redirect by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $urlRedirectID,
        RequestOptions|array|null $requestOptions = null
    ): URLMapping {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($urlRedirectID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
