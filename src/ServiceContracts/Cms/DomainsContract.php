<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\Domains\Domain;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface DomainsContract
{
    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param string|\DateTimeInterface $createdAfter only return domains created after this date
     * @param string|\DateTimeInterface $createdAt only return domains created at this date
     * @param string|\DateTimeInterface $createdBefore only return domains created before this date
     * @param int $limit maximum number of results per page
     * @param list<string> $sort specifies the order in which the domains are returned
     * @param string|\DateTimeInterface $updatedAfter only return domains updated after this date
     * @param string|\DateTimeInterface $updatedAt only return domains updated at this date
     * @param string|\DateTimeInterface $updatedBefore only return domains updated before this date
     *
     * @return Page<Domain>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        string|\DateTimeInterface|null $createdAfter = null,
        string|\DateTimeInterface|null $createdAt = null,
        string|\DateTimeInterface|null $createdBefore = null,
        ?int $limit = null,
        ?array $sort = null,
        string|\DateTimeInterface|null $updatedAfter = null,
        string|\DateTimeInterface|null $updatedAt = null,
        string|\DateTimeInterface|null $updatedBefore = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $domainID the unique ID of the domain
     *
     * @throws APIException
     */
    public function get(
        string $domainID,
        ?RequestOptions $requestOptions = null
    ): Domain;
}
