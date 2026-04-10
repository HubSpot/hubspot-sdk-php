<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\MarketingEvents\AttendanceCounters;
use HubSpotSDK\Marketing\MarketingEvents\ParticipationBreakdown;
use HubSpotSDK\Marketing\MarketingEvents\Participations\ParticipationGetByExternalAccountAndEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\Participations\ParticipationListBreakdownByContactParams;
use HubSpotSDK\Marketing\MarketingEvents\Participations\ParticipationListBreakdownByExternalAccountAndEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\Participations\ParticipationListBreakdownByIDParams;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
