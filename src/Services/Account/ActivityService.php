<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Account\Activity\ActivityListAuditLogsParams;
use HubspotSDK\Account\Activity\ActivityListLoginActivitiesParams;
use HubspotSDK\Account\Activity\ActivityListSecurityActivitiesParams;
use HubspotSDK\Account\CollectionResponseHydratedCriticalActionForwardPaging;
use HubspotSDK\Account\CollectionResponsePublicAPIUserActionEventForwardPaging;
use HubspotSDK\Account\CollectionResponsePublicLoginAuditForwardPaging;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Account\ActivityContract;

use const HubspotSDK\Core\OMIT as omit;

final class ActivityService implements ActivityContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve activity history for user actions related to approvals, content updates, CRM object updates, security activity, and more (Enterprise only). Learn more about [activities included in audit log exports](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history-in-a-centralized-audit-log?hubs_content=knowledge.hubspot.com/account-management/view-and-export-account-activity-history&hubs_content-cta=centralized%20audit%20log#data-included-in-the-centralized-audit-log).
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
    ): CollectionResponsePublicAPIUserActionEventForwardPaging {
        $params = [
            'actingUserID' => $actingUserID,
            'after' => $after,
            'limit' => $limit,
            'occurredAfter' => $occurredAfter,
            'occurredBefore' => $occurredBefore,
            'sort' => $sort,
        ];

        return $this->listAuditLogsRaw($params, $requestOptions);
    }

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
    ): CollectionResponsePublicAPIUserActionEventForwardPaging {
        [$parsed, $options] = ActivityListAuditLogsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/audit-logs',
            query: $parsed,
            options: $options,
            convert: CollectionResponsePublicAPIUserActionEventForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve logs of user actions related to [login activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#account-login-history).
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
    ): CollectionResponsePublicLoginAuditForwardPaging {
        $params = ['after' => $after, 'limit' => $limit, 'userID' => $userID];

        return $this->listLoginActivitiesRaw($params, $requestOptions);
    }

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
    ): CollectionResponsePublicLoginAuditForwardPaging {
        [$parsed, $options] = ActivityListLoginActivitiesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/login',
            query: $parsed,
            options: $options,
            convert: CollectionResponsePublicLoginAuditForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve logs of user actions related to [security activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#security-activity-history).
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
    ): CollectionResponseHydratedCriticalActionForwardPaging {
        $params = [
            'after' => $after,
            'fromTimestamp' => $fromTimestamp,
            'limit' => $limit,
            'toTimestamp' => $toTimestamp,
            'userID' => $userID,
        ];

        return $this->listSecurityActivitiesRaw($params, $requestOptions);
    }

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
    ): CollectionResponseHydratedCriticalActionForwardPaging {
        [$parsed, $options] = ActivityListSecurityActivitiesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/security',
            query: $parsed,
            options: $options,
            convert: CollectionResponseHydratedCriticalActionForwardPaging::class,
        );
    }
}
