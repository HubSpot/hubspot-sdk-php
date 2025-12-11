<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\AuditLogsContract;

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
        ?string $after = null,
        ?string $before = null,
        ?array $eventType = null,
        ?int $limit = null,
        ?array $objectID = null,
        ?array $objectType = null,
        ?array $sort = null,
        ?array $userID = null,
        ?RequestOptions $requestOptions = null,
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
}
