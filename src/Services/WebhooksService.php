<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\BatchResponseJournalFetchResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\CrmObjectSnapshotRequest;
use HubSpotSDK\Filter;
use HubSpotSDK\FilterCreateResponse;
use HubSpotSDK\FilterResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksContract;
use HubSpotSDK\SnapshotStatusResponse;
use HubSpotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubSpotSDK\Webhooks\SettingsResponse;
use HubSpotSDK\Webhooks\SubscriptionBatchUpdateRequest;
use HubSpotSDK\Webhooks\SubscriptionListResponse;
use HubSpotSDK\Webhooks\SubscriptionResponse;
use HubSpotSDK\Webhooks\ThrottlingSettings;
use HubSpotSDK\Webhooks\WebhookCreateEventSubscriptionParams\EventType;
use HubSpotSDK\Webhooks\WebhookCreateJournalSubscriptionParams\Action;
use HubSpotSDK\Webhooks\WebhookCreateJournalSubscriptionParams\SubscriptionType;
use HubSpotSDK\WebhooksJournal\CollectionResponseSubscriptionResponseNoPaging;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubSpotSDK\Webhooks\SubscriptionBatchUpdateRequest
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubSpotSDK\CrmObjectSnapshotRequest
 * @phpstan-import-type FilterShape from \HubSpotSDK\Filter
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
     * Create a batch of CRM object snapshots in HubSpot. This endpoint is used to capture the current state of specified CRM objects for later reference or analysis. It requires a JSON payload containing the details of the CRM objects to snapshot. This operation is exempt from daily and ten-secondly rate limits.
     *
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests An array of CrmObjectSnapshotRequest objects, each representing a request to create a snapshot for a specific CRM object. This property is required.
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
     * @param bool $active a boolean indicating whether the subscription is active
     * @param EventType|value-of<EventType> $eventType A string representing the type of event to subscribe to. Valid values include various property changes, creations, deletions, merges, restorations, association changes, and event completions.
     * @param string $eventTypeName a string providing a human-readable name for the event type
     * @param string $objectTypeID a string representing the ID of the object type associated with the subscription
     * @param string $propertyName a string indicating the specific property name related to the event type, if applicable
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
     * Create a new subscription in the Webhooks Journal for the specified version. This endpoint allows you to define the subscription details by providing the necessary information in the request body. It supports various types of subscriptions, including object, association, event, app lifecycle event, list membership, and GDPR privacy deletion. Ensure that all required fields are included in the request to successfully create a subscription.
     *
     * @param list<Action|value-of<Action>> $actions
     * @param list<int> $objectIDs
     * @param list<string> $properties
     * @param list<string> $associatedObjectTypeIDs
     * @param list<int> $listIDs
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createJournalSubscription(
        array $actions,
        array $objectIDs,
        string $objectTypeID,
        int $portalID,
        array $properties,
        array $associatedObjectTypeIDs,
        string $eventTypeID,
        array $listIDs,
        SubscriptionType|string $subscriptionType = 'GDPR_PRIVACY_DELETION',
        RequestOptions|array|null $requestOptions = null,
    ): \HubSpotSDK\WebhooksJournal\SubscriptionResponse {
        $params = Util::removeNulls(
            [
                'actions' => $actions,
                'objectIDs' => $objectIDs,
                'objectTypeID' => $objectTypeID,
                'portalID' => $portalID,
                'properties' => $properties,
                'subscriptionType' => $subscriptionType,
                'associatedObjectTypeIDs' => $associatedObjectTypeIDs,
                'eventTypeID' => $eventTypeID,
                'listIDs' => $listIDs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createJournalSubscription(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new filter for a specific webhook subscription in the HubSpot account. This endpoint allows you to define conditions that determine when a webhook should be triggered. The filter is associated with a subscription identified by its ID, and the request must include the filter details.
     *
     * @param Filter|FilterShape $filter defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against
     * @param int $subscriptionID The unique identifier of the subscription to which the filter will be applied. It is an integer formatted as int64.
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
     * Delete a specific webhook journal subscription using its unique identifier. This operation is useful for managing and cleaning up subscriptions that are no longer needed in your HubSpot account.
     *
     * @param int $subscriptionID The unique identifier of the subscription to delete. It must be provided as an integer.
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
     * Delete a webhook journal subscription for a specific portal. This operation removes the subscription associated with the given portalId, ensuring that no further webhook events are sent for this portal. Use this endpoint to manage and clean up subscriptions that are no longer needed.
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
     * Remove a specific filter from the webhooks journal subscriptions. This operation is useful for managing and cleaning up filters that are no longer needed. Once deleted, the filter cannot be recovered.
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
     * Retrieve the earliest batch of webhook journal entries for a specified count. This endpoint is useful for accessing historical webhook data in batches, allowing you to process or analyze older entries. The number of entries retrieved is determined by the count parameter.
     *
     * @param int $count The number of earliest journal entries to retrieve. This must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation. This is an integer value that specifies which portal's data to access.
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
     * Retrieve the earliest entry from the webhooks journal for the specified portal. This endpoint is useful for accessing the first recorded webhook event in the journal, which can be helpful for auditing or debugging purposes.
     *
     * @param int $installPortalID The ID of the portal installation to filter the journal entries by. This is an integer value.
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
     * Retrieve the earliest batch of webhook journal entries. This endpoint is useful for accessing the oldest available data in the webhook journal, allowing users to process or analyze historical webhook events. The number of entries to fetch is specified by the 'count' path parameter.
     *
     * @param int $count The number of earliest webhook journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation to filter the webhook journal entries. This is an optional integer parameter.
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
     * Retrieve the earliest webhook journal entries for the specified portal. This endpoint can be used to access the oldest records available in the webhook journal, which may be useful for auditing or historical analysis.
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the earliest webhook journal entries. This parameter is optional and should be an integer.
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
     * Execute a batch read operation on the webhooks journal for the specified date, 2026-03. This endpoint allows you to retrieve multiple entries from the webhooks journal in a single request, which can be useful for processing large amounts of data efficiently. Ensure that the request body is provided in the required format.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID query param: An integer representing the ID of the portal installation for which the webhooks journal data should be retrieved
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
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint allows you to fetch a defined number of entries, which can be useful for processing large datasets in manageable chunks.
     *
     * @param int $count Path param: The number of journal entries to retrieve. This must be an integer with a minimum value of 1.
     * @param string $offset Path param: The starting point for fetching the journal entries. This is a string value.
     * @param int $installPortalID Query param: The ID of the portal installation. This is an integer value.
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
     * Retrieve the status of a specific webhook journal entry using its unique status ID. This endpoint provides detailed information about the status, including whether it is pending, in progress, completed, failed, or expired. It is useful for monitoring and managing the state of webhook journal entries.
     *
     * @param string $statusID the unique identifier (UUID) of the status to retrieve
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
     * Retrieve details of a specific webhook subscription using its unique identifier. This endpoint is useful for obtaining information about a particular subscription, such as its actions, object type, and associated properties.
     *
     * @param int $subscriptionID the unique identifier of the subscription to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): \HubSpotSDK\WebhooksJournal\SubscriptionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalSubscription($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the latest batch of webhook journal entries up to the specified count. This endpoint is useful for fetching recent webhook data for analysis or processing. The count parameter determines the maximum number of entries to return.
     *
     * @param int $count The maximum number of journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation. This is an integer value used to specify the portal context for the request.
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
     * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events and their statuses, allowing you to monitor and debug webhook activity effectively.
     *
     * @param int $installPortalID The unique identifier of the portal installation for which to retrieve the latest journal entries. This parameter is optional and should be an integer.
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
     * Retrieve the latest batch of webhook journal entries. This endpoint allows you to specify the number of entries to fetch, providing a way to access the most recent webhook events processed by your HubSpot account.
     *
     * @param int $count The number of journal entries to retrieve. Must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal where the webhook journal is installed. This parameter is optional and used to specify the target portal.
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
     * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events that have been logged, allowing for real-time monitoring or debugging of webhook activities.
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the latest journal entries. This is an integer value.
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
     * Execute a batch read operation on the webhooks journal. This endpoint allows you to retrieve a batch of webhook journal entries by providing the necessary input data. It is useful for processing multiple records in a single request, streamlining data retrieval tasks.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param: The ID of the portal where the webhooks are installed. This parameter is optional and is used to specify the target portal for the operation.
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
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data. The number of entries returned is determined by the 'count' parameter.
     *
     * @param int $count Path param: The number of journal entries to retrieve in this batch. Must be an integer with a minimum value of 1.
     * @param string $offset path param: The starting point for the batch retrieval, specified as a string
     * @param int $installPortalID Query param: The ID of the portal where the webhooks are installed. This is an optional parameter.
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
     * Retrieve the status of a specific webhook journal entry using its unique status ID. This endpoint is useful for monitoring the progress or outcome of webhook journal entries, allowing you to check if an entry is pending, in progress, completed, failed, or expired.
     *
     * @param string $statusID The unique identifier of the status to retrieve. It should be in UUID format.
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
     * Retrieve the next set of entries from the webhooks journal starting from a specified offset. This endpoint is useful for paginating through journal entries to process or analyze webhook events sequentially.
     *
     * @param string $offset the offset string indicating the starting point for retrieving the next set of journal entries
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
     * Retrieve the next set of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data, allowing you to continue from where a previous request left off.
     *
     * @param string $offset The starting point for retrieving the next set of webhook journal entries. This is a string value that represents the current position in the journal.
     * @param int $installPortalID The ID of the portal installation to filter the webhook journal entries. This is an integer value.
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
     * Retrieve a specific filter associated with a webhook journal subscription. This endpoint allows you to access the details of the filter identified by the filterId, which is useful for managing and understanding the conditions applied to webhook events.
     *
     * @param int $filterID The unique identifier of the filter to retrieve. It is an integer value.
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
     * Retrieve a list of webhook journal subscriptions for the specified version. This endpoint allows you to view all active subscriptions without pagination. It is useful for monitoring and managing webhook subscriptions in your HubSpot account.
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
     * Retrieve the filters associated with a specific webhook subscription. This endpoint allows you to view the filters applied to a subscription, which can help in managing and understanding the conditions set for webhook events.
     *
     * @param int $subscriptionID The unique identifier of the subscription for which to retrieve filters. This is an integer value.
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
     * @param bool $active Body param: A boolean indicating whether the subscription is active. If true, the subscription is active; if false, it is inactive.
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
     * @param string $targetURL The URL to which webhook events will be sent. It is a string.
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
