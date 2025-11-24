<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging;
use HubspotSDK\Marketing\Events\EventCancelByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventCompleteByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventCreateParams;
use HubspotSDK\Marketing\Events\EventDeleteBatchByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventDeleteBatchParams;
use HubspotSDK\Marketing\Events\EventDeleteByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventGetByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventListParams;
use HubspotSDK\Marketing\Events\EventSearchByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpdateBatchParams;
use HubspotSDK\Marketing\Events\EventUpdateByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpdateParams;
use HubspotSDK\Marketing\Events\EventUpsertBatchParams;
use HubspotSDK\Marketing\Events\EventUpsertByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpsertSubscriberStateByEmailParams;
use HubspotSDK\Marketing\Events\EventUpsertSubscriberStateByIDParams;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponseV2;
use HubspotSDK\Marketing\Events\PropertyValue;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\EventsContract;
use HubspotSDK\Services\Marketing\Events\AssociationsService;
use HubspotSDK\Services\Marketing\Events\AttendanceService;
use HubspotSDK\Services\Marketing\Events\ParticipationsService;
use HubspotSDK\Services\Marketing\Events\SettingsService;

final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public AssociationsService $associations;

    /**
     * @api
     */
    public AttendanceService $attendance;

    /**
     * @api
     */
    public ParticipationsService $participations;

    /**
     * @api
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
     * @param array{
     *   customProperties: list<array{
     *     dataSensitivity: "high"|"none"|"standard",
     *     isEncrypted: bool,
     *     isLargeValue: bool,
     *     name: string,
     *     persistenceTimestamp: int,
     *     requestId: string,
     *     selectedByUser: bool,
     *     selectedByUserTimestamp: int,
     *     source: "ACADEMY"|"ACCEPTANCE_TEST"|"ADS"|"AI_GROUP"|"ANALYTICS"|"API"|"APPROVALS"|"ASSISTS"|"ASSOCIATIONS"|"AUTOMATION_JOURNEY"|"AUTOMATION_PLATFORM"|"AVATARS_SERVICE"|"BATCH_UPDATE"|"BCC_TO_CRM"|"BEHAVIORAL_EVENTS"|"BET_ASSIGNMENT"|"BET_CRM_CONNECTOR"|"BIDEN"|"BILLING"|"BOT"|"CALCULATED"|"CENTRAL_EXCHANGE_RATES"|"CHATSPOT"|"CLONE_OBJECTS"|"COMMUNICATOR"|"COMPANIES"|"COMPANY_FAMILIES"|"COMPANY_INSIGHTS"|"CONTACTS"|"CONTACTS_WEB"|"CONTENT_MEMBERSHIP"|"CONVERSATIONAL_ENRICHMENT"|"CONVERSATIONS"|"CRM_PROCESSES_PLATFORM"|"CRM_UI"|"CRM_UI_BULK_ACTION"|"DATA_ENRICHMENT"|"DATASET"|"DEALS"|"DEFAULT"|"EMAIL"|"EMAIL_INTEGRATION"|"ENGAGEMENTS"|"EXTENSION"|"FILE_MANAGER"|"FLYWHEEL_PRODUCT_DATA_SYNC"|"FORECASTING"|"FORM"|"FORWARD_TO_CRM"|"GMAIL_INTEGRATION"|"GOALS"|"HEISENBERG"|"HELP_DESK"|"HELP_DESK_AI"|"IMPORT"|"INTEGRATION"|"INTEGRATIONS_PLATFORM"|"INTEGRATIONS_SYNC"|"INTENT"|"INTERNAL_PROCESSING"|"LEADIN"|"MARKET_SOURCING"|"MARKETPLACE"|"MEETINGS"|"MERGE_COMPANIES"|"MERGE_CONTACTS"|"MERGE_OBJECTS"|"MICROAPPS"|"MIGRATION"|"MOBILE_ANDROID"|"MOBILE_IOS"|"PAYMENTS"|"PIPELINE_SETTINGS"|"PLAYBOOKS"|"PORTAL_OBJECT_SYNC"|"PORTAL_USER_ASSOCIATOR"|"PRESENTATIONS"|"PROPERTY_RESTORE"|"PROPERTY_SETTINGS"|"PROSPECTING_AGENT"|"QUOTAS"|"QUOTES"|"RECYCLING_BIN"|"SALES"|"SALES_MESSAGES"|"SALESFORCE"|"SEQUENCES"|"SETTINGS"|"SIDEKICK"|"SIGNALS"|"SLACK_INTEGRATION"|"SOCIAL"|"SUCCESS"|"TALLY"|"TASK"|"UNKNOWN"|"WAL_INCREMENTAL"|"WORKFLOW_CONTACT_DELETE_ACTION"|"WORKFLOWS",
     *     sourceId: string,
     *     sourceLabel: string,
     *     sourceMetadata: string,
     *     sourceUpstreamDeployable: string,
     *     sourceVid: list<int>,
     *     timestamp: int,
     *     unit: string,
     *     updatedByUserId: int,
     *     useTimestampAsPersistenceTimestamp: bool,
     *     value: string,
     *   }|PropertyValue>,
     *   eventName: string,
     *   eventOrganizer: string,
     *   externalAccountId: string,
     *   externalEventId: string,
     *   endDateTime?: string|\DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventCompleted?: bool,
     *   eventDescription?: string,
     *   eventType?: string,
     *   eventUrl?: string,
     *   startDateTime?: string|\DateTimeInterface,
     * }|EventCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): MarketingEventDefaultResponse {
        [$parsed, $options] = EventCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   customProperties: list<array{
     *     dataSensitivity: "high"|"none"|"standard",
     *     isEncrypted: bool,
     *     isLargeValue: bool,
     *     name: string,
     *     persistenceTimestamp: int,
     *     requestId: string,
     *     selectedByUser: bool,
     *     selectedByUserTimestamp: int,
     *     source: "ACADEMY"|"ACCEPTANCE_TEST"|"ADS"|"AI_GROUP"|"ANALYTICS"|"API"|"APPROVALS"|"ASSISTS"|"ASSOCIATIONS"|"AUTOMATION_JOURNEY"|"AUTOMATION_PLATFORM"|"AVATARS_SERVICE"|"BATCH_UPDATE"|"BCC_TO_CRM"|"BEHAVIORAL_EVENTS"|"BET_ASSIGNMENT"|"BET_CRM_CONNECTOR"|"BIDEN"|"BILLING"|"BOT"|"CALCULATED"|"CENTRAL_EXCHANGE_RATES"|"CHATSPOT"|"CLONE_OBJECTS"|"COMMUNICATOR"|"COMPANIES"|"COMPANY_FAMILIES"|"COMPANY_INSIGHTS"|"CONTACTS"|"CONTACTS_WEB"|"CONTENT_MEMBERSHIP"|"CONVERSATIONAL_ENRICHMENT"|"CONVERSATIONS"|"CRM_PROCESSES_PLATFORM"|"CRM_UI"|"CRM_UI_BULK_ACTION"|"DATA_ENRICHMENT"|"DATASET"|"DEALS"|"DEFAULT"|"EMAIL"|"EMAIL_INTEGRATION"|"ENGAGEMENTS"|"EXTENSION"|"FILE_MANAGER"|"FLYWHEEL_PRODUCT_DATA_SYNC"|"FORECASTING"|"FORM"|"FORWARD_TO_CRM"|"GMAIL_INTEGRATION"|"GOALS"|"HEISENBERG"|"HELP_DESK"|"HELP_DESK_AI"|"IMPORT"|"INTEGRATION"|"INTEGRATIONS_PLATFORM"|"INTEGRATIONS_SYNC"|"INTENT"|"INTERNAL_PROCESSING"|"LEADIN"|"MARKET_SOURCING"|"MARKETPLACE"|"MEETINGS"|"MERGE_COMPANIES"|"MERGE_CONTACTS"|"MERGE_OBJECTS"|"MICROAPPS"|"MIGRATION"|"MOBILE_ANDROID"|"MOBILE_IOS"|"PAYMENTS"|"PIPELINE_SETTINGS"|"PLAYBOOKS"|"PORTAL_OBJECT_SYNC"|"PORTAL_USER_ASSOCIATOR"|"PRESENTATIONS"|"PROPERTY_RESTORE"|"PROPERTY_SETTINGS"|"PROSPECTING_AGENT"|"QUOTAS"|"QUOTES"|"RECYCLING_BIN"|"SALES"|"SALES_MESSAGES"|"SALESFORCE"|"SEQUENCES"|"SETTINGS"|"SIDEKICK"|"SIGNALS"|"SLACK_INTEGRATION"|"SOCIAL"|"SUCCESS"|"TALLY"|"TASK"|"UNKNOWN"|"WAL_INCREMENTAL"|"WORKFLOW_CONTACT_DELETE_ACTION"|"WORKFLOWS",
     *     sourceId: string,
     *     sourceLabel: string,
     *     sourceMetadata: string,
     *     sourceUpstreamDeployable: string,
     *     sourceVid: list<int>,
     *     timestamp: int,
     *     unit: string,
     *     updatedByUserId: int,
     *     useTimestampAsPersistenceTimestamp: bool,
     *     value: string,
     *   }|PropertyValue>,
     *   endDateTime?: string|\DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventDescription?: string,
     *   eventName?: string,
     *   eventOrganizer?: string,
     *   eventType?: string,
     *   eventUrl?: string,
     *   startDateTime?: string|\DateTimeInterface,
     * }|EventUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|EventUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponseV2 {
        [$parsed, $options] = EventUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{after?: string, limit?: int}|EventListParams $params
     *
     * @return Page<MarketingEventPublicReadResponseV2>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   externalAccountId: string
     * }|EventCancelByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        array|EventCancelByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        [$parsed, $options] = EventCancelByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   externalAccountId: string,
     *   endDateTime: string|\DateTimeInterface,
     *   startDateTime: string|\DateTimeInterface,
     * }|EventCompleteByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        array|EventCompleteByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        [$parsed, $options] = EventCompleteByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   inputs: list<array{objectId: string}>
     * }|EventDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|EventDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = EventDeleteBatchParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   inputs: list<array{
     *     appId: int, externalAccountId: string, externalEventId: string
     *   }>,
     * }|EventDeleteBatchByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array|EventDeleteBatchByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = EventDeleteBatchByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   externalAccountId: string
     * }|EventDeleteByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        array|EventDeleteByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = EventDeleteByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{externalAccountId: string}|EventGetByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        array|EventGetByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicReadResponse {
        [$parsed, $options] = EventGetByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{q: string}|EventSearchByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        array|EventSearchByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseSearchPublicResponseWrapperNoPaging {
        [$parsed, $options] = EventSearchByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   inputs: list<array{
     *     customProperties: list<array<mixed>|PropertyValue>,
     *     objectId: string,
     *     endDateTime?: string|\DateTimeInterface,
     *     eventCancelled?: bool,
     *     eventDescription?: string,
     *     eventName?: string,
     *     eventOrganizer?: string,
     *     eventType?: string,
     *     eventUrl?: string,
     *     startDateTime?: string|\DateTimeInterface,
     *   }>,
     * }|EventUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        array|EventUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponseV2 {
        [$parsed, $options] = EventUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   externalAccountId: string,
     *   customProperties: list<array{
     *     dataSensitivity: "high"|"none"|"standard",
     *     isEncrypted: bool,
     *     isLargeValue: bool,
     *     name: string,
     *     persistenceTimestamp: int,
     *     requestId: string,
     *     selectedByUser: bool,
     *     selectedByUserTimestamp: int,
     *     source: "ACADEMY"|"ACCEPTANCE_TEST"|"ADS"|"AI_GROUP"|"ANALYTICS"|"API"|"APPROVALS"|"ASSISTS"|"ASSOCIATIONS"|"AUTOMATION_JOURNEY"|"AUTOMATION_PLATFORM"|"AVATARS_SERVICE"|"BATCH_UPDATE"|"BCC_TO_CRM"|"BEHAVIORAL_EVENTS"|"BET_ASSIGNMENT"|"BET_CRM_CONNECTOR"|"BIDEN"|"BILLING"|"BOT"|"CALCULATED"|"CENTRAL_EXCHANGE_RATES"|"CHATSPOT"|"CLONE_OBJECTS"|"COMMUNICATOR"|"COMPANIES"|"COMPANY_FAMILIES"|"COMPANY_INSIGHTS"|"CONTACTS"|"CONTACTS_WEB"|"CONTENT_MEMBERSHIP"|"CONVERSATIONAL_ENRICHMENT"|"CONVERSATIONS"|"CRM_PROCESSES_PLATFORM"|"CRM_UI"|"CRM_UI_BULK_ACTION"|"DATA_ENRICHMENT"|"DATASET"|"DEALS"|"DEFAULT"|"EMAIL"|"EMAIL_INTEGRATION"|"ENGAGEMENTS"|"EXTENSION"|"FILE_MANAGER"|"FLYWHEEL_PRODUCT_DATA_SYNC"|"FORECASTING"|"FORM"|"FORWARD_TO_CRM"|"GMAIL_INTEGRATION"|"GOALS"|"HEISENBERG"|"HELP_DESK"|"HELP_DESK_AI"|"IMPORT"|"INTEGRATION"|"INTEGRATIONS_PLATFORM"|"INTEGRATIONS_SYNC"|"INTENT"|"INTERNAL_PROCESSING"|"LEADIN"|"MARKET_SOURCING"|"MARKETPLACE"|"MEETINGS"|"MERGE_COMPANIES"|"MERGE_CONTACTS"|"MERGE_OBJECTS"|"MICROAPPS"|"MIGRATION"|"MOBILE_ANDROID"|"MOBILE_IOS"|"PAYMENTS"|"PIPELINE_SETTINGS"|"PLAYBOOKS"|"PORTAL_OBJECT_SYNC"|"PORTAL_USER_ASSOCIATOR"|"PRESENTATIONS"|"PROPERTY_RESTORE"|"PROPERTY_SETTINGS"|"PROSPECTING_AGENT"|"QUOTAS"|"QUOTES"|"RECYCLING_BIN"|"SALES"|"SALES_MESSAGES"|"SALESFORCE"|"SEQUENCES"|"SETTINGS"|"SIDEKICK"|"SIGNALS"|"SLACK_INTEGRATION"|"SOCIAL"|"SUCCESS"|"TALLY"|"TASK"|"UNKNOWN"|"WAL_INCREMENTAL"|"WORKFLOW_CONTACT_DELETE_ACTION"|"WORKFLOWS",
     *     sourceId: string,
     *     sourceLabel: string,
     *     sourceMetadata: string,
     *     sourceUpstreamDeployable: string,
     *     sourceVid: list<int>,
     *     timestamp: int,
     *     unit: string,
     *     updatedByUserId: int,
     *     useTimestampAsPersistenceTimestamp: bool,
     *     value: string,
     *   }|PropertyValue>,
     *   endDateTime?: string|\DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventCompleted?: bool,
     *   eventDescription?: string,
     *   eventName?: string,
     *   eventOrganizer?: string,
     *   eventType?: string,
     *   eventUrl?: string,
     *   startDateTime?: string|\DateTimeInterface,
     * }|EventUpdateByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function updateByExternalEventID(
        string $externalEventID,
        array|EventUpdateByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse {
        [$parsed, $options] = EventUpdateByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   inputs: list<array{
     *     customProperties: list<array<mixed>|PropertyValue>,
     *     eventName: string,
     *     eventOrganizer: string,
     *     externalAccountId: string,
     *     externalEventId: string,
     *     endDateTime?: string|\DateTimeInterface,
     *     eventCancelled?: bool,
     *     eventCompleted?: bool,
     *     eventDescription?: string,
     *     eventType?: string,
     *     eventUrl?: string,
     *     startDateTime?: string|\DateTimeInterface,
     *   }>,
     * }|EventUpsertBatchParams $params
     *
     * @throws APIException
     */
    public function upsertBatch(
        array|EventUpsertBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponse {
        [$parsed, $options] = EventUpsertBatchParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   customProperties: list<array{
     *     dataSensitivity: "high"|"none"|"standard",
     *     isEncrypted: bool,
     *     isLargeValue: bool,
     *     name: string,
     *     persistenceTimestamp: int,
     *     requestId: string,
     *     selectedByUser: bool,
     *     selectedByUserTimestamp: int,
     *     source: "ACADEMY"|"ACCEPTANCE_TEST"|"ADS"|"AI_GROUP"|"ANALYTICS"|"API"|"APPROVALS"|"ASSISTS"|"ASSOCIATIONS"|"AUTOMATION_JOURNEY"|"AUTOMATION_PLATFORM"|"AVATARS_SERVICE"|"BATCH_UPDATE"|"BCC_TO_CRM"|"BEHAVIORAL_EVENTS"|"BET_ASSIGNMENT"|"BET_CRM_CONNECTOR"|"BIDEN"|"BILLING"|"BOT"|"CALCULATED"|"CENTRAL_EXCHANGE_RATES"|"CHATSPOT"|"CLONE_OBJECTS"|"COMMUNICATOR"|"COMPANIES"|"COMPANY_FAMILIES"|"COMPANY_INSIGHTS"|"CONTACTS"|"CONTACTS_WEB"|"CONTENT_MEMBERSHIP"|"CONVERSATIONAL_ENRICHMENT"|"CONVERSATIONS"|"CRM_PROCESSES_PLATFORM"|"CRM_UI"|"CRM_UI_BULK_ACTION"|"DATA_ENRICHMENT"|"DATASET"|"DEALS"|"DEFAULT"|"EMAIL"|"EMAIL_INTEGRATION"|"ENGAGEMENTS"|"EXTENSION"|"FILE_MANAGER"|"FLYWHEEL_PRODUCT_DATA_SYNC"|"FORECASTING"|"FORM"|"FORWARD_TO_CRM"|"GMAIL_INTEGRATION"|"GOALS"|"HEISENBERG"|"HELP_DESK"|"HELP_DESK_AI"|"IMPORT"|"INTEGRATION"|"INTEGRATIONS_PLATFORM"|"INTEGRATIONS_SYNC"|"INTENT"|"INTERNAL_PROCESSING"|"LEADIN"|"MARKET_SOURCING"|"MARKETPLACE"|"MEETINGS"|"MERGE_COMPANIES"|"MERGE_CONTACTS"|"MERGE_OBJECTS"|"MICROAPPS"|"MIGRATION"|"MOBILE_ANDROID"|"MOBILE_IOS"|"PAYMENTS"|"PIPELINE_SETTINGS"|"PLAYBOOKS"|"PORTAL_OBJECT_SYNC"|"PORTAL_USER_ASSOCIATOR"|"PRESENTATIONS"|"PROPERTY_RESTORE"|"PROPERTY_SETTINGS"|"PROSPECTING_AGENT"|"QUOTAS"|"QUOTES"|"RECYCLING_BIN"|"SALES"|"SALES_MESSAGES"|"SALESFORCE"|"SEQUENCES"|"SETTINGS"|"SIDEKICK"|"SIGNALS"|"SLACK_INTEGRATION"|"SOCIAL"|"SUCCESS"|"TALLY"|"TASK"|"UNKNOWN"|"WAL_INCREMENTAL"|"WORKFLOW_CONTACT_DELETE_ACTION"|"WORKFLOWS",
     *     sourceId: string,
     *     sourceLabel: string,
     *     sourceMetadata: string,
     *     sourceUpstreamDeployable: string,
     *     sourceVid: list<int>,
     *     timestamp: int,
     *     unit: string,
     *     updatedByUserId: int,
     *     useTimestampAsPersistenceTimestamp: bool,
     *     value: string,
     *   }|PropertyValue>,
     *   eventName: string,
     *   eventOrganizer: string,
     *   externalAccountId: string,
     *   externalEventId: string,
     *   endDateTime?: string|\DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventCompleted?: bool,
     *   eventDescription?: string,
     *   eventType?: string,
     *   eventUrl?: string,
     *   startDateTime?: string|\DateTimeInterface,
     * }|EventUpsertByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function upsertByExternalEventID(
        string $externalEventID,
        array|EventUpsertByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse {
        [$parsed, $options] = EventUpsertByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   externalEventId: string,
     *   externalAccountId: string,
     *   inputs: list<array{
     *     contactProperties: array<string,string>,
     *     email: string,
     *     interactionDateTime: int,
     *     properties: array<string,string>,
     *   }>,
     * }|EventUpsertSubscriberStateByEmailParams $params
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByEmail(
        string $subscriberState,
        array|EventUpsertSubscriberStateByEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = EventUpsertSubscriberStateByEmailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventId'];
        unset($parsed['externalEventId']);
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
                ['externalEventId']
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
     * @param array{
     *   externalEventId: string,
     *   externalAccountId: string,
     *   inputs: list<array{
     *     interactionDateTime: int, properties: array<string,string>, vid: int
     *   }>,
     * }|EventUpsertSubscriberStateByIDParams $params
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByID(
        string $subscriberState,
        array|EventUpsertSubscriberStateByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = EventUpsertSubscriberStateByIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventId'];
        unset($parsed['externalEventId']);
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
                ['externalEventId']
            ),
            options: $options,
            convert: 'string',
        );
    }
}
