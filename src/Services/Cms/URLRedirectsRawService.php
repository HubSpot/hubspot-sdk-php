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
     * Creates and configures a new URL redirect.
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
     * @param string $urlRedirectID the ID of the target url redirect to update
     * @param array{
     *   id: string,
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
     *   created?: \DateTimeInterface,
     *   updated?: \DateTimeInterface,
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
     * @param string $urlRedirectID the ID of the target redirect
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
     * @param string $urlRedirectID the ID of the target redirect
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
            path: ['cms/v3/url-redirects/%1$s', $urlRedirectID],
            options: $requestOptions,
            convert: URLMapping::class,
        );
    }
}
