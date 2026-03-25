<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
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
use HubspotSDK\ServiceContracts\Marketing\Events\ParticipationsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ParticipationsRawService implements ParticipationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param array{
     *   externalAccountID: string
     * }|ParticipationGetByExternalAccountAndEventIDParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ParticipationGetByExternalAccountAndEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/participations/%1$s/%2$s',
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/participations/%1$s',
                $marketingEventID,
            ],
            options: $requestOptions,
            convert: AttendanceCounters::class,
        );
    }

    /**
     * @api
     *
     * @param string $contactIdentifier The identifier of the Contact. It may be email or internal id.
     * @param array{
     *   after?: string, limit?: int, state?: string
     * }|ParticipationListBreakdownByContactParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ParticipationListBreakdownByContactParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/participations/contacts/%1$s/breakdown',
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
     * @param string $externalEventID path param: The id of the marketing event in the external event application
     * @param array{
     *   externalAccountID: string,
     *   after?: string,
     *   contactIdentifier?: string,
     *   limit?: int,
     *   state?: string,
     * }|ParticipationListBreakdownByExternalAccountAndEventIDParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ParticipationListBreakdownByExternalAccountAndEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/participations/%1$s/%2$s/breakdown',
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
     * @param int $marketingEventID the internal id of the marketing event in HubSpot
     * @param array{
     *   after?: string, contactIdentifier?: string, limit?: int, state?: string
     * }|ParticipationListBreakdownByIDParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ParticipationListBreakdownByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/participations/%1$s/breakdown',
                $marketingEventID,
            ],
            query: $parsed,
            options: $options,
            convert: ParticipationBreakdown::class,
            page: Page::class,
        );
    }
}
