<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks\WebhookSubscriptions;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchGetEarliestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchGetLatestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchGetLocalEarliestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchGetLocalLatestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchGetLocalNextParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchGetLocalParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchGetNextParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchGetParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\Batch\BatchUpdateSubscriptionsParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\BatchResponseJournalFetchResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\BatchResponseSubscriptionResponse;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getEarliest(
        int $count,
        array|BatchGetEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLatest(
        int $count,
        array|BatchGetLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetLocalParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocal(
        array|BatchGetLocalParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetLocalEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalEarliest(
        int $count,
        array|BatchGetLocalEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetLocalLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalLatest(
        int $count,
        array|BatchGetLocalLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count Path param
     * @param array<string,mixed>|BatchGetLocalNextParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalNext(
        int $count,
        array|BatchGetLocalNextParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count Path param
     * @param array<string,mixed>|BatchGetNextParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getNext(
        int $count,
        array|BatchGetNextParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateSubscriptionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateSubscriptions(
        int $appID,
        array|BatchUpdateSubscriptionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
