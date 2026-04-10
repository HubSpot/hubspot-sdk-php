<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Domains\Domain;
use HubSpotSDK\Cms\Domains\DomainListParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\DomainsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class DomainsRawService implements DomainsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
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
     * }|DomainListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<Domain>>
     *
     * @throws APIException
     */
    public function list(
        array|DomainListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DomainListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/domains/2026-03',
            query: $parsed,
            options: $options,
            convert: Domain::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Returns a single domains with the id specified.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Domain>
     *
     * @throws APIException
     */
    public function get(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/domains/2026-03/%1$s', $domainID],
            options: $requestOptions,
            convert: Domain::class,
        );
    }
}
