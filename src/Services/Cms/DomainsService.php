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
use HubspotSDK\ServiceContracts\Cms\DomainsContract;

final class DomainsService implements DomainsContract
{
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
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   limit?: int,
     *   sort?: list<string>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     * }|DomainListParams $params
     *
     * @return Page<Domain>
     *
     * @throws APIException
     */
    public function list(
        array|DomainListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = DomainListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<Domain>> */
        $response = $this->client->request(
            method: 'get',
            path: 'cms/v3/domains/',
            query: $parsed,
            options: $options,
            convert: Domain::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a single domains with the id specified.
     *
     * @throws APIException
     */
    public function get(
        string $domainID,
        ?RequestOptions $requestOptions = null
    ): Domain {
        /** @var BaseResponse<Domain> */
        $response = $this->client->request(
            method: 'get',
            path: ['cms/v3/domains/%1$s', $domainID],
            options: $requestOptions,
            convert: Domain::class,
        );

        return $response->parse();
    }
}
