<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal\Journal;

use HubSpotSDK\BatchResponseJournalFetchResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\Journal\BatchRawContract;
use HubSpotSDK\WebhooksJournal\Journal\Batch\BatchGetEarliestParams;
use HubSpotSDK\WebhooksJournal\Journal\Batch\BatchGetFromOffsetParams;
use HubSpotSDK\WebhooksJournal\Journal\Batch\BatchGetLatestParams;
use HubSpotSDK\WebhooksJournal\Journal\Batch\BatchGetParams;

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
     * Execute a batch read operation on the webhooks journal for the specified date, 2026-03. This endpoint allows you to retrieve multiple entries from the webhooks journal in a single request, which can be useful for processing large amounts of data efficiently. Ensure that the request body is provided in the required format.
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
            path: 'webhooks-journal/journal/2026-03/batch/read',
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
     * Retrieve the earliest batch of webhook journal entries for a specified count. This endpoint is useful for accessing historical webhook data in batches, allowing you to process or analyze older entries. The number of entries retrieved is determined by the count parameter.
     *
     * @param int $count The number of earliest journal entries to retrieve. This must be an integer with a minimum value of 1.
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
            path: ['webhooks-journal/journal/2026-03/batch/earliest/%1$s', $count],
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
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint allows you to fetch a defined number of entries, which can be useful for processing large datasets in manageable chunks.
     *
     * @param int $count Path param: The number of journal entries to retrieve. This must be an integer with a minimum value of 1.
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
                'webhooks-journal/journal/2026-03/batch/%1$s/next/%2$s', $offset, $count,
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
     * Retrieve the latest batch of webhook journal entries up to the specified count. This endpoint is useful for fetching recent webhook data for analysis or processing. The count parameter determines the maximum number of entries to return.
     *
     * @param int $count The maximum number of journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param array{installPortalID?: int}|BatchGetLatestParams $params
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
    ): BaseResponse {
        [$parsed, $options] = BatchGetLatestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/journal/2026-03/batch/latest/%1$s', $count],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }
}
