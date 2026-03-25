<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\AuditLogs\AuditLogExportParams;
use HubspotSDK\Cms\AuditLogs\AuditLogListParams;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AuditLogsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AuditLogListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicAuditLog>>
     *
     * @throws APIException
     */
    public function list(
        array|AuditLogListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuditLogExportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function export(
        array|AuditLogExportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
