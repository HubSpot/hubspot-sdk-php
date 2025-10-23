<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\AuditLogs\PublicAuditLog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface AuditLogsContract
{
    /**
     * @api
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
    ): Page;

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
    ): Page;
}
