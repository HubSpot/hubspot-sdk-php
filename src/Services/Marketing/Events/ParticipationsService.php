<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\AttendanceCounters;
use HubspotSDK\Marketing\Events\ParticipationBreakdown;
use HubspotSDK\Marketing\Events\Participations\ParticipationGetByExternalAccountAndEventIDParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByContactParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByExternalAccountAndEventIDParams;
use HubspotSDK\Marketing\Events\Participations\ParticipationListBreakdownByIDParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\ParticipationsContract;

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
     * @param array{
     *   externalAccountId: string
     * }|ParticipationGetByExternalAccountAndEventIDParams $params
     *
     * @throws APIException
     */
    public function getByExternalAccountAndEventID(
        string $externalEventID,
        array|ParticipationGetByExternalAccountAndEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): AttendanceCounters {
        [$parsed, $options] = ParticipationGetByExternalAccountAndEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountId'];
        unset($parsed['externalAccountId']);

        // @phpstan-ignore-next-line return.type
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
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   after?: string, limit?: int, state?: string
     * }|ParticipationListBreakdownByContactParams $params
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByContact(
        string $contactIdentifier,
        array|ParticipationListBreakdownByContactParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = ParticipationListBreakdownByContactParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/participations/contacts/%1$s/breakdown',
                $contactIdentifier,
            ],
            query: $parsed,
            options: $options,
            convert: ParticipationBreakdown::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Read Marketing event's participations breakdown with optional filters by externalAccountId and externalEventId pair.
     *
     * @param array{
     *   externalAccountId: string,
     *   after?: string,
     *   contactIdentifier?: string,
     *   limit?: int,
     *   state?: string,
     * }|ParticipationListBreakdownByExternalAccountAndEventIDParams $params
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByExternalAccountAndEventID(
        string $externalEventID,
        array|ParticipationListBreakdownByExternalAccountAndEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = ParticipationListBreakdownByExternalAccountAndEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountId'];
        unset($parsed['externalAccountId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/participations/%1$s/%2$s/breakdown',
                $externalAccountID,
                $externalEventID,
            ],
            query: $parsed,
            options: $options,
            convert: ParticipationBreakdown::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Read Marketing event's participations breakdown with optional filters by internal identifier marketingEventId.
     *
     * @param array{
     *   after?: string, contactIdentifier?: string, limit?: int, state?: string
     * }|ParticipationListBreakdownByIDParams $params
     *
     * @return Page<ParticipationBreakdown>
     *
     * @throws APIException
     */
    public function listBreakdownByID(
        int $marketingEventID,
        array|ParticipationListBreakdownByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = ParticipationListBreakdownByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/participations/%1$s/breakdown',
                $marketingEventID,
            ],
            query: $parsed,
            options: $options,
            convert: ParticipationBreakdown::class,
            page: Page::class,
        );
    }
}
