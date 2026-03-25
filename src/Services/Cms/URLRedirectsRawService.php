<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\URLRedirects\URLMapping;
use HubspotSDK\Cms\URLRedirects\URLRedirectCreateParams;
use HubspotSDK\Cms\URLRedirects\URLRedirectListParams;
use HubspotSDK\Cms\URLRedirects\URLRedirectUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\URLRedirectsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Update the details of an existing URL redirect in your HubSpot account. This operation allows you to modify properties such as the destination URL, route prefix, and other redirect settings. Use this endpoint to ensure your URL redirects are up-to-date and functioning as intended.
     *
     * @param string $urlRedirectID the unique identifier of the URL redirect to update
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
     * Delete a specific URL redirect in your HubSpot account using its unique identifier. This operation is useful for removing outdated or incorrect URL redirects, ensuring that your URL mappings remain current and accurate.
     *
     * @param string $urlRedirectID the unique identifier of the URL redirect to delete
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
     * Retrieve detailed information about a specific URL redirect in your HubSpot account using its unique identifier. This endpoint is useful for obtaining the configuration and properties of a URL redirect, such as its destination, route prefix, and other settings.
     *
     * @param string $urlRedirectID the unique identifier of the URL redirect to retrieve
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
