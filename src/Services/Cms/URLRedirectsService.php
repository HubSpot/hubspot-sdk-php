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
     * Create a redirect
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
     * Update a redirect
     *
     * @param string $id
     * @param string $destination
     * @param bool $isMatchFullURL
     * @param bool $isMatchQueryString
     * @param bool $isOnlyAfterNotFound
     * @param bool $isPattern
     * @param bool $isProtocolAgnostic
     * @param bool $isTrailingSlashOptional
     * @param int $precedence
     * @param int $redirectStyle
     * @param string $routePrefix
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
     * Get current redirects
     *
     * @param string $after
     * @param bool $archived
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param int $limit
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
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
     * Delete a redirect
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
     * Get details for a redirect
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
