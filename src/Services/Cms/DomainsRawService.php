<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\Domains\Domain;
use HubspotSDK\Cms\Domains\DomainListParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\DomainsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Returns all existing domains that have been created. Results can be limited and filtered by creation or updated date.
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
            path: 'cms/v3/domains/',
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
     * @param string $domainID the unique ID of the domain
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
            path: ['cms/v3/domains/%1$s', $domainID],
            options: $requestOptions,
            convert: Domain::class,
        );
    }
}
