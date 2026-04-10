<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Webhooks\BatchResponseJournalFetchResponse;
use HubSpotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubSpotSDK\Webhooks\CollectionResponseSubscriptionResponseNoPaging;
use HubSpotSDK\Webhooks\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\Webhooks\FilterCreateResponse;
use HubSpotSDK\Webhooks\FilterResponse;
use HubSpotSDK\Webhooks\SettingsResponse;
use HubSpotSDK\Webhooks\SnapshotStatusResponse;
use HubSpotSDK\Webhooks\SubscriptionListResponse;
use HubSpotSDK\Webhooks\SubscriptionResponse;
use HubSpotSDK\Webhooks\SubscriptionResponse1;
use HubSpotSDK\Webhooks\WebhookCreateCrmSnapshotParams;
use HubSpotSDK\Webhooks\WebhookCreateSubscriptionFilterParams;
use HubSpotSDK\Webhooks\WebhookCreateSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookCreateSubscriptionsBatchParams;
use HubSpotSDK\Webhooks\WebhookDeleteSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestJournalParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestLocalJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestLocalJournalParams;
use HubSpotSDK\Webhooks\WebhookGetJournalBatchAfterOffsetParams;
use HubSpotSDK\Webhooks\WebhookGetJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetLatestJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetLatestJournalParams;
use HubSpotSDK\Webhooks\WebhookGetLatestLocalJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetLatestLocalJournalParams;
use HubSpotSDK\Webhooks\WebhookGetLocalJournalBatchAfterOffsetParams;
use HubSpotSDK\Webhooks\WebhookGetLocalJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetNextJournalAfterOffsetParams;
use HubSpotSDK\Webhooks\WebhookGetNextLocalJournalAfterOffsetParams;
use HubSpotSDK\Webhooks\WebhookGetSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookUpdateSettingsParams;
use HubSpotSDK\Webhooks\WebhookUpdateSubscriptionParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface WebhooksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WebhookCreateCrmSnapshotParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CrmObjectSnapshotBatchResponse>
     *
     * @throws APIException
     */
    public function createCrmSnapshot(
        array|WebhookCreateCrmSnapshotParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse1>
     *
     * @throws APIException
     */
    public function createJournalSubscription(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookCreateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function createSubscription(
        int $appID,
        array|WebhookCreateSubscriptionParams $params,
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
     * @param array<string,mixed>|WebhookCreateSubscriptionsBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriptionResponse>
     *
     * @throws APIException
     */
    public function createSubscriptionsBatch(
        int $appID,
        array|WebhookCreateSubscriptionsBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deletePortalSubscriptions(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookDeleteSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSubscription(
        int $subscriptionID,
        array|WebhookDeleteSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookGetEarliestJournalParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getEarliestJournal(
        array|WebhookGetEarliestJournalParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookGetEarliestLocalJournalParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getEarliestLocalJournal(
        array|WebhookGetEarliestLocalJournalParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookGetJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getJournalBatch(
        array|WebhookGetJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count Path param
     * @param array<string,mixed>|WebhookGetJournalBatchAfterOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getJournalBatchAfterOffset(
        int $count,
        array|WebhookGetJournalBatchAfterOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookGetLatestJournalParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLatestJournal(
        array|WebhookGetLatestJournalParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookGetLatestLocalJournalParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLatestLocalJournal(
        array|WebhookGetLatestLocalJournalParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookGetLocalJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalJournalBatch(
        array|WebhookGetLocalJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count Path param
     * @param array<string,mixed>|WebhookGetLocalJournalBatchAfterOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalJournalBatchAfterOffset(
        int $count,
        array|WebhookGetLocalJournalBatchAfterOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookGetNextJournalAfterOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getNextJournalAfterOffset(
        string $offset,
        array|WebhookGetNextJournalAfterOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookGetNextLocalJournalAfterOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getNextLocalJournalAfterOffset(
        string $offset,
        array|WebhookGetNextLocalJournalAfterOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|WebhookGetSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function getSubscription(
        int $subscriptionID,
        array|WebhookGetSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<FilterResponse>>
     *
     * @throws APIException
     */
    public function getSubscriptionFilters(
        int $subscriptionID,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionListResponse>
     *
     * @throws APIException
     */
    public function listSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
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

    /**
     * @api
     *
     * @param int $subscriptionID Path param
     * @param array<string,mixed>|WebhookUpdateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateSubscription(
        int $subscriptionID,
        array|WebhookUpdateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
