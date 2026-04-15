<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Webhooks\BatchResponseJournalFetchResponse;
use HubSpotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubSpotSDK\Webhooks\CollectionResponseSubscriptionResponseNoPaging;
use HubSpotSDK\Webhooks\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\Webhooks\CrmObjectSnapshotRequest;
use HubSpotSDK\Webhooks\Filter;
use HubSpotSDK\Webhooks\FilterCreateResponse;
use HubSpotSDK\Webhooks\FilterResponse;
use HubSpotSDK\Webhooks\SettingsResponse;
use HubSpotSDK\Webhooks\SnapshotStatusResponse;
use HubSpotSDK\Webhooks\SubscriptionBatchUpdateRequest;
use HubSpotSDK\Webhooks\SubscriptionListResponse;
use HubSpotSDK\Webhooks\SubscriptionResponse;
use HubSpotSDK\Webhooks\SubscriptionResponse1;
use HubSpotSDK\Webhooks\ThrottlingSettings;
use HubSpotSDK\Webhooks\WebhookCreateEventSubscriptionParams\EventType;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubSpotSDK\Webhooks\SubscriptionBatchUpdateRequest
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubSpotSDK\Webhooks\CrmObjectSnapshotRequest
 * @phpstan-import-type FilterShape from \HubSpotSDK\Webhooks\Filter
 * @phpstan-import-type ThrottlingSettingsShape from \HubSpotSDK\Webhooks\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface WebhooksContract
{
    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape> $inputs An array of SubscriptionBatchUpdateRequest objects, each representing a subscription to be updated. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createBatchEventSubscriptions(
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSubscriptionResponse;

    /**
     * @api
     *
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests An array of CrmObjectSnapshotRequest objects, each representing a request to capture a snapshot of a specific CRM object. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createCrmSnapshots(
        array $snapshotRequests,
        RequestOptions|array|null $requestOptions = null
    ): CrmObjectSnapshotBatchResponse;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param bool $active A boolean indicating whether the subscription is active. This field is required.
     * @param EventType|value-of<EventType> $eventType A string representing the type of event to subscribe to. Valid values include various object changes such as 'contact.propertyChange', 'deal.creation', and 'conversation.newMessage'.
     * @param string $eventTypeName A string that provides a human-readable name for the event type. This is optional.
     * @param string $objectTypeID A string representing the identifier of the object type for which the subscription is being created. This is optional.
     * @param string $propertyName A string indicating the name of the property that triggers the event. This is optional and used when subscribing to property change events.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createEventSubscription(
        int $appID,
        bool $active,
        EventType|string $eventType,
        ?string $eventTypeName = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createJournalSubscription(
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionResponse1;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against
     * @param int $subscriptionID The unique identifier of the subscription to which the filter will be applied. It is an integer in int64 format.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createSubscriptionFilter(
        Filter|array $filter,
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): FilterCreateResponse;

    /**
     * @api
     *
     * @param int $subscriptionID the identifier for the subscription
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteEventSubscription(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $subscriptionID the unique identifier of the subscription to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $portalID the unique identifier of the portal for which the webhook journal subscription is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteJournalSubscriptionForPortal(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $filterID the unique identifier of the filter to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $count The number of journal entries to retrieve. This must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation for which to fetch the journal entries. This is an optional parameter.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliestJournalBatch(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $installPortalID The ID of the portal installation to filter the journal entries. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliestJournalEntry(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param int $count The number of webhook journal entries to retrieve. It must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation to filter the webhook journal entries. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliestLocalJournalBatch(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the earliest journal entry. This parameter is optional and should be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliestLocalJournalEntry(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param int $subscriptionID the identifier for the subscription
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEventSubscription(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param: The ID of the portal from which to retrieve webhook journal entries. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalBatchByRequest(
        array $inputs,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $count Path param: The number of webhook journal entries to retrieve in the batch. This parameter is required and must be an integer greater than or equal to 1.
     * @param string $offset Path param: The starting point for retrieving the batch of webhook journal entries. This parameter is required and determines where the batch retrieval begins.
     * @param int $installPortalID Query param: The ID of the portal installation to filter the webhook journal entries. This parameter is optional and is used to specify which portal's data to retrieve.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalBatchFromOffset(
        int $count,
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param string $statusID the unique identifier (UUID) of the webhook journal entry whose status is to be retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse;

    /**
     * @api
     *
     * @param int $subscriptionID The unique identifier of the subscription to retrieve. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionResponse1;

    /**
     * @api
     *
     * @param int $count The number of journal entries to retrieve. Must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation. This parameter is optional and can be used to filter results by a specific portal.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatestJournalBatch(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the latest journal entry. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatestJournalEntry(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param int $count The number of webhook journal entries to retrieve. It must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation to filter the webhook journal entries. It is an optional integer parameter.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatestLocalJournalBatch(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $installPortalID an integer representing the ID of the portal to filter the webhook journal entries
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatestLocalJournalEntry(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param: The ID of the portal where the webhook is installed. This parameter is optional and is used to specify the portal context for the operation.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalJournalBatchByRequest(
        array $inputs,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $count Path param: The number of entries to retrieve in the batch. This must be an integer with a minimum value of 1.
     * @param string $offset Path param: The starting point for the batch retrieval. This is a string value representing the offset in the journal.
     * @param int $installPortalID Query param: The ID of the portal where the webhooks are installed. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalJournalBatchFromOffset(
        int $count,
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param string $statusID the unique identifier (UUID) of the webhook journal entry whose status is to be retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse;

    /**
     * @api
     *
     * @param string $offset The offset from which to start retrieving the next set of journal entries. This is a string value.
     * @param int $installPortalID The ID of the portal where the webhooks are installed. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNextJournalEntries(
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $offset The offset from which the next set of journal entries should be retrieved. This parameter is required to specify the starting point for the retrieval.
     * @param int $installPortalID The ID of the portal installation to filter the journal entries by. This is an optional parameter.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNextLocalJournalEntries(
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SettingsResponse;

    /**
     * @api
     *
     * @param int $filterID the unique identifier of the filter to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): FilterResponse;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listEventSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listJournalSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseSubscriptionResponseNoPaging;

    /**
     * @api
     *
     * @param int $subscriptionID the unique identifier of the subscription for which filters are being retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @return list<FilterResponse>
     *
     * @throws APIException
     */
    public function listSubscriptionFilters(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param int $subscriptionID path param: The identifier for the subscription
     * @param int $appID path param: The identifier for the app
     * @param bool $active Body param: Whether to activate or pause the webhook subscription. If true, the subscription will send webhook notifications. If false, the subscription is paused and will not send notifications.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateEventSubscription(
        int $subscriptionID,
        int $appID,
        ?bool $active = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param string $targetURL A publicly available URL for Hubspot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        string $targetURL,
        ThrottlingSettings|array $throttling,
        RequestOptions|array|null $requestOptions = null,
    ): SettingsResponse;
}
