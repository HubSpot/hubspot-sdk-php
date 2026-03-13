<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\Domains\Domain;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\DomainsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class DomainsService implements DomainsContract
{
    /**
     * @api
     */
    public DomainsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DomainsRawService($client);
    }

    /**
     * @api
     *
     * Returns all existing domains that have been created. Results can be limited and filtered by creation or updated date.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param \DateTimeInterface $createdAfter only return domains created after this date
     * @param \DateTimeInterface $createdAt only return domains created at this date
     * @param \DateTimeInterface $createdBefore only return domains created before this date
     * @param int $limit maximum number of results per page
     * @param list<string> $sort specifies the order in which the domains are returned
     * @param \DateTimeInterface $updatedAfter only return domains updated after this date
     * @param \DateTimeInterface $updatedAt only return domains updated at this date
     * @param \DateTimeInterface $updatedBefore only return domains updated before this date
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<Domain>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?int $limit = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a single domains with the id specified.
     *
     * @param string $domainID the unique ID of the domain
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): Domain {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($domainID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
