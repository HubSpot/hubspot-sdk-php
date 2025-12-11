<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\AttendanceCounters;
use HubspotSDK\Marketing\Events\ParticipationBreakdown;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\ParticipationsContract;

final class ParticipationsService implements ParticipationsContract
{
    /**
     * @api
     */
    public ParticipationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ParticipationsRawService($client);
    }

    /**
     * @api
     *
     * Read Marketing event's participations counters by externalAccountId and externalEventId pair.
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function getByExternalAccountAndEventID(
        string $externalEventID,
        string $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): AttendanceCounters {
        $params = Util::removeNulls(['externalAccountID' => $externalAccountID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByExternalAccountAndEventID($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read Marketing event's participations counters by internal identifier marketingEventId.
     *
     * @param int $marketingEventID the internal id of the marketing event in HubSpot
     *
     * @throws APIException
     */
    public function getByID(
        int $marketingEventID,
        ?RequestOptions $requestOptions = null
    ): AttendanceCounters {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByID($marketingEventID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read Contact's participations by identifier - email or internal id.
     *
     * @param string $contactIdentifier The identifier of the Contact. It may be email or internal id.
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     * @param string $state The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
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
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'limit' => $limit, 'state' => $state]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listBreakdownByContact($contactIdentifier, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read Marketing event's participations breakdown with optional filters by externalAccountId and externalEventId pair.
     *
     * @param string $externalEventID path param: The id of the marketing event in the external event application
     * @param string $externalAccountID path param: The accountId that is associated with this marketing event in the external event application
     * @param string $after query param: The cursor indicating the position of the last retrieved item
     * @param string $contactIdentifier Query param: The identifier of the Contact. It may be email or internal id.
     * @param int $limit Query param: The limit for response size. The default value is 10, the max number is 100
     * @param string $state Query param: The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
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
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'externalAccountID' => $externalAccountID,
                'after' => $after,
                'contactIdentifier' => $contactIdentifier,
                'limit' => $limit,
                'state' => $state,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listBreakdownByExternalAccountAndEventID($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read Marketing event's participations breakdown with optional filters by internal identifier marketingEventId.
     *
     * @param int $marketingEventID the internal id of the marketing event in HubSpot
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param string $contactIdentifier The identifier of the Contact. It may be email or internal id.
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     * @param string $state The participation state value. It may be REGISTERED, CANCELLED, ATTENDED, NO_SHOW
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
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'contactIdentifier' => $contactIdentifier,
                'limit' => $limit,
                'state' => $state,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listBreakdownByID($marketingEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
