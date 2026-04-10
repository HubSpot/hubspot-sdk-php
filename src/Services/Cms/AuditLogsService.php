<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\AuditLogs\AuditLogExportParams\Format;
use HubSpotSDK\Cms\AuditLogs\CmsAuditLoggingExportFilters;
use HubSpotSDK\Cms\AuditLogs\PublicAuditLog;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\AuditLogsContract;

/**
 * @phpstan-import-type CmsAuditLoggingExportFiltersShape from \HubSpotSDK\Cms\AuditLogs\CmsAuditLoggingExportFilters
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class AuditLogsService implements AuditLogsContract
{
    /**
     * @api
     */
    public AuditLogsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuditLogsRawService($client);
    }

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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'before' => $before,
                'eventType' => $eventType,
                'limit' => $limit,
                'objectID' => $objectID,
                'objectType' => $objectType,
                'sort' => $sort,
                'userID' => $userID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'format' => $format,
                'portalID' => $portalID,
                'recipientUserIDs' => $recipientUserIDs,
                'shouldMarkExportFileAsSensitive' => $shouldMarkExportFileAsSensitive,
                'type' => $type,
                'filters' => $filters,
                'partition' => $partition,
                'userID' => $userID,
                'userTimeZone' => $userTimeZone,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->export(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
