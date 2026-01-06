<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\RequestOptions;

interface AttendanceRawContract
{
    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param array<mixed>|AttendanceCreateByEventIDAndContactIDParams $params
     *
     * @return BaseResponse<BatchResponseSubscriberVidResponse>
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndContactIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param array<mixed>|AttendanceCreateByEventIDAndEmailParams $params
     *
     * @return BaseResponse<BatchResponseSubscriberEmailResponse>
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param array<mixed>|AttendanceCreateByExternalEventIDAndContactIDParams $params
     *
     * @return BaseResponse<BatchResponseSubscriberVidResponse>
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndContactIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param array<mixed>|AttendanceCreateByExternalEventIDAndEmailParams $params
     *
     * @return BaseResponse<BatchResponseSubscriberEmailResponse>
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
