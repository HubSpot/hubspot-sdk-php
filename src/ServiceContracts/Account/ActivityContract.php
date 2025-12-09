<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\Activity\HydratedCriticalAction;
use HubspotSDK\Account\Activity\PublicAPIUserActionEvent;
use HubspotSDK\Account\Activity\PublicLoginAudit;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ActivityContract
{
    /**
     * @api
     *
     * @param list<int> $actingUserID the ID of a user, for retrieving user-specific logs
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param string|\DateTimeInterface $occurredAfter a timestamp, as a starting point for retrieving activity logs
     * @param string|\DateTimeInterface $occurredBefore a timestamp, as an end point for retrieving activity logs
     * @param list<string> $sort Set to `occurredAt` to order results by the time of the event. By default, events are ordered from oldest to newest.
     *
     * @return Page<PublicAPIUserActionEvent>
     *
     * @throws APIException
     */
    public function listAuditLogs(
        ?array $actingUserID = null,
        ?string $after = null,
        ?int $limit = null,
        string|\DateTimeInterface|null $occurredAfter = null,
        string|\DateTimeInterface|null $occurredBefore = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to display per page. Max value of limit is 200.
     * @param int $userID the ID of a user, for retrieving user-specific logs
     *
     * @return Page<PublicLoginAudit>
     *
     * @throws APIException
     */
    public function listLoginActivities(
        ?string $after = null,
        ?int $limit = null,
        ?int $userID = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $fromTimestamp the start time, for retrieving logs within a specific timeframe
     * @param int $limit The maximum number of results to display per page. Max value of limit is 200.
     * @param int $toTimestamp the end time, for retrieving logs within a specific timeframe
     * @param int $userID the ID of a user, for retrieving user-specific logs
     *
     * @return Page<HydratedCriticalAction>
     *
     * @throws APIException
     */
    public function listSecurityActivities(
        ?string $after = null,
        ?int $fromTimestamp = null,
        ?int $limit = null,
        ?int $toTimestamp = null,
        ?int $userID = null,
        ?RequestOptions $requestOptions = null,
    ): Page;
}
