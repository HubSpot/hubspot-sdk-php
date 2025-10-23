<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\MarketingEvents;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\AttendanceCounters;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalParticipationBreakdownForwardPaging;
use HubspotSDK\Marketing\MarketingEvents\Participations\ParticipationGetByExternalAccountAndEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\Participations\ParticipationListBreakdownByContactParams;
use HubspotSDK\Marketing\MarketingEvents\Participations\ParticipationListBreakdownByExternalAccountAndEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\Participations\ParticipationListBreakdownByIDParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\MarketingEvents\ParticipationsContract;

use const HubspotSDK\Core\OMIT as omit;

final class ParticipationsService implements ParticipationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Read Marketing event's participations counters by externalAccountId and externalEventId pair.
     *
     * @param string $externalAccountID
     *
     * @throws APIException
     */
    public function getByExternalAccountAndEventID(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): AttendanceCounters {
        $params = ['externalAccountID' => $externalAccountID];

        return $this->getByExternalAccountAndEventIDRaw(
            $externalEventID,
            $params,
            $requestOptions
        );
    }

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
    ): AttendanceCounters {
        [
            $parsed, $options,
        ] = ParticipationGetByExternalAccountAndEventIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/participations/%1$s/%2$s',
                $externalAccountID,
                $externalEventID,
            ],
            options: $options,
            convert: AttendanceCounters::class,
        );
    }

    /**
     * @api
     *
     * Read Marketing event's participations counters by internal identifier marketingEventId.
     *
     * @throws APIException
     */
    public function getByID(
        int $marketingEventID,
        ?RequestOptions $requestOptions = null
    ): AttendanceCounters {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/participations/%1$s', $marketingEventID,
            ],
            options: $requestOptions,
            convert: AttendanceCounters::class,
        );
    }

    /**
     * @api
     *
     * Read Contact's participations by identifier - email or internal id.
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
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging {
        $params = ['after' => $after, 'limit' => $limit, 'state' => $state];

        return $this->listBreakdownByContactRaw(
            $contactIdentifier,
            $params,
            $requestOptions
        );
    }

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
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging {
        [
            $parsed, $options,
        ] = ParticipationListBreakdownByContactParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/participations/contacts/%1$s/breakdown',
                $contactIdentifier,
            ],
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalParticipationBreakdownForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Read Marketing event's participations breakdown with optional filters by externalAccountId and externalEventId pair.
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
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging {
        $params = [
            'externalAccountID' => $externalAccountID,
            'after' => $after,
            'contactIdentifier' => $contactIdentifier,
            'limit' => $limit,
            'state' => $state,
        ];

        return $this->listBreakdownByExternalAccountAndEventIDRaw(
            $externalEventID,
            $params,
            $requestOptions
        );
    }

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
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging {
        [
            $parsed, $options,
        ] = ParticipationListBreakdownByExternalAccountAndEventIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/participations/%1$s/%2$s/breakdown',
                $externalAccountID,
                $externalEventID,
            ],
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalParticipationBreakdownForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Read Marketing event's participations breakdown with optional filters by internal identifier marketingEventId.
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
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging {
        $params = [
            'after' => $after,
            'contactIdentifier' => $contactIdentifier,
            'limit' => $limit,
            'state' => $state,
        ];

        return $this->listBreakdownByIDRaw(
            $marketingEventID,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalParticipationBreakdownForwardPaging {
        [$parsed, $options] = ParticipationListBreakdownByIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/participations/%1$s/breakdown',
                $marketingEventID,
            ],
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalParticipationBreakdownForwardPaging::class,
        );
    }
}
