<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\AccountContract;
use HubspotSDK\Services\Account\AuditLogsService;

final class AccountService implements AccountContract
{
    /**
     * @@api
     */
    public AuditLogsService $auditLogs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->auditLogs = new AuditLogsService($client);
    }
}
