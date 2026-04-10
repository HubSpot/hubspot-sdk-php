<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\Cms\AuditLogs\AuditLogExportParams;
use HubSpotSDK\Cms\AuditLogs\AuditLogListParams;
use HubSpotSDK\Cms\AuditLogs\PublicAuditLog;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
