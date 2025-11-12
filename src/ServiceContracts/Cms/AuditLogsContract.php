<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\AuditLogs\AuditLogListParams;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface AuditLogsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AuditLogListParams $params
     *
     * @return Page<PublicAuditLog>
     *
     * @throws APIException
     */
    public function list(
        array|AuditLogListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;
}
