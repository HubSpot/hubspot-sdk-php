<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging;
use HubspotSDK\Marketing\Events\MarketingEventCreateRequestParams;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\Events\MarketingEventExternalUniqueIdentifier;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicObjectIDDeleteRequest;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicUpdateRequestFullV2;
use HubspotSDK\Marketing\Events\MarketingEventSubscriber;
use HubspotSDK\Marketing\Events\PropertyValue;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface EventsContract
{
    /**
     * @api
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
    ): MarketingEventDefaultResponse;

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
    ): MarketingEventDefaultResponse;

    /**
     * @api
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
    ): MarketingEventPublicDefaultResponseV2;

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
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): Page;

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
    ): Page;

    /**
     * @api
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
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse;

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
    ): MarketingEventDefaultResponse;

    /**
     * @api
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
    ): MarketingEventDefaultResponse;

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
    ): MarketingEventDefaultResponse;

    /**
     * @api
     *
     * @param list<MarketingEventPublicObjectIDDeleteRequest> $inputs
     *
     * @throws APIException
     */
    public function deleteBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param list<MarketingEventExternalUniqueIdentifier> $inputs
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): string;

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
    ): string;

    /**
     * @api
     *
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
    ): mixed;

    /**
     * @api
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
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicReadResponse;

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
    ): MarketingEventPublicReadResponse;

    /**
     * @api
     *
     * @param string $q The id of the marketing event in the external event application (externalEventId)
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        $q,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseSearchPublicResponseWrapperNoPaging;

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
    ): CollectionResponseSearchPublicResponseWrapperNoPaging;

    /**
     * @api
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
     * @param list<MarketingEventPublicUpdateRequestFullV2> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponseV2;

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
    ): BatchResponseMarketingEventPublicDefaultResponseV2;

    /**
     * @api
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
    ): MarketingEventPublicDefaultResponse;

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
    ): MarketingEventPublicDefaultResponse;

    /**
     * @api
     *
     * @param list<MarketingEventCreateRequestParams> $inputs
     *
     * @throws APIException
     */
    public function upsertBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponse;

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
    ): BatchResponseMarketingEventPublicDefaultResponse;

    /**
     * @api
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
    ): MarketingEventPublicDefaultResponse;

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
    ): MarketingEventPublicDefaultResponse;

    /**
     * @api
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
    ): string;

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
    ): string;

    /**
     * @api
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
    ): string;

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
    ): string;
}
