<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks\Webhooks;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\Webhooks\Batch\BatchCreateParams;
use HubspotSDK\Webhooks\Webhooks\Batch\BatchGetEarliestParams;
use HubspotSDK\Webhooks\Webhooks\Batch\BatchGetLatestParams;
use HubspotSDK\Webhooks\Webhooks\Batch\BatchGetNextParams;
use HubspotSDK\Webhooks\Webhooks\Batch\BatchReadParams;
use HubspotSDK\Webhooks\Webhooks\BatchResponseJournalFetchResponse;
use HubspotSDK\Webhooks\Webhooks\BatchResponseSubscriptionResponse;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the target app
     * @param array<string,mixed>|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriptionResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|BatchCreateParams $params,
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
     * @param array<string,mixed>|BatchReadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function read(
        array|BatchReadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
