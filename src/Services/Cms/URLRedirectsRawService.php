<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\URLRedirects\URLMapping;
use HubSpotSDK\Cms\URLRedirects\URLRedirectCreateParams;
use HubSpotSDK\Cms\URLRedirects\URLRedirectListParams;
use HubSpotSDK\Cms\URLRedirects\URLRedirectUpdateParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\URLRedirectsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class URLRedirectsRawService implements URLRedirectsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new URL redirect in your HubSpot account. This endpoint allows you to define a new URL mapping that redirects traffic from a specified route to a destination URL. This is useful for managing URL changes, handling outdated links, or creating short links.
     *
     * @param array{
     *   destination: string,
     *   redirectStyle: int,
     *   routePrefix: string,
     *   isMatchFullURL?: bool,
     *   isMatchQueryString?: bool,
     *   isOnlyAfterNotFound?: bool,
     *   isPattern?: bool,
     *   isProtocolAgnostic?: bool,
     *   isTrailingSlashOptional?: bool,
     *   precedence?: int,
     * }|URLRedirectCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function create(
        array|URLRedirectCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = URLRedirectCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/url-redirects/2026-03',
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
     *   created: \DateTimeInterface,
     *   destination: string,
     *   isMatchFullURL: bool,
     *   isMatchQueryString: bool,
     *   isOnlyAfterNotFound: bool,
     *   isPattern: bool,
     *   isProtocolAgnostic: bool,
     *   isTrailingSlashOptional: bool,
     *   precedence: int,
     *   redirectStyle: int,
     *   routePrefix: string,
     *   updated: \DateTimeInterface,
     * }|URLRedirectUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        array|URLRedirectUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = URLRedirectUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/url-redirects/2026-03/%1$s', $urlRedirectID],
            body: (object) $parsed,
            options: $options,
            convert: URLMapping::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of URL redirects configured in your HubSpot account. This endpoint allows you to filter redirects based on their creation or update timestamps, and sort the results. It supports pagination and can include archived redirects if specified.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|URLRedirectListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<URLMapping>>
     *
     * @throws APIException
     */
    public function list(
        array|URLRedirectListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = URLRedirectListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/url-redirects/2026-03',
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $urlRedirectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['cms/url-redirects/2026-03/%1$s', $urlRedirectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns the details for a single existing URL redirect by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function get(
        string $urlRedirectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/url-redirects/2026-03/%1$s', $urlRedirectID],
            options: $requestOptions,
            convert: URLMapping::class,
        );
    }
}
