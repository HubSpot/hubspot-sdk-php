<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\URLMappings\URLMappingCreateParams;
use HubSpotSDK\Cms\URLMappings\URLMappingCreateParams\CosObjectType;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\URLMappingsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class URLMappingsRawService implements URLMappingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new URL mapping in your HubSpot account. This endpoint allows you to define URL redirections and mappings, which can be useful for managing site navigation and SEO. The request body must include all required properties of the UrlMapping schema.
     *
     * @param array{
     *   id: int,
     *   cdnPurgeEmbargoTime: int,
     *   contentGroupID: int,
     *   cosObjectType: value-of<CosObjectType>,
     *   created: int,
     *   createdByID: int,
     *   deletedAt: int,
     *   destination: string,
     *   internallyCreated: bool,
     *   isActive: bool,
     *   isMatchFullURL: bool,
     *   isMatchQueryString: bool,
     *   isOnlyAfterNotFound: bool,
     *   isPattern: bool,
     *   isProtocolAgnostic: bool,
     *   isRegex: bool,
     *   isTrailingSlashOptional: bool,
     *   label: string,
     *   lastUsedAt: int,
     *   name: string,
     *   note: string,
     *   portalID: int,
     *   precedence: int,
     *   redirectStyle: int,
     *   routePrefix: string,
     *   updated: int,
     *   updatedByID: int,
     * }|URLMappingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function create(
        array|URLMappingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = URLMappingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'url-mappings/2026-03/url-mappings',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Retrieve a list of URL mappings from the HubSpot account. This endpoint provides access to URL mapping configurations, which can be used to manage and redirect URLs within the HubSpot CMS. It is useful for understanding how URLs are structured and redirected in your content management setup.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'url-mappings/2026-03/url-mappings',
            headers: ['Accept' => '*/*'],
            options: $requestOptions,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Delete a specific URL mapping in your HubSpot account using its unique identifier. This operation will remove the URL mapping permanently, and it requires appropriate write and delete permissions.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['url-mappings/2026-03/url-mappings/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific URL mapping by its unique identifier. This endpoint is useful for obtaining details about a particular URL mapping configuration within your HubSpot account. It requires the ID of the URL mapping as a path parameter.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function get(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['url-mappings/2026-03/url-mappings/%1$s', $id],
            headers: ['Accept' => '*/*'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
