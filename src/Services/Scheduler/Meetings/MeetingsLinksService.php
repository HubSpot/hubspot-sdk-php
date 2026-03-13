<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\ExternalBookingFormField;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalLinkMetadata;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;
use HubspotSDK\ServiceContracts\Scheduler\Meetings\MeetingsLinksContract;

/**
 * @phpstan-import-type ExternalBookingFormFieldShape from \HubspotSDK\Scheduler\Meetings\ExternalBookingFormField
 * @phpstan-import-type ExternalLegalConsentResponseShape from \HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class MeetingsLinksService implements MeetingsLinksContract
{
    /**
     * @api
     */
    public MeetingsLinksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MeetingsLinksRawService($client);
    }

    /**
     * @api
     *
     * Get a paged list meeting scheduling pages
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param string $name retrieve scheduling pages with a specified name
     * @param string $organizerUserID filter the response to scheduling pages created by the specified user
     * @param string $type filter the response to the specific type of meeting
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ExternalLinkMetadata>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?string $organizerUserID = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'limit' => $limit,
                'name' => $name,
                'organizerUserID' => $organizerUserID,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Book a meeting for a specified meeting page.
     *
     * @param list<ExternalBookingFormField|ExternalBookingFormFieldShape> $formFields
     * @param list<ExternalLegalConsentResponse|ExternalLegalConsentResponseShape> $legalConsentResponses
     * @param list<string> $likelyAvailableUserIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function book(
        int $duration,
        string $email,
        string $firstName,
        array $formFields,
        string $lastName,
        array $legalConsentResponses,
        array $likelyAvailableUserIDs,
        string $slug,
        \DateTimeInterface $startTime,
        ?string $locale = null,
        ?string $timezone = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalMeetingBookingResponse {
        $params = Util::removeNulls(
            [
                'duration' => $duration,
                'email' => $email,
                'firstName' => $firstName,
                'formFields' => $formFields,
                'lastName' => $lastName,
                'legalConsentResponses' => $legalConsentResponses,
                'likelyAvailableUserIDs' => $likelyAvailableUserIDs,
                'slug' => $slug,
                'startTime' => $startTime,
                'locale' => $locale,
                'timezone' => $timezone,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->book(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the next availability times for a meeting page.
     *
     * @param string $slug the path for the meeting page that you want the available times for
     * @param string $timezone return times in response based on specified time zone
     * @param int $monthOffset get times for a different month
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        string $timezone,
        ?int $monthOffset = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalLinkAvailabilityAndBusyTimes {
        $params = Util::removeNulls(
            ['timezone' => $timezone, 'monthOffset' => $monthOffset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAvailabilityBySlug($slug, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get details about the initial information necessary for a meeting scheduler.
     *
     * @param string $slug the path to the scheduling page that you want the information for
     * @param string $timezone return times in response based on specified time zone
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        string $timezone,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalBookingInfo {
        $params = Util::removeNulls(['timezone' => $timezone]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBookingInfoBySlug($slug, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
