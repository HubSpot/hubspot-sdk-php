<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\AttendanceCounters;
use HubspotSDK\Marketing\MarketingEvents\ParticipationBreakdown;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ParticipationsContract
{
    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByExternalAccountAndEventID(
        string $externalEventID,
        string $externalAccountID,
        RequestOptions|array|null $requestOptions = null,
    ): AttendanceCounters;

    /**
     * @api
     *
     * @param int $marketingEventID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByID(
        int $marketingEventID,
        RequestOptions|array|null $requestOptions = null
    ): AttendanceCounters;

    /**
     * @api
     *
     * @param string $contactIdentifier The identifier of the Contact. It may be email or internal id.
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     * @param string $state The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByContact(
        string $contactIdentifier,
        ?string $after = null,
        int $limit = 10,
        ?string $state = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $externalEventID path param: The id of the marketing event in the external event application
     * @param string $externalAccountID path param: The accountId that is associated with this marketing event in the external event application
     * @param string $after query param: The cursor indicating the position of the last retrieved item
     * @param string $contactIdentifier Query param: The identifier of the Contact. It may be email or internal id.
     * @param int $limit Query param: The limit for response size. The default value is 10, the max number is 100
     * @param string $state Query param: The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByExternalAccountAndEventID(
        string $externalEventID,
        string $externalAccountID,
        ?string $after = null,
        ?string $contactIdentifier = null,
        int $limit = 10,
        ?string $state = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param int $marketingEventID the internal id of the marketing event in HubSpot
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param string $contactIdentifier The identifier of the Contact. It may be email or internal id.
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     * @param string $state The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByID(
        int $marketingEventID,
        ?string $after = null,
        ?string $contactIdentifier = null,
        int $limit = 10,
        ?string $state = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;
}
