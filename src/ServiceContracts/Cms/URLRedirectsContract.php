<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\CmsCollectionResponseWithTotalURLMappingForwardPaging;
use HubspotSDK\Cms\CmsURLMapping;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface URLRedirectsContract
{
    /**
     * @api
     *
     * @param string $destination
     * @param int $redirectStyle
     * @param string $routePrefix
     * @param bool $isMatchFullURL
     * @param bool $isMatchQueryString
     * @param bool $isOnlyAfterNotFound
     * @param bool $isPattern
     * @param bool $isProtocolAgnostic
     * @param bool $isTrailingSlashOptional
     * @param int $precedence
     *
     * @throws APIException
     */
    public function create(
        $destination,
        $redirectStyle,
        $routePrefix,
        $isMatchFullURL = omit,
        $isMatchQueryString = omit,
        $isOnlyAfterNotFound = omit,
        $isPattern = omit,
        $isProtocolAgnostic = omit,
        $isTrailingSlashOptional = omit,
        $precedence = omit,
        ?RequestOptions $requestOptions = null,
    ): CmsURLMapping;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CmsURLMapping;

    /**
     * @api
     *
     * @param string $id
     * @param string $destination
     * @param bool $isMatchFullURL
     * @param bool $isMatchQueryString
     * @param bool $isOnlyAfterNotFound
     * @param bool $isPattern
     * @param bool $isProtocolAgnostic
     * @param bool $isTrailingSlashOptional
     * @param int $precedence
     * @param int $redirectStyle
     * @param string $routePrefix
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $updated
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        $id,
        $destination,
        $isMatchFullURL,
        $isMatchQueryString,
        $isOnlyAfterNotFound,
        $isPattern,
        $isProtocolAgnostic,
        $isTrailingSlashOptional,
        $precedence,
        $redirectStyle,
        $routePrefix,
        $created = omit,
        $updated = omit,
        ?RequestOptions $requestOptions = null,
    ): CmsURLMapping;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $urlRedirectID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CmsURLMapping;

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
    ): CmsCollectionResponseWithTotalURLMappingForwardPaging;

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
    ): CmsCollectionResponseWithTotalURLMappingForwardPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $urlRedirectID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function read(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): CmsURLMapping;

    /**
     * @api
     *
     * @throws APIException
     */
    public function readRaw(
        string $urlRedirectID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): CmsURLMapping;
}
