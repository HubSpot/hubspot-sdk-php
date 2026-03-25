<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
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
use HubspotSDK\PropertyValue;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\EventsContract;
use HubspotSDK\Services\Marketing\Events\AttendanceService;
use HubspotSDK\Services\Marketing\Events\ListAssociationsService;
use HubspotSDK\Services\Marketing\Events\ParticipationsService;
use HubspotSDK\Services\Marketing\Events\SettingsService;

/**
 * @phpstan-import-type MarketingEventPublicObjectIDDeleteRequestShape from \HubspotSDK\Marketing\Events\MarketingEventPublicObjectIDDeleteRequest
 * @phpstan-import-type MarketingEventExternalUniqueIdentifierShape from \HubspotSDK\Marketing\Events\MarketingEventExternalUniqueIdentifier
 * @phpstan-import-type MarketingEventPublicUpdateRequestFullV2Shape from \HubspotSDK\Marketing\Events\MarketingEventPublicUpdateRequestFullV2
 * @phpstan-import-type MarketingEventCreateRequestParamsShape from \HubspotSDK\Marketing\Events\MarketingEventCreateRequestParams
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventSubscriber
 * @phpstan-import-type PropertyValueShape from \HubspotSDK\PropertyValue
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventsRawService $raw;

    /**
     * @api
     */
    public AttendanceService $attendance;

    /**
     * @api
     */
    public Events\EventsService $events;

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
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventsRawService($client);
        $this->attendance = new AttendanceService($client);
        $this->events = new Events\EventsService($client);
        $this->listAssociations = new ListAssociationsService($client);
        $this->participations = new ParticipationsService($client);
        $this->settings = new SettingsService($client);
    }

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

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param string $externalEventID Path param
     * @param string $externalAccountID Query param
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs Body param: List of marketing event details to create or update
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByEmail(
        string $subscriberState,
        string $externalEventID,
        string $externalAccountID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
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
     * @param string $subscriberState Path param
     * @param string $externalEventID Path param
     * @param string $externalAccountID Query param
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs Body param: List of HubSpot contacts to subscribe to the marketing event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByID(
        string $subscriberState,
        string $externalEventID,
        string $externalAccountID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
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
