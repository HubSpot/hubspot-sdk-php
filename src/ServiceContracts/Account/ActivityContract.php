<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\Activity\ActivityListAuditLogsParams;
use HubspotSDK\Account\Activity\ActivityListLoginActivitiesParams;
use HubspotSDK\Account\Activity\ActivityListSecurityActivitiesParams;
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
     * @param array<mixed>|ActivityListAuditLogsParams $params
     *
     * @return Page<PublicAPIUserActionEvent>
     *
     * @throws APIException
     */
    public function listAuditLogs(
        array|ActivityListAuditLogsParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|ActivityListLoginActivitiesParams $params
     *
     * @return Page<PublicLoginAudit>
     *
     * @throws APIException
     */
    public function listLoginActivities(
        array|ActivityListLoginActivitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|ActivityListSecurityActivitiesParams $params
     *
     * @return Page<HydratedCriticalAction>
     *
     * @throws APIException
     */
    public function listSecurityActivities(
        array|ActivityListSecurityActivitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;
}
