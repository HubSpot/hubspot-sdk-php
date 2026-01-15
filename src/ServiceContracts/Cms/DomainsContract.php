<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\Domains\Domain;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface DomainsContract
{
    /**
     * @api
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
    ): Page;

    /**
     * @api
     *
     * @param string $domainID the unique ID of the domain
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): Domain;
}
