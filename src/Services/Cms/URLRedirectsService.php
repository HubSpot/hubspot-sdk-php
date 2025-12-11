<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\URLRedirects\URLMapping;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\URLRedirectsContract;

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
     * Creates and configures a new URL redirect.
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
        ?RequestOptions $requestOptions = null,
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
     * @param string $urlRedirectID the ID of the target url redirect to update
     * @param string $id the unique ID of this URL redirect
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
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        string $id,
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
        string|\DateTimeInterface|null $created = null,
        string|\DateTimeInterface|null $updated = null,
        ?RequestOptions $requestOptions = null,
    ): URLMapping {
        $params = Util::removeNulls(
            [
                'id' => $id,
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
                'created' => $created,
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
     * Returns all existing URL redirects. Results can be limited and filtered by creation or updated date.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param string|\DateTimeInterface $createdAfter only return redirects created after this date
     * @param string|\DateTimeInterface $createdAt only return redirects created on exactly this date
     * @param string|\DateTimeInterface $createdBefore only return redirects created before this date
     * @param int $limit Maximum number of result per page
     * @param list<string> $sort a query parameter to specify the order in which the URL redirects are returned
     * @param string|\DateTimeInterface $updatedAfter only return redirects last updated after this date
     * @param string|\DateTimeInterface $updatedAt only return redirects last updated on exactly this date
     * @param string|\DateTimeInterface $updatedBefore only return redirects last updated before this date
     *
     * @return Page<URLMapping>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        string|\DateTimeInterface|null $createdAfter = null,
        string|\DateTimeInterface|null $createdAt = null,
        string|\DateTimeInterface|null $createdBefore = null,
        ?int $limit = null,
        ?array $sort = null,
        string|\DateTimeInterface|null $updatedAfter = null,
        string|\DateTimeInterface|null $updatedAt = null,
        string|\DateTimeInterface|null $updatedBefore = null,
        ?RequestOptions $requestOptions = null,
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
     * @param string $urlRedirectID the ID of the target redirect
     *
     * @throws APIException
     */
    public function delete(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
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
     * @param string $urlRedirectID the ID of the target redirect
     *
     * @throws APIException
     */
    public function get(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): URLMapping {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($urlRedirectID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
