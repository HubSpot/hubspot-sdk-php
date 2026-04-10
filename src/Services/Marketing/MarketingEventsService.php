<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponse;
use HubSpotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubSpotSDK\Marketing\MarketingEvents\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubSpotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventCreateRequestParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventDefaultResponse;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventExternalUniqueIdentifier;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponse;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponseV2;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicObjectIDDeleteRequest;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponse;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponseV2;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicUpdateRequestFullV2;
use HubSpotSDK\Page;
use HubSpotSDK\PropertyValue;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\MarketingEventsContract;
use HubSpotSDK\Services\Marketing\MarketingEvents\AttendanceService;
use HubSpotSDK\Services\Marketing\MarketingEvents\EventsService;
use HubSpotSDK\Services\Marketing\MarketingEvents\ListAssociationsService;
use HubSpotSDK\Services\Marketing\MarketingEvents\ParticipationsService;
use HubSpotSDK\Services\Marketing\MarketingEvents\SettingsService;
use HubSpotSDK\Services\Marketing\MarketingEvents\SubscriberStateService;

/**
 * @phpstan-import-type MarketingEventPublicObjectIDDeleteRequestShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicObjectIDDeleteRequest
 * @phpstan-import-type MarketingEventExternalUniqueIdentifierShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventExternalUniqueIdentifier
 * @phpstan-import-type MarketingEventPublicUpdateRequestFullV2Shape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicUpdateRequestFullV2
 * @phpstan-import-type MarketingEventCreateRequestParamsShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventCreateRequestParams
 * @phpstan-import-type PropertyValueShape from \HubSpotSDK\PropertyValue
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class MarketingEventsService implements MarketingEventsContract
{
    /**
     * @api
     */
    public MarketingEventsRawService $raw;

    /**
     * @api
     */
    public AttendanceService $attendance;

    /**
     * @api
     */
    public EventsService $events;

    /**
     * @api
     */
    public ListAssociationsService $listAssociations;

    /**
     * @api
     */
    public ParticipationsService $participations;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @api
     */
    public SubscriberStateService $subscriberState;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MarketingEventsRawService($client);
        $this->attendance = new AttendanceService($client);
        $this->events = new EventsService($client);
        $this->listAssociations = new ListAssociationsService($client);
        $this->participations = new ParticipationsService($client);
        $this->settings = new SettingsService($client);
        $this->subscriberState = new SubscriberStateService($client);
    }

    /**
     * @api
     *
     * Creates a new marketing event in HubSpot
     *
     * @param list<PropertyValue|PropertyValueShape> $customProperties A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param string $eventName the name of the marketing event
     * @param string $eventOrganizer the name of the organizer of the marketing event
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param \DateTimeInterface $endDateTime the end date and time of the marketing event
     * @param bool $eventCancelled Indicates if the marketing event has been cancelled.  Defaults to `false`
     * @param bool $eventCompleted Indicates if the marketing event has been completed.  Defaults to `false`
     * @param string $eventDescription the description of the marketing event
     * @param string $eventType Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL a URL in the external event application where the marketing event can be managed
     * @param \DateTimeInterface $startDateTime the start date and time of the marketing event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $customProperties,
        string $eventName,
        string $eventOrganizer,
        string $externalAccountID,
        string $externalEventID,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
        RequestOptions|array|null $requestOptions = null,
    ): MarketingEventDefaultResponse {
        $params = Util::removeNulls(
            [
                'customProperties' => $customProperties,
                'eventName' => $eventName,
                'eventOrganizer' => $eventOrganizer,
                'externalAccountID' => $externalAccountID,
                'externalEventID' => $externalEventID,
                'endDateTime' => $endDateTime,
                'eventCancelled' => $eventCancelled,
                'eventCompleted' => $eventCompleted,
                'eventDescription' => $eventDescription,
                'eventType' => $eventType,
                'eventURL' => $eventURL,
                'startDateTime' => $startDateTime,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the details of an existing Marketing Event identified by its objectId, if it exists.
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param list<PropertyValue|PropertyValueShape> $customProperties
     * @param \DateTimeInterface $endDateTime The end date and time of the marketing event
     * @param bool $eventCancelled Indicates if the marketing event has been cancelled
     * @param string $eventDescription The description of the marketing event
     * @param string $eventName The name of the marketing event
     * @param string $eventOrganizer The name of the organizer of the marketing event
     * @param string $eventType The type of the marketing event
     * @param string $eventURL A URL in the external event application where the marketing event can be managed
     * @param \DateTimeInterface $startDateTime The start date and time of the marketing event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array $customProperties,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?string $eventDescription = null,
        ?string $eventName = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
        RequestOptions|array|null $requestOptions = null,
    ): MarketingEventPublicDefaultResponseV2 {
        $params = Util::removeNulls(
            [
                'customProperties' => $customProperties,
                'endDateTime' => $endDateTime,
                'eventCancelled' => $eventCancelled,
                'eventDescription' => $eventDescription,
                'eventName' => $eventName,
                'eventOrganizer' => $eventOrganizer,
                'eventType' => $eventType,
                'eventURL' => $eventURL,
                'startDateTime' => $startDateTime,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<MarketingEventPublicReadResponseV2>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        int $limit = 10,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(['after' => $after, 'limit' => $limit]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the existing Marketing Event with the specified objectId, if it exists.
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes multiple Marketing Events from the portal based on their objectId, if they exist.
     *
     * Responses:
     * 204: Returned if all specified Marketing Events were successfully deleted.
     * 207: Returned if some objectIds did not correspond to any existing Marketing Events.
     *
     * @param list<MarketingEventPublicObjectIDDeleteRequest|MarketingEventPublicObjectIDDeleteRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): string {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes multiple Marketing Events based on externalAccountId, externalEventId, and appId.
     *
     * Only Marketing Events created by the same apps will be deleted; events from other apps cannot be removed by this endpoint.
     *
     * @param list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): string {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteBatchByExternalEventID(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the existing Marketing Event with the specified externalAccountId, externalEventId, if it exists.
     *
     * Only Marketing Events created by the same app can be deleted.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['externalAccountID' => $externalAccountID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteByExternalEventID($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details of a Marketing Event with the specified objectId, if it exists.
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): MarketingEventPublicReadResponseV2 {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details of a Marketing Event with the specified externalAccountId, externalEventId, if it exists.
     *
     * Only Marketing Events created by the same app making the request can be retrieved.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        RequestOptions|array|null $requestOptions = null,
    ): MarketingEventPublicReadResponse {
        $params = Util::removeNulls(['externalAccountID' => $externalAccountID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByExternalEventID($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves Marketing Events where the externalEventId matches the value provided in the request, limited to events created by the app making the request.
     *
     * Marketing Events created by other apps will not be included in the results.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        string $q,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseSearchPublicResponseWrapperNoPaging {
        $params = Util::removeNulls(['q' => $q]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->searchByExternalEventID(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint searches the portal for all Marketing Events whose externalEventId matches the value provided in the request.
     *
     * It retrieves the objectId and additional event details for each matching Marketing Event.
     *
     * Since multiple Marketing Events can have the same externalEventId, the endpoint returns all matching results.
     *
     * Note: Marketing Events become searchable by externalEventId a few minutes after creation.
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseWithTotalMarketingEventIdentifiersResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->searchIdentifiersByExternalEventID($externalEventID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates multiple Marketing Events on the portal based on their objectId, if they exist.
     *
     * @param list<MarketingEventPublicUpdateRequestFullV2|MarketingEventPublicUpdateRequestFullV2Shape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponseV2 {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the details of an existing Marketing Event identified by its externalAccountId, externalEventId if it exists.
     *
     * Only Marketing Events created by the same app can be updated.
     *
     * @param string $externalEventID Path param
     * @param string $externalAccountID Query param
     * @param list<PropertyValue|PropertyValueShape> $customProperties Body param: A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param \DateTimeInterface $endDateTime body param: The end date and time of the marketing event
     * @param bool $eventCancelled Body param: Indicates if the marketing event has been cancelled. Defaults to `false`
     * @param bool $eventCompleted Body param: Indicates if the marketing event has been completed. Defaults to `false`
     * @param string $eventDescription body param: The description of the marketing event
     * @param string $eventName body param: The name of the marketing event
     * @param string $eventOrganizer body param: The name of the organizer of the marketing event
     * @param string $eventType Body param: Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL body param: A URL in the external event application where the marketing event can be managed
     * @param \DateTimeInterface $startDateTime body param: The start date and time of the marketing event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        array $customProperties,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventName = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
        RequestOptions|array|null $requestOptions = null,
    ): MarketingEventPublicDefaultResponse {
        $params = Util::removeNulls(
            [
                'externalAccountID' => $externalAccountID,
                'customProperties' => $customProperties,
                'endDateTime' => $endDateTime,
                'eventCancelled' => $eventCancelled,
                'eventCompleted' => $eventCompleted,
                'eventDescription' => $eventDescription,
                'eventName' => $eventName,
                'eventOrganizer' => $eventOrganizer,
                'eventType' => $eventType,
                'eventURL' => $eventURL,
                'startDateTime' => $startDateTime,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateByExternalEventID($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upserts multiple Marketing Events. If a Marketing Event with the specified ID already exists, it will be updated; otherwise, a new event will be created.
     *
     * Only Marketing Events originally created by the same app can be updated.
     *
     * @param list<MarketingEventCreateRequestParams|MarketingEventCreateRequestParamsShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsertBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponse {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsertBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upserts a marketing event If there is an existing marketing event with the specified ID, it will be updated; otherwise a new event will be created.
     *
     * @param list<PropertyValue|PropertyValueShape> $customProperties A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param string $eventName the name of the marketing event
     * @param string $eventOrganizer the name of the organizer of the marketing event
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param \DateTimeInterface $endDateTime the end date and time of the marketing event
     * @param bool $eventCancelled Indicates if the marketing event has been cancelled.  Defaults to `false`
     * @param bool $eventCompleted Indicates if the marketing event has been completed.  Defaults to `false`
     * @param string $eventDescription the description of the marketing event
     * @param string $eventType Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL a URL in the external event application where the marketing event can be managed
     * @param \DateTimeInterface $startDateTime the start date and time of the marketing event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsertByExternalEventID(
        string $externalEventID_,
        array $customProperties,
        string $eventName,
        string $eventOrganizer,
        string $externalAccountID,
        string $externalEventID,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
        RequestOptions|array|null $requestOptions = null,
    ): MarketingEventPublicDefaultResponse {
        $params = Util::removeNulls(
            [
                'customProperties' => $customProperties,
                'eventName' => $eventName,
                'eventOrganizer' => $eventOrganizer,
                'externalAccountID' => $externalAccountID,
                'externalEventID' => $externalEventID,
                'endDateTime' => $endDateTime,
                'eventCancelled' => $eventCancelled,
                'eventCompleted' => $eventCompleted,
                'eventDescription' => $eventDescription,
                'eventType' => $eventType,
                'eventURL' => $eventURL,
                'startDateTime' => $startDateTime,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsertByExternalEventID($externalEventID_, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
