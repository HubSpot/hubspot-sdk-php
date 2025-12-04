<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\AuditLogs\AuditLogListParams;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\AuditLogsContract;

final class AuditLogsService implements AuditLogsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns audit logs based on filters.
     *
     * @param array{
     *   after?: string,
     *   before?: string,
     *   eventType?: list<string>,
     *   limit?: int,
     *   objectId?: list<string>,
     *   objectType?: list<string>,
     *   sort?: list<string>,
     *   userId?: list<string>,
     * }|AuditLogListParams $params
     *
     * @return Page<PublicAuditLog>
     *
     * @throws APIException
     */
    public function list(
        array|AuditLogListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = AuditLogListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/audit-logs/',
            query: $parsed,
            options: $options,
            convert: PublicAuditLog::class,
            page: Page::class,
        );
    }
}
