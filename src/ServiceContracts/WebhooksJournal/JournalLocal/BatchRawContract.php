<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal\JournalLocal;

use HubSpotSDK\BatchResponseJournalFetchResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\WebhooksJournal\JournalLocal\Batch\BatchGetEarliestParams;
use HubSpotSDK\WebhooksJournal\JournalLocal\Batch\BatchGetFromOffsetParams;
use HubSpotSDK\WebhooksJournal\JournalLocal\Batch\BatchGetParams;

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
     * @param int $count The number of earliest webhook journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
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
     * @param int $count Path param: The number of journal entries to retrieve in this batch. Must be an integer with a minimum value of 1.
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
}
