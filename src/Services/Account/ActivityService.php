<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Account\Activity\ActivityListAuditLogsParams;
use HubspotSDK\Account\Activity\ActivityListLoginActivitiesParams;
use HubspotSDK\Account\Activity\ActivityListSecurityActivitiesParams;
use HubspotSDK\Account\Activity\HydratedCriticalAction;
use HubspotSDK\Account\Activity\PublicAPIUserActionEvent;
use HubspotSDK\Account\Activity\PublicLoginAudit;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Account\ActivityContract;

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
     * @param array{
     *   actingUserId?: list<int>,
     *   after?: string,
     *   limit?: int,
     *   occurredAfter?: string|\DateTimeInterface,
     *   occurredBefore?: string|\DateTimeInterface,
     *   sort?: list<string>,
     * }|ActivityListAuditLogsParams $params
     *
     * @return Page<PublicAPIUserActionEvent>
     *
     * @throws APIException
     */
    public function listAuditLogs(
        array|ActivityListAuditLogsParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = ActivityListAuditLogsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/audit-logs',
            query: $parsed,
            options: $options,
            convert: PublicAPIUserActionEvent::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve logs of user actions related to [login activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#account-login-history).
     *
     * @param array{
     *   after?: string, limit?: int, userId?: int
     * }|ActivityListLoginActivitiesParams $params
     *
     * @return Page<PublicLoginAudit>
     *
     * @throws APIException
     */
    public function listLoginActivities(
        array|ActivityListLoginActivitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = ActivityListLoginActivitiesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/login',
            query: $parsed,
            options: $options,
            convert: PublicLoginAudit::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve logs of user actions related to [security activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#security-activity-history).
     *
     * @param array{
     *   after?: string,
     *   fromTimestamp?: int,
     *   limit?: int,
     *   toTimestamp?: int,
     *   userId?: int,
     * }|ActivityListSecurityActivitiesParams $params
     *
     * @return Page<HydratedCriticalAction>
     *
     * @throws APIException
     */
    public function listSecurityActivities(
        array|ActivityListSecurityActivitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = ActivityListSecurityActivitiesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/security',
            query: $parsed,
            options: $options,
            convert: HydratedCriticalAction::class,
            page: Page::class,
        );
    }
}
