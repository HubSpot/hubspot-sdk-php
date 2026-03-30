<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks\Webhooks;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\Webhooks\BatchResponseJournalFetchResponse;
use HubspotSDK\Webhooks\Webhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionBatchUpdateRequest;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\Webhooks\Webhooks\SubscriptionBatchUpdateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the target app
     * @param list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSubscriptionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliest(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatest(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $count Path param
     * @param string $offset Path param
     * @param int $installPortalID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNext(
        int $count,
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function read(
        array $inputs,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;
}
