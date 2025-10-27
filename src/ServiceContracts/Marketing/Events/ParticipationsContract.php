<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\AttendanceCounters;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalParticipationBreakdownForwardPaging;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ParticipationsContract
{
    /**
     * @api
     *
     * @param string $externalAccountID
     *
     * @throws APIException
     */
    public function getByExternalAccountAndEventID(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): AttendanceCounters;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByExternalAccountAndEventIDRaw(
        string $externalEventID,
        array $params,
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
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     * @param string $state The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
     *
     * @throws APIException
     */
    public function listBreakdownByContact(
        string $contactIdentifier,
        $after = omit,
        $limit = omit,
        $state = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listBreakdownByContactRaw(
        string $contactIdentifier,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging;

    /**
     * @api
     *
     * @param string $externalAccountID
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param string $contactIdentifier The identifier of the Contact. It may be email or internal id.
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     * @param string $state The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
     *
     * @throws APIException
     */
    public function listBreakdownByExternalAccountAndEventID(
        string $externalEventID,
        $externalAccountID,
        $after = omit,
        $contactIdentifier = omit,
        $limit = omit,
        $state = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listBreakdownByExternalAccountAndEventIDRaw(
        string $externalEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging;

    /**
     * @api
     *
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param string $contactIdentifier The identifier of the Contact. It may be email or internal id.
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     * @param string $state The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
     *
     * @throws APIException
     */
    public function listBreakdownByID(
        int $marketingEventID,
        $after = omit,
        $contactIdentifier = omit,
        $limit = omit,
        $state = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listBreakdownByIDRaw(
        int $marketingEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging;
}
