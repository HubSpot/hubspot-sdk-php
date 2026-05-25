<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal\JournalLocal;

use HubSpotSDK\BatchResponseJournalFetchResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\JournalLocal\BatchRawContract;
use HubSpotSDK\WebhooksJournal\JournalLocal\Batch\BatchGetEarliestParams;
use HubSpotSDK\WebhooksJournal\JournalLocal\Batch\BatchGetFromOffsetParams;
use HubSpotSDK\WebhooksJournal\JournalLocal\Batch\BatchGetParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Execute a batch read operation on the webhooks journal. This endpoint allows you to retrieve a batch of webhook journal entries by providing the necessary input data. It is useful for processing multiple records in a single request, streamlining data retrieval tasks.
     *
     * @param array{inputs: list<string>, installPortalID?: int}|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['installPortalID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/journal-local/2026-03/batch/read',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['installPortalID' => 'installPortalId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the earliest batch of webhook journal entries. This endpoint is useful for accessing the oldest available data in the webhook journal, allowing users to process or analyze historical webhook events. The number of entries to fetch is specified by the 'count' path parameter.
     *
     * @param int $count The number of earliest webhook journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param array{installPortalID?: int}|BatchGetEarliestParams $params
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
    ): BaseResponse {
        [$parsed, $options] = BatchGetEarliestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/journal-local/2026-03/batch/earliest/%1$s', $count,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data. The number of entries returned is determined by the 'count' parameter.
     *
     * @param int $count Path param: The number of journal entries to retrieve in this batch. Must be an integer with a minimum value of 1.
     * @param array{
     *   offset: string, installPortalID?: int
     * }|BatchGetFromOffsetParams $params
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
    ): BaseResponse {
        [$parsed, $options] = BatchGetFromOffsetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $offset = $parsed['offset'];
        unset($parsed['offset']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/journal-local/2026-03/batch/%1$s/next/%2$s',
                $offset,
                $count,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }
}
