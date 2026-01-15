<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\AttendanceCounters;
use HubspotSDK\Marketing\Events\ParticipationBreakdown;
use HubspotSDK\Marketing\Events\Participations\ParticipationGetByExternalAccountAndEventIDParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByContactParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByExternalAccountAndEventIDParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByIDParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ParticipationsRawContract
{
    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param array<string,mixed>|ParticipationGetByExternalAccountAndEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AttendanceCounters>
     *
     * @throws APIException
     */
    public function getByExternalAccountAndEventID(
        string $externalEventID,
        array|ParticipationGetByExternalAccountAndEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $marketingEventID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AttendanceCounters>
     *
     * @throws APIException
     */
    public function getByID(
        int $marketingEventID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $contactIdentifier The identifier of the Contact. It may be email or internal id.
     * @param array<string,mixed>|ParticipationListBreakdownByContactParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ParticipationBreakdown>>
     *
     * @throws APIException
     */
    public function listBreakdownByContact(
        string $contactIdentifier,
        array|ParticipationListBreakdownByContactParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID path param: The id of the marketing event in the external event application
     * @param array<string,mixed>|ParticipationListBreakdownByExternalAccountAndEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ParticipationBreakdown>>
     *
     * @throws APIException
     */
    public function listBreakdownByExternalAccountAndEventID(
        string $externalEventID,
        array|ParticipationListBreakdownByExternalAccountAndEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $marketingEventID the internal id of the marketing event in HubSpot
     * @param array<string,mixed>|ParticipationListBreakdownByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ParticipationBreakdown>>
     *
     * @throws APIException
     */
    public function listBreakdownByID(
        int $marketingEventID,
        array|ParticipationListBreakdownByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
