<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventCancelByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventCompleteByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventCreateParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventCreateRequestParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteBatchByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventExternalUniqueIdentifier;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventGetByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventListParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicObjectIDDeleteRequest;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponseV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicUpdateRequestFullV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSearchByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpsertBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpsertByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpsertSubscriberStateByEmailParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpsertSubscriberStateByIDParams;
use HubspotSDK\Marketing\MarketingEvents\PropertyValue;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\MarketingEventsContract;
use HubspotSDK\Services\Marketing\MarketingEvents\AssociationsService;
use HubspotSDK\Services\Marketing\MarketingEvents\AttendanceService;
use HubspotSDK\Services\Marketing\MarketingEvents\ParticipationsService;
use HubspotSDK\Services\Marketing\MarketingEvents\SettingsService;

use const HubspotSDK\Core\OMIT as omit;

final class MarketingEventsService implements MarketingEventsContract
{
    /**
     * @@api
     */
    public AssociationsService $associations;

    /**
     * @@api
     */
    public AttendanceService $attendance;

    /**
     * @@api
     */
    public ParticipationsService $participations;

    /**
     * @@api
     */
    public SettingsService $settings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->associations = new AssociationsService($client);
        $this->attendance = new AttendanceService($client);
        $this->participations = new ParticipationsService($client);
        $this->settings = new SettingsService($client);
    }

    /**
     * @api
     *
     * Creates a new marketing event in HubSpot
     *
     * @param string $eventName the name of the marketing event
     * @param string $eventOrganizer the name of the organizer of the marketing event
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param list<PropertyValue> $customProperties A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param \DateTimeInterface $endDateTime the end date and time of the marketing event
     * @param bool $eventCancelled Indicates if the marketing event has been cancelled.  Defaults to `false`
     * @param bool $eventCompleted
     * @param string $eventDescription the description of the marketing event
     * @param string $eventType Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL a URL in the external event application where the marketing event can be managed
     * @param \DateTimeInterface $startDateTime the start date and time of the marketing event
     *
     * @throws APIException
     */
    public function create(
        $eventName,
        $eventOrganizer,
        $externalAccountID,
        $externalEventID,
        $customProperties = omit,
        $endDateTime = omit,
        $eventCancelled = omit,
        $eventCompleted = omit,
        $eventDescription = omit,
        $eventType = omit,
        $eventURL = omit,
        $startDateTime = omit,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        $params = [
            'eventName' => $eventName,
            'eventOrganizer' => $eventOrganizer,
            'externalAccountID' => $externalAccountID,
            'externalEventID' => $externalEventID,
            'customProperties' => $customProperties,
            'endDateTime' => $endDateTime,
            'eventCancelled' => $eventCancelled,
            'eventCompleted' => $eventCompleted,
            'eventDescription' => $eventDescription,
            'eventType' => $eventType,
            'eventURL' => $eventURL,
            'startDateTime' => $startDateTime,
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
    ): MarketingEventDefaultResponse {
        [$parsed, $options] = MarketingEventCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/marketing-events/events',
            body: (object) $parsed,
            options: $options,
            convert: MarketingEventDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the details of an existing Marketing Event identified by its objectId, if it exists.
     *
     * @param list<PropertyValue> $customProperties
     * @param \DateTimeInterface $endDateTime
     * @param bool $eventCancelled
     * @param string $eventDescription
     * @param string $eventName
     * @param string $eventOrganizer
     * @param string $eventType
     * @param string $eventURL
     * @param \DateTimeInterface $startDateTime
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        $customProperties,
        $endDateTime = omit,
        $eventCancelled = omit,
        $eventDescription = omit,
        $eventName = omit,
        $eventOrganizer = omit,
        $eventType = omit,
        $eventURL = omit,
        $startDateTime = omit,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponseV2 {
        $params = [
            'customProperties' => $customProperties,
            'endDateTime' => $endDateTime,
            'eventCancelled' => $eventCancelled,
            'eventDescription' => $eventDescription,
            'eventName' => $eventName,
            'eventOrganizer' => $eventOrganizer,
            'eventType' => $eventType,
            'eventURL' => $eventURL,
            'startDateTime' => $startDateTime,
        ];

        return $this->updateRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MarketingEventPublicDefaultResponseV2 {
        [$parsed, $options] = MarketingEventUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/marketing-events/%1$s', $objectID],
            body: (object) $parsed,
            options: $options,
            convert: MarketingEventPublicDefaultResponseV2::class,
        );
    }

    /**
     * @api
     *
     * Returns all Marketing Events available on the portal, along with their properties, regardless of whether they were created manually or through the application.
     *
     * The marketing events returned by this endpoint are sorted by objectId.
     *
     * @param string $after the cursor indicating the position of the last retrieved item
     * @param int $limit The limit for response size. The default value is 10, the max number is 100
     *
     * @return Page<MarketingEventPublicReadResponseV2>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['after' => $after, 'limit' => $limit];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<MarketingEventPublicReadResponseV2>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = MarketingEventListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/marketing-events/',
            query: $parsed,
            options: $options,
            convert: MarketingEventPublicReadResponseV2::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Deletes the existing Marketing Event with the specified objectId, if it exists.
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/marketing-events/%1$s', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Mark a marketing event as cancelled.
     *
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        $params = ['externalAccountID' => $externalAccountID];

        return $this->cancelByExternalEventIDRaw(
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
    public function cancelByExternalEventIDRaw(
        string $externalEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        [
            $parsed, $options,
        ] = MarketingEventCancelByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/events/%1$s/cancel', $externalEventID,
            ],
            query: $parsed,
            options: $options,
            convert: MarketingEventDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Mark a marketing event as completed
     *
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param \DateTimeInterface $endDateTime
     * @param \DateTimeInterface $startDateTime
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        $externalAccountID,
        $endDateTime,
        $startDateTime,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        $params = [
            'externalAccountID' => $externalAccountID,
            'endDateTime' => $endDateTime,
            'startDateTime' => $startDateTime,
        ];

        return $this->completeByExternalEventIDRaw(
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
    public function completeByExternalEventIDRaw(
        string $externalEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        [
            $parsed, $options,
        ] = MarketingEventCompleteByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['externalAccountId'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/events/%1$s/complete', $externalEventID,
            ],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: MarketingEventDefaultResponse::class,
        );
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
     * @param list<MarketingEventPublicObjectIDDeleteRequest> $inputs
     *
     * @throws APIException
     */
    public function deleteBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->deleteBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = MarketingEventDeleteBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/marketing-events/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Deletes multiple Marketing Events based on externalAccountId, externalEventId, and appId.
     *
     * Only Marketing Events created by the same apps will be deleted; events from other apps cannot be removed by this endpoint.
     *
     * @param list<MarketingEventExternalUniqueIdentifier> $inputs
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): string {
        $params = ['inputs' => $inputs];

        return $this->deleteBatchByExternalEventIDRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): string {
        [
            $parsed, $options,
        ] = MarketingEventDeleteBatchByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/marketing-events/events/delete',
            headers: ['Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Deletes the existing Marketing Event with the specified externalAccountId, externalEventId, if it exists.
     *
     * Only Marketing Events created by the same app can be deleted.
     *
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['externalAccountID' => $externalAccountID];

        return $this->deleteByExternalEventIDRaw(
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
    public function deleteByExternalEventIDRaw(
        string $externalEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [
            $parsed, $options,
        ] = MarketingEventDeleteByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/marketing-events/events/%1$s', $externalEventID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns the details of a Marketing Event with the specified objectId, if it exists.
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): MarketingEventPublicReadResponseV2 {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/marketing-events/%1$s', $objectID],
            options: $requestOptions,
            convert: MarketingEventPublicReadResponseV2::class,
        );
    }

    /**
     * @api
     *
     * Returns the details of a Marketing Event with the specified externalAccountId, externalEventId, if it exists.
     *
     * Only Marketing Events created by the same app making the request can be retrieved.
     *
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicReadResponse {
        $params = ['externalAccountID' => $externalAccountID];

        return $this->getByExternalEventIDRaw(
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
    public function getByExternalEventIDRaw(
        string $externalEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicReadResponse {
        [
            $parsed, $options,
        ] = MarketingEventGetByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/marketing-events/events/%1$s', $externalEventID],
            query: $parsed,
            options: $options,
            convert: MarketingEventPublicReadResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves Marketing Events where the externalEventId matches the value provided in the request, limited to events created by the app making the request.
     *
     * Marketing Events created by other apps will not be included in the results.
     *
     * @param string $q The id of the marketing event in the external event application (externalEventId)
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        $q,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseSearchPublicResponseWrapperNoPaging {
        $params = ['q' => $q];

        return $this->searchByExternalEventIDRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function searchByExternalEventIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseSearchPublicResponseWrapperNoPaging {
        [
            $parsed, $options,
        ] = MarketingEventSearchByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/marketing-events/events/search',
            query: $parsed,
            options: $options,
            convert: CollectionResponseSearchPublicResponseWrapperNoPaging::class,
        );
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
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/%1$s/identifiers', $externalEventID,
            ],
            options: $requestOptions,
            convert: CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Updates multiple Marketing Events on the portal based on their objectId, if they exist.
     *
     * @param list<MarketingEventPublicUpdateRequestFullV2> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponseV2 {
        $params = ['inputs' => $inputs];

        return $this->updateBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponseV2 {
        [$parsed, $options] = MarketingEventUpdateBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/marketing-events/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseMarketingEventPublicDefaultResponseV2::class,
        );
    }

    /**
     * @api
     *
     * Updates the details of an existing Marketing Event identified by its externalAccountId, externalEventId if it exists.
     *
     * Only Marketing Events created by the same app can be updated.
     *
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     * @param list<PropertyValue> $customProperties A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param \DateTimeInterface $endDateTime the end date and time of the marketing event
     * @param bool $eventCancelled Indicates if the marketing event has been cancelled. Defaults to `false`
     * @param bool $eventCompleted
     * @param string $eventDescription the description of the marketing event
     * @param string $eventName the name of the marketing event
     * @param string $eventOrganizer the name of the organizer of the marketing event
     * @param string $eventType Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL a URL in the external event application where the marketing event can be managed
     * @param \DateTimeInterface $startDateTime the start date and time of the marketing event
     *
     * @throws APIException
     */
    public function updateByExternalEventID(
        string $externalEventID,
        $externalAccountID,
        $customProperties = omit,
        $endDateTime = omit,
        $eventCancelled = omit,
        $eventCompleted = omit,
        $eventDescription = omit,
        $eventName = omit,
        $eventOrganizer = omit,
        $eventType = omit,
        $eventURL = omit,
        $startDateTime = omit,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse {
        $params = [
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
        ];

        return $this->updateByExternalEventIDRaw(
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
    public function updateByExternalEventIDRaw(
        string $externalEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse {
        [
            $parsed, $options,
        ] = MarketingEventUpdateByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['externalAccountId'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/marketing-events/events/%1$s', $externalEventID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: MarketingEventPublicDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Upserts multiple Marketing Events. If a Marketing Event with the specified ID already exists, it will be updated; otherwise, a new event will be created.
     *
     * Only Marketing Events originally created by the same app can be updated.
     *
     * @param list<MarketingEventCreateRequestParams> $inputs
     *
     * @throws APIException
     */
    public function upsertBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponse {
        $params = ['inputs' => $inputs];

        return $this->upsertBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function upsertBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponse {
        [$parsed, $options] = MarketingEventUpsertBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/marketing-events/events/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseMarketingEventPublicDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Upserts a marketing event If there is an existing marketing event with the specified ID, it will be updated; otherwise a new event will be created.
     *
     * @param string $eventName the name of the marketing event
     * @param string $eventOrganizer the name of the organizer of the marketing event
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID1 the id of the marketing event in the external event application
     * @param list<PropertyValue> $customProperties A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param \DateTimeInterface $endDateTime the end date and time of the marketing event
     * @param bool $eventCancelled Indicates if the marketing event has been cancelled.  Defaults to `false`
     * @param bool $eventCompleted
     * @param string $eventDescription the description of the marketing event
     * @param string $eventType Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL a URL in the external event application where the marketing event can be managed
     * @param \DateTimeInterface $startDateTime the start date and time of the marketing event
     *
     * @throws APIException
     */
    public function upsertByExternalEventID(
        string $externalEventID,
        $eventName,
        $eventOrganizer,
        $externalAccountID,
        $externalEventID1,
        $customProperties = omit,
        $endDateTime = omit,
        $eventCancelled = omit,
        $eventCompleted = omit,
        $eventDescription = omit,
        $eventType = omit,
        $eventURL = omit,
        $startDateTime = omit,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse {
        $params = [
            'eventName' => $eventName,
            'eventOrganizer' => $eventOrganizer,
            'externalAccountID' => $externalAccountID,
            'externalEventID' => $externalEventID1,
            'customProperties' => $customProperties,
            'endDateTime' => $endDateTime,
            'eventCancelled' => $eventCancelled,
            'eventCompleted' => $eventCompleted,
            'eventDescription' => $eventDescription,
            'eventType' => $eventType,
            'eventURL' => $eventURL,
            'startDateTime' => $startDateTime,
        ];

        return $this->upsertByExternalEventIDRaw(
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
    public function upsertByExternalEventIDRaw(
        string $externalEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse {
        [
            $parsed, $options,
        ] = MarketingEventUpsertByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['marketing/v3/marketing-events/events/%1$s', $externalEventID],
            body: (object) $parsed,
            options: $options,
            convert: MarketingEventPublicDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Record a subscriber state between multiple HubSpot contacts and a marketing event, using contact email addresses. Note that the contact must already exist in HubSpot; a contact will not be created. The contactProperties field is used only when creating a new contact. These properties will not update existing contacts.
     *
     * @param string $externalEventID
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     * @param list<MarketingEventEmailSubscriber> $inputs List of marketing event details to create or update
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByEmail(
        string $subscriberState,
        $externalEventID,
        $externalAccountID,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = [
            'externalEventID' => $externalEventID,
            'externalAccountID' => $externalAccountID,
            'inputs' => $inputs,
        ];

        return $this->upsertSubscriberStateByEmailRaw(
            $subscriberState,
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
    public function upsertSubscriberStateByEmailRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [
            $parsed, $options,
        ] = MarketingEventUpsertSubscriberStateByEmailParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = ['externalAccountId'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/events/%1$s/%2$s/email-upsert',
                $externalEventID,
                $subscriberState,
            ],
            query: array_diff_key($parsed, $query_params),
            headers: ['Accept' => '*/*'],
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['externalEventID']
            ),
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Record a subscriber state between multiple HubSpot contacts and a marketing event, using HubSpot contact IDs. Note that the contact must already exist in HubSpot; a contact will not be created.
     *
     * @param string $externalEventID
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     * @param list<MarketingEventSubscriber> $inputs List of HubSpot contacts to subscribe to the marketing event
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByID(
        string $subscriberState,
        $externalEventID,
        $externalAccountID,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = [
            'externalEventID' => $externalEventID,
            'externalAccountID' => $externalAccountID,
            'inputs' => $inputs,
        ];

        return $this->upsertSubscriberStateByIDRaw(
            $subscriberState,
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
    public function upsertSubscriberStateByIDRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [
            $parsed, $options,
        ] = MarketingEventUpsertSubscriberStateByIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = ['externalAccountId'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/events/%1$s/%2$s/upsert',
                $externalEventID,
                $subscriberState,
            ],
            query: array_diff_key($parsed, $query_params),
            headers: ['Accept' => '*/*'],
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['externalEventID']
            ),
            options: $options,
            convert: 'string',
        );
    }
}
