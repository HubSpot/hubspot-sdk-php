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
     * @param array{
     *   destination: string,
     *   redirectStyle: int,
     *   routePrefix: string,
     *   isMatchFullUrl?: bool,
     *   isMatchQueryString?: bool,
     *   isOnlyAfterNotFound?: bool,
     *   isPattern?: bool,
     *   isProtocolAgnostic?: bool,
     *   isTrailingSlashOptional?: bool,
     *   precedence?: int,
     * }|URLRedirectCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|URLRedirectCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): URLMapping {
        [$parsed, $options] = URLRedirectCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   id: string,
     *   destination: string,
     *   isMatchFullUrl: bool,
     *   isMatchQueryString: bool,
     *   isOnlyAfterNotFound: bool,
     *   isPattern: bool,
     *   isProtocolAgnostic: bool,
     *   isTrailingSlashOptional: bool,
     *   precedence: int,
     *   redirectStyle: int,
     *   routePrefix: string,
     *   created?: string|\DateTimeInterface,
     *   updated?: string|\DateTimeInterface,
     * }|URLRedirectUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        array|URLRedirectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): URLMapping {
        [$parsed, $options] = URLRedirectUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   limit?: int,
     *   sort?: list<string>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     * }|URLRedirectListParams $params
     *
     * @return Page<URLMapping>
     *
     * @throws APIException
     */
    public function list(
        array|URLRedirectListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = URLRedirectListParams::parseRequest(
            $params,
            $requestOptions,
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
    public function get(
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
