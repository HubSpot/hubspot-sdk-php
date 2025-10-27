<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\Activity\CollectionResponseHydratedCriticalActionForwardPaging;
use HubspotSDK\Account\Activity\CollectionResponsePublicAPIUserActionEventForwardPaging;
use HubspotSDK\Account\Activity\CollectionResponsePublicLoginAuditForwardPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ActivityContract
{
    /**
     * @api
     *
     * @param list<int> $actingUserID the ID of a user, for retrieving user-specific logs
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param \DateTimeInterface $occurredAfter a timestamp, as a starting point for retrieving activity logs
     * @param \DateTimeInterface $occurredBefore a timestamp, as an end point for retrieving activity logs
     * @param list<string> $sort Set to `occurredAt` to order results by the time of the event. By default, events are ordered from oldest to newest.
     *
     * @throws APIException
     */
    public function listAuditLogs(
        $actingUserID = omit,
        $after = omit,
        $limit = omit,
        $occurredAfter = omit,
        $occurredBefore = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAPIUserActionEventForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listAuditLogsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAPIUserActionEventForwardPaging;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to display per page. Max value of limit is 200.
     * @param int $userID the ID of a user, for retrieving user-specific logs
     *
     * @throws APIException
     */
    public function listLoginActivities(
        $after = omit,
        $limit = omit,
        $userID = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicLoginAuditForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listLoginActivitiesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicLoginAuditForwardPaging;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $fromTimestamp the start time, for retrieving logs within a specific timeframe
     * @param int $limit The maximum number of results to display per page. Max value of limit is 200.
     * @param int $toTimestamp the end time, for retrieving logs within a specific timeframe
     * @param int $userID the ID of a user, for retrieving user-specific logs
     *
     * @throws APIException
     */
    public function listSecurityActivities(
        $after = omit,
        $fromTimestamp = omit,
        $limit = omit,
        $toTimestamp = omit,
        $userID = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseHydratedCriticalActionForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listSecurityActivitiesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseHydratedCriticalActionForwardPaging;
}
