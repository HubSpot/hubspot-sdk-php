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

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $after Timestamp after which audit logs will be returned
     * @param string $before Timestamp before which audit logs will be returned
     * @param list<string> $eventType comma separated list of event types to filter by (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED)
     * @param int $limit the number of logs to return
     * @param list<string> $objectID comma separated list of object ids to filter by
     * @param list<string> $objectType Comma separated list of object types to filter by (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.)
     * @param list<string> $sort The sort direction for the audit logs. (Can only sort by timestamp).
     * @param list<string> $userID comma separated list of user ids to filter by
     *
     * @return Page<PublicAuditLog>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $before = omit,
        $eventType = omit,
        $limit = omit,
        $objectID = omit,
        $objectType = omit,
        $sort = omit,
        $userID = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'before' => $before,
            'eventType' => $eventType,
            'limit' => $limit,
            'objectID' => $objectID,
            'objectType' => $objectType,
            'sort' => $sort,
            'userID' => $userID,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicAuditLog>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = AuditLogListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
