<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal\Journal;

use HubSpotSDK\BatchResponseJournalFetchResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\WebhooksJournal\Journal\Batch\BatchGetEarliestParams;
use HubSpotSDK\WebhooksJournal\Journal\Batch\BatchGetFromOffsetParams;
use HubSpotSDK\WebhooksJournal\Journal\Batch\BatchGetLatestParams;
use HubSpotSDK\WebhooksJournal\Journal\Batch\BatchGetParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @param int $count The number of earliest journal entries to retrieve. This must be an integer with a minimum value of 1.
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
     * @param int $count Path param: The number of journal entries to retrieve. This must be an integer with a minimum value of 1.
     * @param array<string,mixed>|BatchGetFromOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getFromOffset(
        int $count,
        array|BatchGetFromOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $count The maximum number of journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
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
}
