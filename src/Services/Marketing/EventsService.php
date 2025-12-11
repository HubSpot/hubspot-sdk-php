<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponseV2;
use HubspotSDK\Marketing\Events\PropertyValue;
use HubspotSDK\Marketing\Events\PropertyValue\DataSensitivity;
use HubspotSDK\Marketing\Events\PropertyValue\Source;
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
    public EventsRawService $raw;

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
        $this->raw = new EventsRawService($client);
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
     * @param list<array{
     *   dataSensitivity: 'high'|'none'|'standard'|DataSensitivity,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: 'ACADEMY'|'ACCEPTANCE_TEST'|'ADS'|'AI_GROUP'|'ANALYTICS'|'API'|'APPROVALS'|'ASSISTS'|'ASSOCIATIONS'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM'|'AVATARS_SERVICE'|'BATCH_UPDATE'|'BCC_TO_CRM'|'BEHAVIORAL_EVENTS'|'BET_ASSIGNMENT'|'BET_CRM_CONNECTOR'|'BIDEN'|'BILLING'|'BOT'|'CALCULATED'|'CENTRAL_EXCHANGE_RATES'|'CHATSPOT'|'CLONE_OBJECTS'|'COMMUNICATOR'|'COMPANIES'|'COMPANY_FAMILIES'|'COMPANY_INSIGHTS'|'CONTACTS'|'CONTACTS_WEB'|'CONTENT_MEMBERSHIP'|'CONVERSATIONAL_ENRICHMENT'|'CONVERSATIONS'|'CRM_PROCESSES_PLATFORM'|'CRM_UI'|'CRM_UI_BULK_ACTION'|'DATA_ENRICHMENT'|'DATASET'|'DEALS'|'DEFAULT'|'EMAIL'|'EMAIL_INTEGRATION'|'ENGAGEMENTS'|'EXTENSION'|'FILE_MANAGER'|'FLYWHEEL_PRODUCT_DATA_SYNC'|'FORECASTING'|'FORM'|'FORWARD_TO_CRM'|'GMAIL_INTEGRATION'|'GOALS'|'HEISENBERG'|'HELP_DESK'|'HELP_DESK_AI'|'IMPORT'|'INTEGRATION'|'INTEGRATIONS_PLATFORM'|'INTEGRATIONS_SYNC'|'INTENT'|'INTERNAL_PROCESSING'|'LEADIN'|'MARKET_SOURCING'|'MARKETPLACE'|'MEETINGS'|'MERGE_COMPANIES'|'MERGE_CONTACTS'|'MERGE_OBJECTS'|'MICROAPPS'|'MIGRATION'|'MOBILE_ANDROID'|'MOBILE_IOS'|'PAYMENTS'|'PIPELINE_SETTINGS'|'PLAYBOOKS'|'PORTAL_OBJECT_SYNC'|'PORTAL_USER_ASSOCIATOR'|'PRESENTATIONS'|'PROPERTY_RESTORE'|'PROPERTY_SETTINGS'|'PROSPECTING_AGENT'|'QUOTAS'|'QUOTES'|'RECYCLING_BIN'|'SALES'|'SALES_MESSAGES'|'SALESFORCE'|'SEQUENCES'|'SETTINGS'|'SIDEKICK'|'SIGNALS'|'SLACK_INTEGRATION'|'SOCIAL'|'SUCCESS'|'TALLY'|'TASK'|'UNKNOWN'|'WAL_INCREMENTAL'|'WORKFLOW_CONTACT_DELETE_ACTION'|'WORKFLOWS'|Source,
     *   sourceID: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserID: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }|PropertyValue> $customProperties A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param string $eventName the name of the marketing event
     * @param string $eventOrganizer the name of the organizer of the marketing event
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param string|\DateTimeInterface $endDateTime the end date and time of the marketing event
     * @param bool $eventCancelled Indicates if the marketing event has been cancelled.  Defaults to `false`
     * @param string $eventDescription the description of the marketing event
     * @param string $eventType Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL a URL in the external event application where the marketing event can be managed
     * @param string|\DateTimeInterface $startDateTime the start date and time of the marketing event
     *
     * @throws APIException
     */
    public function create(
        array $customProperties,
        string $eventName,
        string $eventOrganizer,
        string $externalAccountID,
        string $externalEventID,
        string|\DateTimeInterface|null $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        string|\DateTimeInterface|null $startDateTime = null,
        ?RequestOptions $requestOptions = null,
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
     * @param string $objectID The internal ID of the marketing event in HubSpot
     * @param list<array{
     *   dataSensitivity: 'high'|'none'|'standard'|DataSensitivity,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: 'ACADEMY'|'ACCEPTANCE_TEST'|'ADS'|'AI_GROUP'|'ANALYTICS'|'API'|'APPROVALS'|'ASSISTS'|'ASSOCIATIONS'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM'|'AVATARS_SERVICE'|'BATCH_UPDATE'|'BCC_TO_CRM'|'BEHAVIORAL_EVENTS'|'BET_ASSIGNMENT'|'BET_CRM_CONNECTOR'|'BIDEN'|'BILLING'|'BOT'|'CALCULATED'|'CENTRAL_EXCHANGE_RATES'|'CHATSPOT'|'CLONE_OBJECTS'|'COMMUNICATOR'|'COMPANIES'|'COMPANY_FAMILIES'|'COMPANY_INSIGHTS'|'CONTACTS'|'CONTACTS_WEB'|'CONTENT_MEMBERSHIP'|'CONVERSATIONAL_ENRICHMENT'|'CONVERSATIONS'|'CRM_PROCESSES_PLATFORM'|'CRM_UI'|'CRM_UI_BULK_ACTION'|'DATA_ENRICHMENT'|'DATASET'|'DEALS'|'DEFAULT'|'EMAIL'|'EMAIL_INTEGRATION'|'ENGAGEMENTS'|'EXTENSION'|'FILE_MANAGER'|'FLYWHEEL_PRODUCT_DATA_SYNC'|'FORECASTING'|'FORM'|'FORWARD_TO_CRM'|'GMAIL_INTEGRATION'|'GOALS'|'HEISENBERG'|'HELP_DESK'|'HELP_DESK_AI'|'IMPORT'|'INTEGRATION'|'INTEGRATIONS_PLATFORM'|'INTEGRATIONS_SYNC'|'INTENT'|'INTERNAL_PROCESSING'|'LEADIN'|'MARKET_SOURCING'|'MARKETPLACE'|'MEETINGS'|'MERGE_COMPANIES'|'MERGE_CONTACTS'|'MERGE_OBJECTS'|'MICROAPPS'|'MIGRATION'|'MOBILE_ANDROID'|'MOBILE_IOS'|'PAYMENTS'|'PIPELINE_SETTINGS'|'PLAYBOOKS'|'PORTAL_OBJECT_SYNC'|'PORTAL_USER_ASSOCIATOR'|'PRESENTATIONS'|'PROPERTY_RESTORE'|'PROPERTY_SETTINGS'|'PROSPECTING_AGENT'|'QUOTAS'|'QUOTES'|'RECYCLING_BIN'|'SALES'|'SALES_MESSAGES'|'SALESFORCE'|'SEQUENCES'|'SETTINGS'|'SIDEKICK'|'SIGNALS'|'SLACK_INTEGRATION'|'SOCIAL'|'SUCCESS'|'TALLY'|'TASK'|'UNKNOWN'|'WAL_INCREMENTAL'|'WORKFLOW_CONTACT_DELETE_ACTION'|'WORKFLOWS'|Source,
     *   sourceID: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserID: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }|PropertyValue> $customProperties
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array $customProperties,
        string|\DateTimeInterface|null $endDateTime = null,
        ?bool $eventCancelled = null,
        ?string $eventDescription = null,
        ?string $eventName = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        string|\DateTimeInterface|null $startDateTime = null,
        ?RequestOptions $requestOptions = null,
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
        ?string $after = null,
        int $limit = 10,
        ?RequestOptions $requestOptions = null,
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
     * @param string $objectID The internal ID of the marketing event in HubSpot
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a marketing event as cancelled.
     *
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        $params = Util::removeNulls(['externalAccountID' => $externalAccountID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancelByExternalEventID($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a marketing event as completed
     *
     * @param string $externalEventID path param: The id of the marketing event in the external event application
     * @param string $externalAccountID query param: The accountId that is associated with this marketing event in the external event application
     * @param string|\DateTimeInterface $endDateTime Body param:
     * @param string|\DateTimeInterface $startDateTime Body param:
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        string|\DateTimeInterface $endDateTime,
        string|\DateTimeInterface $startDateTime,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse {
        $params = Util::removeNulls(
            [
                'externalAccountID' => $externalAccountID,
                'endDateTime' => $endDateTime,
                'startDateTime' => $startDateTime,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->completeByExternalEventID($externalEventID, params: $params, requestOptions: $requestOptions);

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
     * @param list<array{objectID: string}> $inputs
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
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
     * @param list<array{
     *   appID: int, externalAccountID: string, externalEventID: string
     * }> $inputs
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array $inputs,
        ?RequestOptions $requestOptions = null
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
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        ?RequestOptions $requestOptions = null,
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
     * @param string $objectID The internal ID of the marketing event in HubSpot
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?RequestOptions $requestOptions = null
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
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        ?RequestOptions $requestOptions = null,
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
     * @param string $q The id of the marketing event in the external event application (externalEventId)
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        string $q,
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->searchIdentifiersByExternalEventID($externalEventID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates multiple Marketing Events on the portal based on their objectId, if they exist.
     *
     * @param list<array{
     *   customProperties: list<array{
     *     dataSensitivity: 'high'|'none'|'standard'|DataSensitivity,
     *     isEncrypted: bool,
     *     isLargeValue: bool,
     *     name: string,
     *     persistenceTimestamp: int,
     *     requestID: string,
     *     selectedByUser: bool,
     *     selectedByUserTimestamp: int,
     *     source: 'ACADEMY'|'ACCEPTANCE_TEST'|'ADS'|'AI_GROUP'|'ANALYTICS'|'API'|'APPROVALS'|'ASSISTS'|'ASSOCIATIONS'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM'|'AVATARS_SERVICE'|'BATCH_UPDATE'|'BCC_TO_CRM'|'BEHAVIORAL_EVENTS'|'BET_ASSIGNMENT'|'BET_CRM_CONNECTOR'|'BIDEN'|'BILLING'|'BOT'|'CALCULATED'|'CENTRAL_EXCHANGE_RATES'|'CHATSPOT'|'CLONE_OBJECTS'|'COMMUNICATOR'|'COMPANIES'|'COMPANY_FAMILIES'|'COMPANY_INSIGHTS'|'CONTACTS'|'CONTACTS_WEB'|'CONTENT_MEMBERSHIP'|'CONVERSATIONAL_ENRICHMENT'|'CONVERSATIONS'|'CRM_PROCESSES_PLATFORM'|'CRM_UI'|'CRM_UI_BULK_ACTION'|'DATA_ENRICHMENT'|'DATASET'|'DEALS'|'DEFAULT'|'EMAIL'|'EMAIL_INTEGRATION'|'ENGAGEMENTS'|'EXTENSION'|'FILE_MANAGER'|'FLYWHEEL_PRODUCT_DATA_SYNC'|'FORECASTING'|'FORM'|'FORWARD_TO_CRM'|'GMAIL_INTEGRATION'|'GOALS'|'HEISENBERG'|'HELP_DESK'|'HELP_DESK_AI'|'IMPORT'|'INTEGRATION'|'INTEGRATIONS_PLATFORM'|'INTEGRATIONS_SYNC'|'INTENT'|'INTERNAL_PROCESSING'|'LEADIN'|'MARKET_SOURCING'|'MARKETPLACE'|'MEETINGS'|'MERGE_COMPANIES'|'MERGE_CONTACTS'|'MERGE_OBJECTS'|'MICROAPPS'|'MIGRATION'|'MOBILE_ANDROID'|'MOBILE_IOS'|'PAYMENTS'|'PIPELINE_SETTINGS'|'PLAYBOOKS'|'PORTAL_OBJECT_SYNC'|'PORTAL_USER_ASSOCIATOR'|'PRESENTATIONS'|'PROPERTY_RESTORE'|'PROPERTY_SETTINGS'|'PROSPECTING_AGENT'|'QUOTAS'|'QUOTES'|'RECYCLING_BIN'|'SALES'|'SALES_MESSAGES'|'SALESFORCE'|'SEQUENCES'|'SETTINGS'|'SIDEKICK'|'SIGNALS'|'SLACK_INTEGRATION'|'SOCIAL'|'SUCCESS'|'TALLY'|'TASK'|'UNKNOWN'|'WAL_INCREMENTAL'|'WORKFLOW_CONTACT_DELETE_ACTION'|'WORKFLOWS'|Source,
     *     sourceID: string,
     *     sourceLabel: string,
     *     sourceMetadata: string,
     *     sourceUpstreamDeployable: string,
     *     sourceVid: list<int>,
     *     timestamp: int,
     *     unit: string,
     *     updatedByUserID: int,
     *     useTimestampAsPersistenceTimestamp: bool,
     *     value: string,
     *   }|PropertyValue>,
     *   objectID: string,
     *   endDateTime?: string|\DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventDescription?: string,
     *   eventName?: string,
     *   eventOrganizer?: string,
     *   eventType?: string,
     *   eventURL?: string,
     *   startDateTime?: string|\DateTimeInterface,
     * }> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        array $inputs,
        ?RequestOptions $requestOptions = null
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
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param string $externalAccountID Query param: The accountId that is associated with this marketing event in the external event application
     * @param list<array{
     *   dataSensitivity: 'high'|'none'|'standard'|DataSensitivity,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: 'ACADEMY'|'ACCEPTANCE_TEST'|'ADS'|'AI_GROUP'|'ANALYTICS'|'API'|'APPROVALS'|'ASSISTS'|'ASSOCIATIONS'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM'|'AVATARS_SERVICE'|'BATCH_UPDATE'|'BCC_TO_CRM'|'BEHAVIORAL_EVENTS'|'BET_ASSIGNMENT'|'BET_CRM_CONNECTOR'|'BIDEN'|'BILLING'|'BOT'|'CALCULATED'|'CENTRAL_EXCHANGE_RATES'|'CHATSPOT'|'CLONE_OBJECTS'|'COMMUNICATOR'|'COMPANIES'|'COMPANY_FAMILIES'|'COMPANY_INSIGHTS'|'CONTACTS'|'CONTACTS_WEB'|'CONTENT_MEMBERSHIP'|'CONVERSATIONAL_ENRICHMENT'|'CONVERSATIONS'|'CRM_PROCESSES_PLATFORM'|'CRM_UI'|'CRM_UI_BULK_ACTION'|'DATA_ENRICHMENT'|'DATASET'|'DEALS'|'DEFAULT'|'EMAIL'|'EMAIL_INTEGRATION'|'ENGAGEMENTS'|'EXTENSION'|'FILE_MANAGER'|'FLYWHEEL_PRODUCT_DATA_SYNC'|'FORECASTING'|'FORM'|'FORWARD_TO_CRM'|'GMAIL_INTEGRATION'|'GOALS'|'HEISENBERG'|'HELP_DESK'|'HELP_DESK_AI'|'IMPORT'|'INTEGRATION'|'INTEGRATIONS_PLATFORM'|'INTEGRATIONS_SYNC'|'INTENT'|'INTERNAL_PROCESSING'|'LEADIN'|'MARKET_SOURCING'|'MARKETPLACE'|'MEETINGS'|'MERGE_COMPANIES'|'MERGE_CONTACTS'|'MERGE_OBJECTS'|'MICROAPPS'|'MIGRATION'|'MOBILE_ANDROID'|'MOBILE_IOS'|'PAYMENTS'|'PIPELINE_SETTINGS'|'PLAYBOOKS'|'PORTAL_OBJECT_SYNC'|'PORTAL_USER_ASSOCIATOR'|'PRESENTATIONS'|'PROPERTY_RESTORE'|'PROPERTY_SETTINGS'|'PROSPECTING_AGENT'|'QUOTAS'|'QUOTES'|'RECYCLING_BIN'|'SALES'|'SALES_MESSAGES'|'SALESFORCE'|'SEQUENCES'|'SETTINGS'|'SIDEKICK'|'SIGNALS'|'SLACK_INTEGRATION'|'SOCIAL'|'SUCCESS'|'TALLY'|'TASK'|'UNKNOWN'|'WAL_INCREMENTAL'|'WORKFLOW_CONTACT_DELETE_ACTION'|'WORKFLOWS'|Source,
     *   sourceID: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserID: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }|PropertyValue> $customProperties Body param: A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param string|\DateTimeInterface $endDateTime body param: The end date and time of the marketing event
     * @param bool $eventCancelled Body param: Indicates if the marketing event has been cancelled. Defaults to `false`
     * @param bool $eventCompleted Body param:
     * @param string $eventDescription body param: The description of the marketing event
     * @param string $eventName body param: The name of the marketing event
     * @param string $eventOrganizer body param: The name of the organizer of the marketing event
     * @param string $eventType Body param: Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL body param: A URL in the external event application where the marketing event can be managed
     * @param string|\DateTimeInterface $startDateTime body param: The start date and time of the marketing event
     *
     * @throws APIException
     */
    public function updateByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        array $customProperties,
        string|\DateTimeInterface|null $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventName = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        string|\DateTimeInterface|null $startDateTime = null,
        ?RequestOptions $requestOptions = null,
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
     * @param list<array{
     *   customProperties: list<array{
     *     dataSensitivity: 'high'|'none'|'standard'|DataSensitivity,
     *     isEncrypted: bool,
     *     isLargeValue: bool,
     *     name: string,
     *     persistenceTimestamp: int,
     *     requestID: string,
     *     selectedByUser: bool,
     *     selectedByUserTimestamp: int,
     *     source: 'ACADEMY'|'ACCEPTANCE_TEST'|'ADS'|'AI_GROUP'|'ANALYTICS'|'API'|'APPROVALS'|'ASSISTS'|'ASSOCIATIONS'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM'|'AVATARS_SERVICE'|'BATCH_UPDATE'|'BCC_TO_CRM'|'BEHAVIORAL_EVENTS'|'BET_ASSIGNMENT'|'BET_CRM_CONNECTOR'|'BIDEN'|'BILLING'|'BOT'|'CALCULATED'|'CENTRAL_EXCHANGE_RATES'|'CHATSPOT'|'CLONE_OBJECTS'|'COMMUNICATOR'|'COMPANIES'|'COMPANY_FAMILIES'|'COMPANY_INSIGHTS'|'CONTACTS'|'CONTACTS_WEB'|'CONTENT_MEMBERSHIP'|'CONVERSATIONAL_ENRICHMENT'|'CONVERSATIONS'|'CRM_PROCESSES_PLATFORM'|'CRM_UI'|'CRM_UI_BULK_ACTION'|'DATA_ENRICHMENT'|'DATASET'|'DEALS'|'DEFAULT'|'EMAIL'|'EMAIL_INTEGRATION'|'ENGAGEMENTS'|'EXTENSION'|'FILE_MANAGER'|'FLYWHEEL_PRODUCT_DATA_SYNC'|'FORECASTING'|'FORM'|'FORWARD_TO_CRM'|'GMAIL_INTEGRATION'|'GOALS'|'HEISENBERG'|'HELP_DESK'|'HELP_DESK_AI'|'IMPORT'|'INTEGRATION'|'INTEGRATIONS_PLATFORM'|'INTEGRATIONS_SYNC'|'INTENT'|'INTERNAL_PROCESSING'|'LEADIN'|'MARKET_SOURCING'|'MARKETPLACE'|'MEETINGS'|'MERGE_COMPANIES'|'MERGE_CONTACTS'|'MERGE_OBJECTS'|'MICROAPPS'|'MIGRATION'|'MOBILE_ANDROID'|'MOBILE_IOS'|'PAYMENTS'|'PIPELINE_SETTINGS'|'PLAYBOOKS'|'PORTAL_OBJECT_SYNC'|'PORTAL_USER_ASSOCIATOR'|'PRESENTATIONS'|'PROPERTY_RESTORE'|'PROPERTY_SETTINGS'|'PROSPECTING_AGENT'|'QUOTAS'|'QUOTES'|'RECYCLING_BIN'|'SALES'|'SALES_MESSAGES'|'SALESFORCE'|'SEQUENCES'|'SETTINGS'|'SIDEKICK'|'SIGNALS'|'SLACK_INTEGRATION'|'SOCIAL'|'SUCCESS'|'TALLY'|'TASK'|'UNKNOWN'|'WAL_INCREMENTAL'|'WORKFLOW_CONTACT_DELETE_ACTION'|'WORKFLOWS'|Source,
     *     sourceID: string,
     *     sourceLabel: string,
     *     sourceMetadata: string,
     *     sourceUpstreamDeployable: string,
     *     sourceVid: list<int>,
     *     timestamp: int,
     *     unit: string,
     *     updatedByUserID: int,
     *     useTimestampAsPersistenceTimestamp: bool,
     *     value: string,
     *   }|PropertyValue>,
     *   eventName: string,
     *   eventOrganizer: string,
     *   externalAccountID: string,
     *   externalEventID: string,
     *   endDateTime?: string|\DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventCompleted?: bool,
     *   eventDescription?: string,
     *   eventType?: string,
     *   eventURL?: string,
     *   startDateTime?: string|\DateTimeInterface,
     * }> $inputs
     *
     * @throws APIException
     */
    public function upsertBatch(
        array $inputs,
        ?RequestOptions $requestOptions = null
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
     * @param string $externalEventID_ The id of the marketing event in the external event application
     * @param list<array{
     *   dataSensitivity: 'high'|'none'|'standard'|DataSensitivity,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: 'ACADEMY'|'ACCEPTANCE_TEST'|'ADS'|'AI_GROUP'|'ANALYTICS'|'API'|'APPROVALS'|'ASSISTS'|'ASSOCIATIONS'|'AUTOMATION_JOURNEY'|'AUTOMATION_PLATFORM'|'AVATARS_SERVICE'|'BATCH_UPDATE'|'BCC_TO_CRM'|'BEHAVIORAL_EVENTS'|'BET_ASSIGNMENT'|'BET_CRM_CONNECTOR'|'BIDEN'|'BILLING'|'BOT'|'CALCULATED'|'CENTRAL_EXCHANGE_RATES'|'CHATSPOT'|'CLONE_OBJECTS'|'COMMUNICATOR'|'COMPANIES'|'COMPANY_FAMILIES'|'COMPANY_INSIGHTS'|'CONTACTS'|'CONTACTS_WEB'|'CONTENT_MEMBERSHIP'|'CONVERSATIONAL_ENRICHMENT'|'CONVERSATIONS'|'CRM_PROCESSES_PLATFORM'|'CRM_UI'|'CRM_UI_BULK_ACTION'|'DATA_ENRICHMENT'|'DATASET'|'DEALS'|'DEFAULT'|'EMAIL'|'EMAIL_INTEGRATION'|'ENGAGEMENTS'|'EXTENSION'|'FILE_MANAGER'|'FLYWHEEL_PRODUCT_DATA_SYNC'|'FORECASTING'|'FORM'|'FORWARD_TO_CRM'|'GMAIL_INTEGRATION'|'GOALS'|'HEISENBERG'|'HELP_DESK'|'HELP_DESK_AI'|'IMPORT'|'INTEGRATION'|'INTEGRATIONS_PLATFORM'|'INTEGRATIONS_SYNC'|'INTENT'|'INTERNAL_PROCESSING'|'LEADIN'|'MARKET_SOURCING'|'MARKETPLACE'|'MEETINGS'|'MERGE_COMPANIES'|'MERGE_CONTACTS'|'MERGE_OBJECTS'|'MICROAPPS'|'MIGRATION'|'MOBILE_ANDROID'|'MOBILE_IOS'|'PAYMENTS'|'PIPELINE_SETTINGS'|'PLAYBOOKS'|'PORTAL_OBJECT_SYNC'|'PORTAL_USER_ASSOCIATOR'|'PRESENTATIONS'|'PROPERTY_RESTORE'|'PROPERTY_SETTINGS'|'PROSPECTING_AGENT'|'QUOTAS'|'QUOTES'|'RECYCLING_BIN'|'SALES'|'SALES_MESSAGES'|'SALESFORCE'|'SEQUENCES'|'SETTINGS'|'SIDEKICK'|'SIGNALS'|'SLACK_INTEGRATION'|'SOCIAL'|'SUCCESS'|'TALLY'|'TASK'|'UNKNOWN'|'WAL_INCREMENTAL'|'WORKFLOW_CONTACT_DELETE_ACTION'|'WORKFLOWS'|Source,
     *   sourceID: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserID: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }|PropertyValue> $customProperties A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     * @param string $eventName the name of the marketing event
     * @param string $eventOrganizer the name of the organizer of the marketing event
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param string|\DateTimeInterface $endDateTime the end date and time of the marketing event
     * @param bool $eventCancelled Indicates if the marketing event has been cancelled.  Defaults to `false`
     * @param string $eventDescription the description of the marketing event
     * @param string $eventType Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`
     * @param string $eventURL a URL in the external event application where the marketing event can be managed
     * @param string|\DateTimeInterface $startDateTime the start date and time of the marketing event
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
        string|\DateTimeInterface|null $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        string|\DateTimeInterface|null $startDateTime = null,
        ?RequestOptions $requestOptions = null,
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

    /**
     * @api
     *
     * Record a subscriber state between multiple HubSpot contacts and a marketing event, using contact email addresses. Note that the contact must already exist in HubSpot; a contact will not be created. The contactProperties field is used only when creating a new contact. These properties will not update existing contacts.
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param string $externalAccountID Query param: The accountId that is associated with this marketing event in the external event application
     * @param list<array{
     *   contactProperties: array<string,string>,
     *   email: string,
     *   interactionDateTime: int,
     *   properties: array<string,string>,
     * }> $inputs Body param: List of marketing event details to create or update
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByEmail(
        string $subscriberState,
        string $externalEventID,
        string $externalAccountID,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'externalEventID' => $externalEventID,
                'externalAccountID' => $externalAccountID,
                'inputs' => $inputs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsertSubscriberStateByEmail($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Record a subscriber state between multiple HubSpot contacts and a marketing event, using HubSpot contact IDs. Note that the contact must already exist in HubSpot; a contact will not be created.
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param string $externalAccountID Query param: The accountId that is associated with this marketing event in the external event application
     * @param list<array{
     *   interactionDateTime: int, properties: array<string,string>, vid: int
     * }> $inputs Body param: List of HubSpot contacts to subscribe to the marketing event
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByID(
        string $subscriberState,
        string $externalEventID,
        string $externalAccountID,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'externalEventID' => $externalEventID,
                'externalAccountID' => $externalAccountID,
                'inputs' => $inputs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsertSubscriberStateByID($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
