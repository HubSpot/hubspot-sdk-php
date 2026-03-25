<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\AuditLogs\AuditLogExportParams\Format;
use HubspotSDK\Cms\AuditLogs\CmsAuditLoggingExportFilters;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type CmsAuditLoggingExportFiltersShape from \HubspotSDK\Cms\AuditLogs\CmsAuditLoggingExportFilters
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AuditLogsContract
{
    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param list<string> $eventType
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $objectID
     * @param list<string> $objectType
     * @param list<string> $sort
     * @param list<string> $userID
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicAuditLog>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?string $before = null,
        ?array $eventType = null,
        ?int $limit = null,
        ?array $objectID = null,
        ?array $objectType = null,
        ?array $sort = null,
        ?array $userID = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param Format|value-of<Format> $format
     * @param list<int> $recipientUserIDs
     * @param CmsAuditLoggingExportFilters|CmsAuditLoggingExportFiltersShape $filters
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function export(
        string $email,
        Format|string $format,
        int $portalID,
        array $recipientUserIDs,
        bool $shouldMarkExportFileAsSensitive,
        string $type,
        CmsAuditLoggingExportFilters|array|null $filters = null,
        ?int $partition = null,
        ?int $userID = null,
        ?string $userTimeZone = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
