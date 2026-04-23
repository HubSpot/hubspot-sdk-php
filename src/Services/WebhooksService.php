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
     * Create a batch of CRM object snapshots for the specified portal. This endpoint allows you to capture the state of CRM objects at a specific point in time, which can be useful for auditing or historical analysis. The request requires a list of CRM object snapshot requests, each specifying the portal ID, object ID, object type ID, and properties to include in the snapshot.
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
     * Create a new webhook subscription for the specified portal in the HubSpot account. This endpoint allows you to define the subscription details, including the types of events you want to subscribe to. The request body must include the necessary subscription information as defined by the SubscriptionUpsertRequest schema.
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
     * Create a new filter for a webhook subscription in your HubSpot account. This endpoint allows you to define specific conditions that a webhook event must meet to trigger the subscription. It is useful for managing and customizing the behavior of webhook subscriptions based on specific criteria.
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
     * Delete a specific webhook journal subscription using its unique identifier. This operation is useful for managing and cleaning up subscriptions that are no longer needed or relevant.
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
     * Delete a webhook journal subscription for a specific portal. This operation removes the subscription associated with the given portalId, and no content is returned upon successful deletion.
     *
     * @param int $portalID the unique identifier of the portal whose webhook journal subscription is to be deleted
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
     * Delete a specific filter associated with a webhook journal subscription. This operation is useful for managing and cleaning up filters that are no longer needed in your subscription setup. The endpoint requires the unique identifier of the filter to be deleted.
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
     * Retrieve the earliest batch of webhook journal entries up to the specified count. This endpoint is useful for fetching historical webhook data in batches, allowing you to process or analyze the earliest entries first.
     *
     * @param int $count The maximum number of journal entries to retrieve in the batch. This must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation to filter the webhook journal entries by. This is an integer value.
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
     * Retrieve the earliest entry from the webhooks journal for the specified version. This endpoint is useful for accessing the oldest records available in the journal, which can be helpful for auditing or historical data analysis.
     *
     * @param int $installPortalID The ID of the portal installation to filter the journal entries. It is an integer.
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
     * Retrieve the earliest batch of webhook journal entries based on the specified count. This endpoint is useful for fetching a specific number of the earliest entries in the webhook journal for analysis or processing.
     *
     * @param int $count The number of earliest entries to retrieve from the webhook journal. Must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal where the webhooks are installed. This is an integer value.
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
     * Retrieve the earliest entry from the webhooks journal for the specified portal. This endpoint is useful for accessing the oldest records in the journal, which can be helpful for auditing or tracking purposes.
     *
     * @param int $installPortalID The ID of the portal installation to filter the journal entries by. This parameter is optional and should be an integer.
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
     * Perform a batch read operation on the webhooks journal for the specified date. This endpoint allows you to retrieve multiple entries from the webhooks journal in a single request, which can be useful for processing large amounts of data efficiently.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param: The ID of the portal where the webhooks are installed. This is an integer value.
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
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint allows you to fetch a specified number of entries, making it useful for paginating through large sets of webhook journal data.
     *
     * @param int $count Path param: The number of journal entries to fetch in the batch. This is an integer value with a minimum of 1.
     * @param string $offset Path param: The starting point for fetching the next batch of journal entries. This is a string value that indicates the offset position.
     * @param int $installPortalID Query param: The ID of the portal installation. This is an integer value used to specify the portal context for the request.
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
     * Retrieve the status of a specific webhook journal entry using its status ID. This endpoint is useful for checking the current state of a webhook process, such as whether it is pending, in progress, completed, failed, or expired.
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
     * Retrieve details of a specific webhook subscription using its unique identifier. This endpoint is useful for obtaining information about a particular subscription's configuration and status within the HubSpot account.
     *
     * @param int $subscriptionID The unique identifier of the subscription to retrieve. It must be an integer.
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
     * Retrieve the latest batch of webhook journal entries. This endpoint allows you to specify the number of entries to fetch, providing a way to access recent webhook activity within your HubSpot account.
     *
     * @param int $count The number of journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation. This is an integer value used to identify the specific portal.
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
     * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events processed by your HubSpot account. It allows you to filter the results by the portal ID to ensure you are retrieving data relevant to a specific installation.
     *
     * @param int $installPortalID The ID of the portal installation to filter the journal entries. It is an integer value.
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
     * Retrieve the latest batch of webhook journal entries. This endpoint is useful for accessing the most recent data entries processed by the webhook journal. It requires specifying the number of entries to retrieve.
     *
     * @param int $count The number of journal entries to retrieve. Must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation. This parameter is optional and used to filter the journal entries by a specific portal.
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
     * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events that have been logged, allowing you to process or analyze them as needed.
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the latest journal entries. This parameter is optional and should be an integer.
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
     * Perform a batch read operation on the webhooks journal. This endpoint allows you to read multiple entries from the journal in a single request. It requires a JSON request body specifying the inputs to be read. The response includes the results of the batch read operation, and may return multiple statuses if there are errors.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param: The ID of the portal where the webhooks are installed. This parameter is optional and is used to specify the target portal.
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
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint allows you to fetch a defined number of entries, facilitating the processing of webhook data in manageable chunks.
     *
     * @param int $count Path param: The number of journal entries to retrieve. This is an integer value with a minimum of 1.
     * @param string $offset Path param: The starting point for fetching the batch of journal entries. This is a string value that indicates the offset position.
     * @param int $installPortalID Query param: The ID of the portal installation. This is an integer value used to specify the portal context for the request.
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
     * Retrieve the status of a specific webhook journal entry using its unique status ID. This endpoint is useful for monitoring the progress or completion of webhook processing tasks.
     *
     * @param string $statusID the unique identifier (UUID) of the status to retrieve
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
     * Retrieve the next batch of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data, allowing you to continue fetching entries from where you last left off.
     *
     * @param string $offset The offset from which to start retrieving the next batch of webhook journal entries. This parameter is required and identifies the starting point for the batch retrieval.
     * @param int $installPortalID The ID of the portal installation to filter the webhook journal entries. This is an optional parameter.
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
     * Retrieve the next set of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through webhook journal data in a sequential manner, allowing you to fetch entries beyond a given point.
     *
     * @param string $offset The starting point for retrieving the next set of journal entries. This is a string value.
     * @param int $installPortalID The ID of the portal where the webhook is installed. This is an integer value.
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
     * Retrieve details of a specific filter associated with a webhook subscription in the HubSpot account. This endpoint is useful for accessing the configuration and conditions of a filter by its unique identifier.
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
     * Retrieve a list of webhook journal subscriptions for the specified API version. This endpoint provides details about each subscription, including actions, object types, and associated properties. It is useful for managing and reviewing current webhook subscriptions.
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
     * Retrieve the filters associated with a specific webhook subscription in the HubSpot account. This endpoint is useful for obtaining detailed information about the filters applied to a given subscription, identified by its subscription ID.
     *
     * @param int $subscriptionID the unique identifier of the subscription for which to retrieve filters
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
