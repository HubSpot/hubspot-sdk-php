<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\JournalLocalRawContract;
use HubSpotSDK\SnapshotStatusResponse;
use HubSpotSDK\WebhooksJournal\JournalLocal\JournalLocalGetEarliestParams;
use HubSpotSDK\WebhooksJournal\JournalLocal\JournalLocalGetLatestParams;
use HubSpotSDK\WebhooksJournal\JournalLocal\JournalLocalGetNextFromOffsetParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class JournalLocalRawService implements JournalLocalRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the earliest webhook journal entries for the specified portal. This endpoint can be used to access the oldest records available in the webhook journal, which may be useful for auditing or historical analysis.
     *
     * @param array{installPortalID?: int}|JournalLocalGetEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getEarliest(
        array|JournalLocalGetEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JournalLocalGetEarliestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks-journal/journal-local/2026-03/earliest',
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events and their statuses, allowing you to monitor and debug webhook activity effectively.
     *
     * @param array{installPortalID?: int}|JournalLocalGetLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLatest(
        array|JournalLocalGetLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JournalLocalGetLatestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks-journal/journal/2026-03/latest',
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Retrieve the next set of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data, allowing you to continue from where a previous request left off.
     *
     * @param string $offset The starting point for retrieving the next set of webhook journal entries. This is a string value that represents the current position in the journal.
     * @param array{installPortalID?: int}|JournalLocalGetNextFromOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getNextFromOffset(
        string $offset,
        array|JournalLocalGetNextFromOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JournalLocalGetNextFromOffsetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/journal-local/2026-03/offset/%1$s/next', $offset,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Retrieve the status of a specific webhook journal entry using its unique status ID. This endpoint is useful for monitoring the progress or outcome of webhook journal entries, allowing you to check if an entry is pending, in progress, completed, failed, or expired.
     *
     * @param string $statusID The unique identifier of the status to retrieve. It should be in UUID format.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SnapshotStatusResponse>
     *
     * @throws APIException
     */
    public function getStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/journal-local/2026-03/status/%1$s', $statusID],
            options: $requestOptions,
            convert: SnapshotStatusResponse::class,
        );
    }
}
