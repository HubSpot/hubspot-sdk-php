<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
use HubspotSDK\Marketing\Events\MarketingEventCreateRequestParams;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventExternalUniqueIdentifier;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicObjectIDDeleteRequest;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicUpdateRequestFullV2;
use HubspotSDK\Page;
use HubspotSDK\PropertyValue;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type MarketingEventPublicObjectIDDeleteRequestShape from \HubspotSDK\Marketing\Events\MarketingEventPublicObjectIDDeleteRequest
 * @phpstan-import-type MarketingEventExternalUniqueIdentifierShape from \HubspotSDK\Marketing\Events\MarketingEventExternalUniqueIdentifier
 * @phpstan-import-type MarketingEventPublicUpdateRequestFullV2Shape from \HubspotSDK\Marketing\Events\MarketingEventPublicUpdateRequestFullV2
 * @phpstan-import-type MarketingEventCreateRequestParamsShape from \HubspotSDK\Marketing\Events\MarketingEventCreateRequestParams
 * @phpstan-import-type PropertyValueShape from \HubspotSDK\PropertyValue
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EventsContract
{
    /**
     * @api
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
    ): MarketingEventDefaultResponse;

    /**
     * @api
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
    ): MarketingEventPublicDefaultResponseV2;

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
    ): Page;

    /**
     * @api
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<MarketingEventPublicObjectIDDeleteRequest|MarketingEventPublicObjectIDDeleteRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): MarketingEventPublicReadResponseV2;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        RequestOptions|array|null $requestOptions = null,
    ): MarketingEventPublicReadResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        string $q,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseSearchPublicResponseWrapperNoPaging;

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseWithTotalMarketingEventIdentifiersResponse;

    /**
     * @api
     *
     * @param list<MarketingEventPublicUpdateRequestFullV2|MarketingEventPublicUpdateRequestFullV2Shape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponseV2;

    /**
     * @api
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
    ): MarketingEventPublicDefaultResponse;

    /**
     * @api
     *
     * @param list<MarketingEventCreateRequestParams|MarketingEventCreateRequestParamsShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsertBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseMarketingEventPublicDefaultResponse;

    /**
     * @api
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
    ): MarketingEventPublicDefaultResponse;
}
