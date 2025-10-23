<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Calendar\CalendarCreateParams;
use HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;
use HubspotSDK\ServiceContracts\Scheduler\Meetings\CalendarContract;

final class CalendarService implements CalendarContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param list<ExternalAssociationCreateRequest> $associations
     * @param ExternalEmailReminderSchedule $emailReminderSchedule
     * @param ExternalCalendarMeetingEventCreateProperties $properties
     * @param string $timezone
     *
     * @throws APIException
     */
    public function create(
        $associations,
        $emailReminderSchedule,
        $properties,
        $timezone,
        ?RequestOptions $requestOptions = null,
    ): ExternalCalenderMeetingEventResponse {
        $params = [
            'associations' => $associations,
            'emailReminderSchedule' => $emailReminderSchedule,
            'properties' => $properties,
            'timezone' => $timezone,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalCalenderMeetingEventResponse {
        [$parsed, $options] = CalendarCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'scheduler/v3/meetings/calendar',
            body: (object) $parsed,
            options: $options,
            convert: ExternalCalenderMeetingEventResponse::class,
        );
    }
}
