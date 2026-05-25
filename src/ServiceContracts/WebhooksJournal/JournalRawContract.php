<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\SnapshotStatusResponse;
use HubSpotSDK\WebhooksJournal\Journal\JournalGetEarliestParams;
use HubSpotSDK\WebhooksJournal\Journal\JournalGetNextFromOffsetParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface JournalRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|JournalGetEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getEarliest(
        array|JournalGetEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $offset the offset string indicating the starting point for retrieving the next set of journal entries
     * @param array<string,mixed>|JournalGetNextFromOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getNextFromOffset(
        string $offset,
        array|JournalGetNextFromOffsetParams $params,
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
    public function getStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
