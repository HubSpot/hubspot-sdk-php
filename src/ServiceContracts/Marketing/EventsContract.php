<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
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

interface EventsContract
{
    /**
     * @api
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
    ): MarketingEventDefaultResponse;

    /**
     * @api
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
    ): MarketingEventPublicDefaultResponseV2;

    /**
     * @api
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
    ): Page;

    /**
     * @api
     *
     * @param string $objectID The internal ID of the marketing event in HubSpot
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): MarketingEventDefaultResponse;

    /**
     * @api
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
    ): MarketingEventDefaultResponse;

    /**
     * @api
     *
     * @param list<array{objectID: string}> $inputs
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): string;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param string $objectID The internal ID of the marketing event in HubSpot
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): MarketingEventPublicReadResponseV2;

    /**
     * @api
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
    ): MarketingEventPublicReadResponse;

    /**
     * @api
     *
     * @param string $q The id of the marketing event in the external event application (externalEventId)
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        string $q,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseSearchPublicResponseWrapperNoPaging;

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     *
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging;

    /**
     * @api
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
    ): BatchResponseMarketingEventPublicDefaultResponseV2;

    /**
     * @api
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
    ): MarketingEventPublicDefaultResponse;

    /**
     * @api
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
    ): BatchResponseMarketingEventPublicDefaultResponse;

    /**
     * @api
     *
     * @param string $externalEventID The id of the marketing event in the external event application
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
     * @param string $externalEventID1 the id of the marketing event in the external event application
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
        string $externalEventID,
        array $customProperties,
        string $eventName,
        string $eventOrganizer,
        string $externalAccountID,
        string $externalEventID1,
        string|\DateTimeInterface|null $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        string|\DateTimeInterface|null $startDateTime = null,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse;

    /**
     * @api
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
    ): string;

    /**
     * @api
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
    ): string;
}
