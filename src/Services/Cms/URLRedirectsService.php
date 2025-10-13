<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\URLRedirects\URLMapping;
use HubspotSDK\Cms\URLRedirects\URLRedirectCreateParams;
use HubspotSDK\Cms\URLRedirects\URLRedirectListParams;
use HubspotSDK\Cms\URLRedirects\URLRedirectUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\URLRedirectsContract;

use const HubspotSDK\Core\OMIT as omit;

final class URLRedirectsService implements URLRedirectsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates and configures a new URL redirect.
     *
     * @param string $destination
     * @param int $redirectStyle
     * @param string $routePrefix
     * @param bool $isMatchFullURL
     * @param bool $isMatchQueryString
     * @param bool $isOnlyAfterNotFound
     * @param bool $isPattern
     * @param bool $isProtocolAgnostic
     * @param bool $isTrailingSlashOptional
     * @param int $precedence
     *
     * @throws APIException
     */
    public function create(
        $destination,
        $redirectStyle,
        $routePrefix,
        $isMatchFullURL = omit,
        $isMatchQueryString = omit,
        $isOnlyAfterNotFound = omit,
        $isPattern = omit,
        $isProtocolAgnostic = omit,
        $isTrailingSlashOptional = omit,
        $precedence = omit,
        ?RequestOptions $requestOptions = null,
    ): URLMapping {
        $params = [
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
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): URLMapping {
        [$parsed, $options] = URLRedirectCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/url-redirects/',
            body: (object) $parsed,
            options: $options,
            convert: URLMapping::class,
        );
    }

    /**
     * @api
     *
     * Updates the settings for an existing URL redirect.
     *
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
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $updated
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        $id,
        $destination,
        $isMatchFullURL,
        $isMatchQueryString,
        $isOnlyAfterNotFound,
        $isPattern,
        $isProtocolAgnostic,
        $isTrailingSlashOptional,
        $precedence,
        $redirectStyle,
        $routePrefix,
        $created = omit,
        $updated = omit,
        ?RequestOptions $requestOptions = null,
    ): URLMapping {
        $params = [
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
        ];

        return $this->updateRaw($urlRedirectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $urlRedirectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): URLMapping {
        [$parsed, $options] = URLRedirectUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/url-redirects/%1$s', $urlRedirectID],
            body: (object) $parsed,
            options: $options,
            convert: URLMapping::class,
        );
    }

    /**
     * @api
     *
     * Returns all existing URL redirects. Results can be limited and filtered by creation or updated date.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param \DateTimeInterface $createdAfter only return redirects created after this date
     * @param \DateTimeInterface $createdAt only return redirects created on exactly this date
     * @param \DateTimeInterface $createdBefore only return redirects created before this date
     * @param int $limit Maximum number of result per page
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter only return redirects last updated after this date
     * @param \DateTimeInterface $updatedAt only return redirects last updated on exactly this date
     * @param \DateTimeInterface $updatedBefore only return redirects last updated before this date
     *
     * @return Page<URLMapping>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $limit = omit,
        $sort = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
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
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<URLMapping>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = URLRedirectListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/url-redirects/',
            query: $parsed,
            options: $options,
            convert: URLMapping::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete one existing redirect, so it is no longer mapped.
     *
     * @throws APIException
     */
    public function delete(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/url-redirects/%1$s', $urlRedirectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns the details for a single existing URL redirect by ID.
     *
     * @throws APIException
     */
    public function read(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): URLMapping {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/url-redirects/%1$s', $urlRedirectID],
            options: $requestOptions,
            convert: URLMapping::class,
        );
    }
}
