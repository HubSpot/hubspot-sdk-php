<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts;

use HubSpotSDK\BatchResponseJournalFetchResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\FilterCreateResponse;
use HubSpotSDK\FilterResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\SnapshotStatusResponse;
use HubSpotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubSpotSDK\Webhooks\SettingsResponse;
use HubSpotSDK\Webhooks\SubscriptionListResponse;
use HubSpotSDK\Webhooks\SubscriptionResponse;
use HubSpotSDK\Webhooks\WebhookCreateBatchEventSubscriptionsParams;
use HubSpotSDK\Webhooks\WebhookCreateCrmSnapshotsParams;
use HubSpotSDK\Webhooks\WebhookCreateEventSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookCreateJournalSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookCreateSubscriptionFilterParams;
use HubSpotSDK\Webhooks\WebhookDeleteEventSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestJournalEntryParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestLocalJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestLocalJournalEntryParams;
use HubSpotSDK\Webhooks\WebhookGetEventSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookGetJournalBatchByRequestParams;
use HubSpotSDK\Webhooks\WebhookGetJournalBatchFromOffsetParams;
use HubSpotSDK\Webhooks\WebhookGetLatestJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetLatestJournalEntryParams;
use HubSpotSDK\Webhooks\WebhookGetLatestLocalJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetLatestLocalJournalEntryParams;
use HubSpotSDK\Webhooks\WebhookGetLocalJournalBatchByRequestParams;
use HubSpotSDK\Webhooks\WebhookGetLocalJournalBatchFromOffsetParams;
use HubSpotSDK\Webhooks\WebhookGetNextJournalEntriesParams;
use HubSpotSDK\Webhooks\WebhookGetNextLocalJournalEntriesParams;
use HubSpotSDK\Webhooks\WebhookUpdateEventSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookUpdateSettingsParams;
use HubSpotSDK\WebhooksJournal\CollectionResponseSubscriptionResponseNoPaging;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface WebhooksRawContract
{
    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param array<string,mixed>|WebhookCreateBatchEventSubscriptionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriptionResponse>
     *
     * @throws APIException
     */
    public function createBatchEventSubscriptions(
        int $appID,
        array|WebhookCreateBatchEventSubscriptionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookCreateCrmSnapshotsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CrmObjectSnapshotBatchResponse>
     *
     * @throws APIException
     */
    public function createCrmSnapshots(
        array|WebhookCreateCrmSnapshotsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param array<string,mixed>|WebhookCreateEventSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function createEventSubscription(
        int $appID,
        array|WebhookCreateEventSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookCreateJournalSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubSpotSDK\WebhooksJournal\SubscriptionResponse>
     *
     * @throws APIException
     */
    public function createJournalSubscription(
        array|WebhookCreateJournalSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookCreateSubscriptionFilterParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterCreateResponse>
     *
     * @throws APIException
     */
    public function createSubscriptionFilter(
        array|WebhookCreateSubscriptionFilterParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID the identifier for the subscription
     * @param array<string,mixed>|WebhookDeleteEventSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteEventSubscription(
        int $subscriptionID,
        array|WebhookDeleteEventSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID The unique identifier of the subscription to delete. It must be provided as an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $portalID the unique identifier of the portal for which the webhook journal subscription is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteJournalSubscriptionForPortal(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $filterID the unique identifier of the filter to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count The number of earliest journal entries to retrieve. This must be an integer with a minimum value of 1.
     * @param array<string,mixed>|WebhookGetEarliestJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getEarliestJournalBatch(
        int $count,
        array|WebhookGetEarliestJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookGetEarliestJournalEntryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getEarliestJournalEntry(
        array|WebhookGetEarliestJournalEntryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count The number of earliest webhook journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param array<string,mixed>|WebhookGetEarliestLocalJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getEarliestLocalJournalBatch(
        int $count,
        array|WebhookGetEarliestLocalJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookGetEarliestLocalJournalEntryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getEarliestLocalJournalEntry(
        array|WebhookGetEarliestLocalJournalEntryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID the identifier for the subscription
     * @param array<string,mixed>|WebhookGetEventSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function getEventSubscription(
        int $subscriptionID,
        array|WebhookGetEventSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookGetJournalBatchByRequestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getJournalBatchByRequest(
        array|WebhookGetJournalBatchByRequestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count Path param: The number of journal entries to retrieve. This must be an integer with a minimum value of 1.
     * @param array<string,mixed>|WebhookGetJournalBatchFromOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getJournalBatchFromOffset(
        int $count,
        array|WebhookGetJournalBatchFromOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $statusID the unique identifier (UUID) of the status to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SnapshotStatusResponse>
     *
     * @throws APIException
     */
    public function getJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID the unique identifier of the subscription to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubSpotSDK\WebhooksJournal\SubscriptionResponse>
     *
     * @throws APIException
     */
    public function getJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count The maximum number of journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param array<string,mixed>|WebhookGetLatestJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLatestJournalBatch(
        int $count,
        array|WebhookGetLatestJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookGetLatestJournalEntryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLatestJournalEntry(
        array|WebhookGetLatestJournalEntryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count The number of journal entries to retrieve. Must be an integer with a minimum value of 1.
     * @param array<string,mixed>|WebhookGetLatestLocalJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLatestLocalJournalBatch(
        int $count,
        array|WebhookGetLatestLocalJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookGetLatestLocalJournalEntryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLatestLocalJournalEntry(
        array|WebhookGetLatestLocalJournalEntryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookGetLocalJournalBatchByRequestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalJournalBatchByRequest(
        array|WebhookGetLocalJournalBatchByRequestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count Path param: The number of journal entries to retrieve in this batch. Must be an integer with a minimum value of 1.
     * @param array<string,mixed>|WebhookGetLocalJournalBatchFromOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalJournalBatchFromOffset(
        int $count,
        array|WebhookGetLocalJournalBatchFromOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $statusID The unique identifier of the status to retrieve. It should be in UUID format.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SnapshotStatusResponse>
     *
     * @throws APIException
     */
    public function getLocalJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $offset the offset string indicating the starting point for retrieving the next set of journal entries
     * @param array<string,mixed>|WebhookGetNextJournalEntriesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getNextJournalEntries(
        string $offset,
        array|WebhookGetNextJournalEntriesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $offset The starting point for retrieving the next set of webhook journal entries. This is a string value that represents the current position in the journal.
     * @param array<string,mixed>|WebhookGetNextLocalJournalEntriesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getNextLocalJournalEntries(
        string $offset,
        array|WebhookGetNextLocalJournalEntriesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $filterID The unique identifier of the filter to retrieve. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionListResponse>
     *
     * @throws APIException
     */
    public function listEventSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseSubscriptionResponseNoPaging>
     *
     * @throws APIException
     */
    public function listJournalSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID The unique identifier of the subscription for which to retrieve filters. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<FilterResponse>>
     *
     * @throws APIException
     */
    public function listSubscriptionFilters(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID path param: The identifier for the subscription
     * @param array<string,mixed>|WebhookUpdateEventSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateEventSubscription(
        int $subscriptionID,
        array|WebhookUpdateEventSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the identifier for the app
     * @param array<string,mixed>|WebhookUpdateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        array|WebhookUpdateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
