<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Domains\Domain;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\DomainsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
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
