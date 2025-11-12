<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\AttendanceCounters;
use HubspotSDK\Marketing\Events\ParticipationBreakdown;
use HubspotSDK\Marketing\Events\Participations\ParticipationGetByExternalAccountAndEventIDParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByContactParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByExternalAccountAndEventIDParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByIDParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ParticipationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ParticipationGetByExternalAccountAndEventIDParams $params
     *
     * @throws APIException
     */
    public function getByExternalAccountAndEventID(
        string $externalEventID,
        array|ParticipationGetByExternalAccountAndEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): AttendanceCounters;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getByID(
        int $marketingEventID,
        ?RequestOptions $requestOptions = null
    ): AttendanceCounters;

    /**
     * @api
     *
     * @param array<mixed>|ParticipationListBreakdownByContactParams $params
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByContact(
        string $contactIdentifier,
        array|ParticipationListBreakdownByContactParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|ParticipationListBreakdownByExternalAccountAndEventIDParams $params
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByExternalAccountAndEventID(
        string $externalEventID,
        array|ParticipationListBreakdownByExternalAccountAndEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|ParticipationListBreakdownByIDParams $params
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByID(
        int $marketingEventID,
        array|ParticipationListBreakdownByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;
}
