<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\AuditLogs\AuditLogExportParams;
use HubspotSDK\Cms\AuditLogs\AuditLogExportParams\Format;
use HubspotSDK\Cms\AuditLogs\AuditLogListParams;
use HubspotSDK\Cms\AuditLogs\CmsAuditLoggingExportFilters;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\AuditLogsRawContract;

/**
 * @phpstan-import-type CmsAuditLoggingExportFiltersShape from \HubspotSDK\Cms\AuditLogs\CmsAuditLoggingExportFilters
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AuditLogsRawService implements AuditLogsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   before?: string,
     *   eventType?: list<string>,
     *   limit?: int,
     *   objectID?: list<string>,
     *   objectType?: list<string>,
     *   sort?: list<string>,
     *   userID?: list<string>,
     * }|AuditLogListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicAuditLog>>
     *
     * @throws APIException
     */
    public function list(
        array|AuditLogListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuditLogListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/audit-logs/2026-03',
            query: Util::array_transform_keys(
                $parsed,
                ['objectID' => 'objectId', 'userID' => 'userId']
            ),
            options: $options,
            convert: PublicAuditLog::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   email: string,
     *   format: Format|value-of<Format>,
     *   portalID: int,
     *   recipientUserIDs: list<int>,
     *   shouldMarkExportFileAsSensitive: bool,
     *   type: string,
     *   filters?: CmsAuditLoggingExportFilters|CmsAuditLoggingExportFiltersShape,
     *   partition?: int,
     *   userID?: int,
     *   userTimeZone?: string,
     * }|AuditLogExportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function export(
        array|AuditLogExportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuditLogExportParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/audit-logs/2026-03/export',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
