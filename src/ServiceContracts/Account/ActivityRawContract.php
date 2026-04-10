<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Account;

use HubSpotSDK\Account\Activity\ActivityListAuditLogsParams;
use HubSpotSDK\Account\Activity\ActivityListLoginActivitiesParams;
use HubSpotSDK\Account\Activity\ActivityListSecurityActivitiesParams;
use HubSpotSDK\Account\Activity\HydratedCriticalAction;
use HubSpotSDK\Account\Activity\PublicAPIUserActionEvent;
use HubSpotSDK\Account\Activity\PublicLoginAudit;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ActivityRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ActivityListAuditLogsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicAPIUserActionEvent>>
     *
     * @throws APIException
     */
    public function listAuditLogs(
        array|ActivityListAuditLogsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActivityListLoginActivitiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicLoginAudit>>
     *
     * @throws APIException
     */
    public function listLoginActivities(
        array|ActivityListLoginActivitiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActivityListSecurityActivitiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<HydratedCriticalAction>>
     *
     * @throws APIException
     */
    public function listSecurityActivities(
        array|ActivityListSecurityActivitiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
