<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\WebhookSubscriptions\CollectionResponseSubscriptionResponseNoPaging;
use HubspotSDK\Webhooks\WebhookSubscriptions\CrmObjectSnapshotBatchResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\FilterCreateResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\FilterResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SettingsResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SnapshotStatusResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SubscriptionListResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SubscriptionResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SubscriptionResponse1;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateCrmSnapshotParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateSubscriptionFilterParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateSubscriptionParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionDeleteSubscriptionParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetJournalEarliestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetJournalLatestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetJournalNextByOffsetParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetLocalJournalEarliestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetLocalJournalLatestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetLocalJournalNextByOffsetParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetSubscriptionParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionUpdateSettingsParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionUpdateSubscriptionParams;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface WebhookSubscriptionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WebhookSubscriptionCreateCrmSnapshotParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CrmObjectSnapshotBatchResponse>
     *
     * @throws APIException
     */
    public function createCrmSnapshot(
        array|WebhookSubscriptionCreateCrmSnapshotParams $params,
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
     * @param array<string,mixed>|WebhookSubscriptionCreateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function createSubscription(
        int $appID,
        array|WebhookSubscriptionCreateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookSubscriptionCreateSubscriptionFilterParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterCreateResponse>
     *
     * @throws APIException
     */
    public function createSubscriptionFilter(
        array|WebhookSubscriptionCreateSubscriptionFilterParams $params,
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
     * @param array<string,mixed>|WebhookSubscriptionDeleteSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSubscription(
        int $subscriptionID,
        array|WebhookSubscriptionDeleteSubscriptionParams $params,
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
     * @param array<string,mixed>|WebhookSubscriptionGetJournalEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalEarliest(
        array|WebhookSubscriptionGetJournalEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookSubscriptionGetJournalLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalLatest(
        array|WebhookSubscriptionGetJournalLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookSubscriptionGetJournalNextByOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalNextByOffset(
        string $offset,
        array|WebhookSubscriptionGetJournalNextByOffsetParams $params,
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
     * @param array<string,mixed>|WebhookSubscriptionGetLocalJournalEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalEarliest(
        array|WebhookSubscriptionGetLocalJournalEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookSubscriptionGetLocalJournalLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalLatest(
        array|WebhookSubscriptionGetLocalJournalLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebhookSubscriptionGetLocalJournalNextByOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalNextByOffset(
        string $offset,
        array|WebhookSubscriptionGetLocalJournalNextByOffsetParams $params,
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
     * @param array<string,mixed>|WebhookSubscriptionGetSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function getSubscription(
        int $subscriptionID,
        array|WebhookSubscriptionGetSubscriptionParams $params,
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
    public function getSubscriptionFilterForSubscription(
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
     * @param array<string,mixed>|WebhookSubscriptionUpdateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        array|WebhookSubscriptionUpdateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $subscriptionID Path param
     * @param array<string,mixed>|WebhookSubscriptionUpdateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateSubscription(
        int $subscriptionID,
        array|WebhookSubscriptionUpdateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
