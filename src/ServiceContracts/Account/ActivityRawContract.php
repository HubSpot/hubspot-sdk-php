<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\Activity\ActivityListAuditLogsParams;
use HubspotSDK\Account\Activity\ActivityListLoginActivitiesParams;
use HubspotSDK\Account\Activity\ActivityListSecurityActivitiesParams;
use HubspotSDK\Account\Activity\HydratedCriticalAction;
use HubspotSDK\Account\Activity\PublicAPIUserActionEvent;
use HubspotSDK\Account\Activity\PublicLoginAudit;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ActivityRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ActivityListAuditLogsParams $params
     *
     * @return BaseResponse<Page<PublicAPIUserActionEvent>>
     *
     * @throws APIException
     */
    public function listAuditLogs(
        array|ActivityListAuditLogsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActivityListLoginActivitiesParams $params
     *
     * @return BaseResponse<Page<PublicLoginAudit>>
     *
     * @throws APIException
     */
    public function listLoginActivities(
        array|ActivityListLoginActivitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActivityListSecurityActivitiesParams $params
     *
     * @return BaseResponse<Page<HydratedCriticalAction>>
     *
     * @throws APIException
     */
    public function listSecurityActivities(
        array|ActivityListSecurityActivitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
