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
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
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
     *   actingUserID?: list<int>,
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

        /** @var BaseResponse<Page<PublicAPIUserActionEvent>> */
        $response = $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/audit-logs',
            query: Util::array_transform_keys(
                $parsed,
                ['actingUserID' => 'actingUserId']
            ),
            options: $options,
            convert: PublicAPIUserActionEvent::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve logs of user actions related to [login activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#account-login-history).
     *
     * @param array{
     *   after?: string, limit?: int, userID?: int
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

        /** @var BaseResponse<Page<PublicLoginAudit>> */
        $response = $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/login',
            query: Util::array_transform_keys($parsed, ['userID' => 'userId']),
            options: $options,
            convert: PublicLoginAudit::class,
            page: Page::class,
        );

        return $response->parse();
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
     *   userID?: int,
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

        /** @var BaseResponse<Page<HydratedCriticalAction>> */
        $response = $this->client->request(
            method: 'get',
            path: 'account-info/v3/activity/security',
            query: Util::array_transform_keys($parsed, ['userID' => 'userId']),
            options: $options,
            convert: HydratedCriticalAction::class,
            page: Page::class,
        );

        return $response->parse();
    }
}
