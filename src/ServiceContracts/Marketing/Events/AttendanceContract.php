<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\RequestOptions;

interface AttendanceContract
{
    /**
     * @api
     *
     * @param array<mixed>|AttendanceCreateByEventIDAndContactIDParams $params
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndContactIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
     *
     * @param array<mixed>|AttendanceCreateByEventIDAndEmailParams $params
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse;

    /**
     * @api
     *
     * @param array<mixed>|AttendanceCreateByExternalEventIDAndContactIDParams $params
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndContactIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
     *
     * @param array<mixed>|AttendanceCreateByExternalEventIDAndEmailParams $params
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse;
}
