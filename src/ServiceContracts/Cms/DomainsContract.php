<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\Domains\CmsDomainsCollectionResponseWithTotalDomainForwardPaging;
use HubspotSDK\Cms\Domains\CmsDomainsDomain;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface DomainsContract
{
    /**
     * @api
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
     * @return CmsDomainsCollectionResponseWithTotalDomainForwardPaging<HasRawResponse>
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
    ): CmsDomainsCollectionResponseWithTotalDomainForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CmsDomainsCollectionResponseWithTotalDomainForwardPaging<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CmsDomainsCollectionResponseWithTotalDomainForwardPaging;

    /**
     * @api
     *
     * @return CmsDomainsDomain<HasRawResponse>
     *
     * @throws APIException
     */
    public function read(
        string $domainID,
        ?RequestOptions $requestOptions = null
    ): CmsDomainsDomain;

    /**
     * @api
     *
     * @return CmsDomainsDomain<HasRawResponse>
     *
     * @throws APIException
     */
    public function readRaw(
        string $domainID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CmsDomainsDomain;
}
