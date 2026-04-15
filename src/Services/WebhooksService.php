<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksContract;
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
final class WebhooksService implements WebhooksContract
{
    /**
     * @api
     */
    public WebhooksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksRawService($client);
    }

    /**
     * @api
     *
     * Batch create event subscriptions for the specified app.
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
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSubscriptionResponse {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createBatchEventSubscriptions($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a batch of CRM object snapshots for a specified portal. This endpoint allows you to capture the current state of CRM objects by submitting a batch request with the necessary object details. It is useful for tracking changes or maintaining historical records of CRM data.
     *
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests An array of CrmObjectSnapshotRequest objects, each representing a request to capture a snapshot of a specific CRM object. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createCrmSnapshots(
        array $snapshotRequests,
        RequestOptions|array|null $requestOptions = null
    ): CrmObjectSnapshotBatchResponse {
        $params = Util::removeNulls(['snapshotRequests' => $snapshotRequests]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createCrmSnapshots(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create new event subscription for the specified app.
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
    ): SubscriptionResponse {
        $params = Util::removeNulls(
            [
                'active' => $active,
                'eventType' => $eventType,
                'eventTypeName' => $eventTypeName,
                'objectTypeID' => $objectTypeID,
                'propertyName' => $propertyName,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createEventSubscription($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new subscription in the webhooks journal for the specified version. This endpoint allows you to define the subscription details, including actions and object types, to manage webhook events effectively. It requires a valid request body with the subscription details.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createJournalSubscription(
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionResponse1 {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createJournalSubscription(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new filter for a webhook subscription in the HubSpot account. This endpoint allows you to define conditions that determine when a webhook event should be triggered for a specific subscription. The request body must include the subscription ID and the filter details.
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
    ): FilterCreateResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'subscriptionID' => $subscriptionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createSubscriptionFilter(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing event subscription by ID.
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
    ): mixed {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteEventSubscription($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific webhook journal subscription using its unique identifier. This operation is useful for managing and cleaning up subscriptions that are no longer needed.
     *
     * @param int $subscriptionID the unique identifier of the subscription to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteJournalSubscription($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a webhook journal subscription for a specific portal. This operation removes the subscription associated with the given portalId, effectively stopping any webhook events from being sent to the portal.
     *
     * @param int $portalID the unique identifier of the portal for which the webhook journal subscription is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteJournalSubscriptionForPortal(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteJournalSubscriptionForPortal($portalID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the webhook settings for the specified app. Event subscriptions will not be deleted, but will be paused until another webhook is created.
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove a specific filter from your webhook journal subscriptions. This operation is useful when you need to clean up or modify the filters applied to your webhook subscriptions. The filter identified by the filterId will be permanently deleted.
     *
     * @param int $filterID the unique identifier of the filter to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteSubscriptionFilter($filterID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the earliest batch of webhook journal entries up to the specified count. This endpoint is useful for fetching historical webhook data in batches, allowing you to process or analyze them as needed.
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
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliestJournalBatch($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the earliest entry from the webhooks journal for the specified portal. This endpoint is useful for accessing the initial entries in the journal, which can be helpful for debugging or auditing purposes.
     *
     * @param int $installPortalID The ID of the portal installation to filter the journal entries. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliestJournalEntry(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliestJournalEntry(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the earliest batch of webhook journal entries up to a specified count. This endpoint is useful for accessing the oldest records available in the webhook journal, allowing you to process or analyze historical webhook data.
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
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliestLocalJournalBatch($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the earliest entry from the webhooks journal for the specified portal. This endpoint is useful for accessing the oldest available data in the journal, which can be used for historical analysis or troubleshooting.
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the earliest journal entry. This parameter is optional and should be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliestLocalJournalEntry(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliestLocalJournalEntry(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific event subscription by ID.
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
    ): SubscriptionResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEventSubscription($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a batch of webhook journal entries for the specified portal. This endpoint allows you to retrieve detailed information about webhook events processed by your HubSpot account. It is useful for auditing and tracking webhook activity.
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
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['inputs' => $inputs, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalBatchByRequest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint allows you to specify the number of entries to retrieve, helping you manage and paginate through large sets of webhook data efficiently.
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
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['offset' => $offset, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalBatchFromOffset($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the status of a specific webhook journal entry using its unique status ID. This endpoint is useful for monitoring the progress or outcome of a webhook operation, providing insights into whether it is pending, in progress, completed, failed, or expired.
     *
     * @param string $statusID the unique identifier (UUID) of the webhook journal entry whose status is to be retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalStatus($statusID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a specific webhook journal subscription using its unique identifier. This endpoint is useful for obtaining information about a particular subscription, such as its actions, object types, and associated properties.
     *
     * @param int $subscriptionID The unique identifier of the subscription to retrieve. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionResponse1 {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalSubscription($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the latest batch of webhook journal entries up to a specified count. This endpoint is useful for fetching the most recent webhook events processed by your HubSpot account. The response includes details about each event, and you can specify the number of entries to retrieve.
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
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLatestJournalBatch($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the latest entry from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook data available in the journal.
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the latest journal entry. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatestJournalEntry(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLatestJournalEntry(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the latest batch of webhook journal entries up to a specified count. This endpoint is useful for fetching the most recent webhook events processed by the system. It requires authentication and supports various security schemes.
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
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLatestLocalJournalBatch($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the latest entries from the webhooks journal. This endpoint is useful for accessing the most recent webhook data for analysis or troubleshooting. It supports filtering by the installPortalId to narrow down results to a specific portal.
     *
     * @param int $installPortalID an integer representing the ID of the portal to filter the webhook journal entries
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatestLocalJournalEntry(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLatestLocalJournalEntry(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a batch read operation on the webhooks journal. This endpoint allows you to retrieve a batch of journal entries by providing the necessary input data. It is useful for processing large volumes of webhook data efficiently.
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
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['inputs' => $inputs, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalJournalBatchByRequest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint is useful for fetching sequential batches of data, allowing you to paginate through large sets of webhook journal entries efficiently.
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
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['offset' => $offset, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalJournalBatchFromOffset($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the status of a specific webhook journal entry using its unique status ID. This endpoint is useful for checking the progress or result of a webhook operation, such as whether it is pending, in progress, completed, failed, or expired.
     *
     * @param string $statusID the unique identifier (UUID) of the webhook journal entry whose status is to be retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalJournalStatus($statusID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the next set of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through webhook journal entries in a HubSpot account. It allows you to continue fetching entries from where the last request left off, using the offset parameter.
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
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getNextJournalEntries($offset, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the next set of journal entries starting from a specified offset. This endpoint is useful for paginating through webhook journal entries in a sequential manner. It requires specifying the offset from which the next entries should be fetched.
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
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getNextLocalJournalEntries($offset, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the webhook settings for the specified app, including the webhook’s target URL, throttle configuration, and create/update date.
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific filter associated with a webhook journal subscription. This endpoint allows you to access detailed information about the filter identified by the filterId path parameter. It is useful for managing and reviewing filter configurations within your webhook subscriptions.
     *
     * @param int $filterID the unique identifier of the filter to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): FilterResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSubscriptionFilter($filterID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve event subscriptions for the specified app.
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listEventSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listEventSubscriptions($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of webhook journal subscriptions for the specified version. This endpoint allows you to view all active subscriptions without pagination. It is useful for managing and auditing webhook subscriptions in your HubSpot account.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listJournalSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseSubscriptionResponseNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listJournalSubscriptions(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the filters associated with a specific webhook subscription. This endpoint is useful for obtaining detailed information about the filters applied to a subscription, which can help in managing and understanding the data flow through your webhook integrations.
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
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubscriptionFilters($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing event subscription by ID.
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
    ): SubscriptionResponse {
        $params = Util::removeNulls(['appID' => $appID, 'active' => $active]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateEventSubscription($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update webhook settings for the specified app.
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
    ): SettingsResponse {
        $params = Util::removeNulls(
            ['targetURL' => $targetURL, 'throttling' => $throttling]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
