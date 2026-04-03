<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\Attendance\AttendanceCreateByEventIDAndContactIDParams;
use HubspotSDK\Marketing\MarketingEvents\Attendance\AttendanceCreateByEventIDAndEmailParams;
use HubspotSDK\Marketing\MarketingEvents\Attendance\AttendanceCreateByExternalEventIDAndContactIDParams;
use HubspotSDK\Marketing\MarketingEvents\Attendance\AttendanceCreateByExternalEventIDAndEmailParams;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseSubscriberVidResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AttendanceRawContract
{
    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param array<string,mixed>|AttendanceCreateByEventIDAndContactIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriberVidResponse>
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndContactIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param array<string,mixed>|AttendanceCreateByEventIDAndEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriberEmailResponse>
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param array<string,mixed>|AttendanceCreateByExternalEventIDAndContactIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriberVidResponse>
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndContactIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param array<string,mixed>|AttendanceCreateByExternalEventIDAndEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriberEmailResponse>
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
