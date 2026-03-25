<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Advanced\AdvancedBookParams;
use HubspotSDK\Scheduler\Meetings\Advanced\AdvancedCreateParams;
use HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubspotSDK\Scheduler\Meetings\ExternalBookingFormField;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;
use HubspotSDK\ServiceContracts\Scheduler\Meetings\AdvancedRawContract;

/**
 * @phpstan-import-type ExternalAssociationCreateRequestShape from \HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest
 * @phpstan-import-type ExternalEmailReminderScheduleShape from \HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule
 * @phpstan-import-type ExternalCalendarMeetingEventCreatePropertiesShape from \HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties
 * @phpstan-import-type ExternalBookingFormFieldShape from \HubspotSDK\Scheduler\Meetings\ExternalBookingFormField
 * @phpstan-import-type ExternalLegalConsentResponseShape from \HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AdvancedRawService implements AdvancedRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new calendar event and meeting object by providing the necessary details such as associations, email reminders, meeting object properties, and timezone.
     *
     * @param array{
     *   organizerUserID: string,
     *   associations: list<ExternalAssociationCreateRequest|ExternalAssociationCreateRequestShape>,
     *   emailReminderSchedule: ExternalEmailReminderSchedule|ExternalEmailReminderScheduleShape,
     *   properties: ExternalCalendarMeetingEventCreateProperties|ExternalCalendarMeetingEventCreatePropertiesShape,
     *   timezone: string,
     * }|AdvancedCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalCalenderMeetingEventResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AdvancedCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AdvancedCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['organizerUserID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'scheduler/2026-03/meetings/calendar',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['organizerUserID' => 'organizerUserId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ExternalCalenderMeetingEventResponse::class,
        );
    }

    /**
     * @api
     *
     * Book a meeting for a specified meeting page.
     *
     * @param array{
     *   duration: int,
     *   email: string,
     *   firstName: string,
     *   formFields: list<ExternalBookingFormField|ExternalBookingFormFieldShape>,
     *   lastName: string,
     *   legalConsentResponses: list<ExternalLegalConsentResponse|ExternalLegalConsentResponseShape>,
     *   likelyAvailableUserIDs: list<string>,
     *   slug: string,
     *   startTime: \DateTimeInterface,
     *   locale?: string,
     *   timezone?: string,
     * }|AdvancedBookParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalMeetingBookingResponse>
     *
     * @throws APIException
     */
    public function book(
        array|AdvancedBookParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AdvancedBookParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'scheduler/2026-03/meetings/meeting-links/book',
            body: (object) $parsed,
            options: $options,
            convert: ExternalMeetingBookingResponse::class,
        );
    }
}
