<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\Domains\CollectionResponseWithTotalDomainForwardPaging;
use HubspotSDK\Cms\Domains\Domain;
use HubspotSDK\Cms\Domains\DomainListParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\DomainsContract;

use const HubspotSDK\Core\OMIT as omit;

final class DomainsService implements DomainsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get current domains
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
    ): CollectionResponseWithTotalDomainForwardPaging {
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
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalDomainForwardPaging {
        [$parsed, $options] = DomainListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/domains/',
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalDomainForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Get a single domain
     *
     * @throws APIException
     */
    public function read(
        string $domainID,
        ?RequestOptions $requestOptions = null
    ): Domain {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/domains/%1$s', $domainID],
            options: $requestOptions,
            convert: Domain::class,
        );
    }
}
