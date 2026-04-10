<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Account;

use HubSpotSDK\Account\Activity\ActivityListAuditLogsParams;
use HubSpotSDK\Account\Activity\ActivityListLoginActivitiesParams;
use HubSpotSDK\Account\Activity\ActivityListSecurityActivitiesParams;
use HubSpotSDK\Account\Activity\HydratedCriticalAction;
use HubSpotSDK\Account\Activity\PublicAPIUserActionEvent;
use HubSpotSDK\Account\Activity\PublicLoginAudit;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Account\ActivityRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class ActivityRawService implements ActivityRawContract
{
    // @phpstan-ignore-next-line
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
     *   fillFinalTimestamp?: bool,
     *   limit?: int,
     *   occurredAfter?: \DateTimeInterface,
     *   occurredBefore?: \DateTimeInterface,
     *   sort?: list<string>,
     * }|ActivityListAuditLogsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicAPIUserActionEvent>>
     *
     * @throws APIException
     */
    public function listAuditLogs(
        array|ActivityListAuditLogsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActivityListAuditLogsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/2026-03/activity/audit-logs',
            query: Util::array_transform_keys(
                $parsed,
                ['actingUserID' => 'actingUserId']
            ),
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
     *   after?: string, limit?: int, userID?: int
     * }|ActivityListLoginActivitiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicLoginAudit>>
     *
     * @throws APIException
     */
    public function listLoginActivities(
        array|ActivityListLoginActivitiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActivityListLoginActivitiesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/2026-03/activity/login',
            query: Util::array_transform_keys($parsed, ['userID' => 'userId']),
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
     *   userID?: int,
     * }|ActivityListSecurityActivitiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<HydratedCriticalAction>>
     *
     * @throws APIException
     */
    public function listSecurityActivities(
        array|ActivityListSecurityActivitiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActivityListSecurityActivitiesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/2026-03/activity/security',
            query: Util::array_transform_keys($parsed, ['userID' => 'userId']),
            options: $options,
            convert: HydratedCriticalAction::class,
            page: Page::class,
        );
    }
}
