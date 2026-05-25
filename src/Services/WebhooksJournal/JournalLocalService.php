<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\JournalLocalContract;
use HubSpotSDK\Services\WebhooksJournal\JournalLocal\BatchService;
use HubSpotSDK\SnapshotStatusResponse;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class JournalLocalService implements JournalLocalContract
{
    /**
     * @api
     */
    public JournalLocalRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new JournalLocalRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Retrieve the earliest webhook journal entries for the specified portal. This endpoint can be used to access the oldest records available in the webhook journal, which may be useful for auditing or historical analysis.
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the earliest webhook journal entries. This parameter is optional and should be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliest(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events and their statuses, allowing you to monitor and debug webhook activity effectively.
     *
     * @param int $installPortalID The unique identifier of the portal installation for which to retrieve the latest journal entries. This parameter is optional and should be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatest(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLatest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the next set of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data, allowing you to continue from where a previous request left off.
     *
     * @param string $offset The starting point for retrieving the next set of webhook journal entries. This is a string value that represents the current position in the journal.
     * @param int $installPortalID The ID of the portal installation to filter the webhook journal entries. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNextFromOffset(
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getNextFromOffset($offset, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the status of a specific webhook journal entry using its unique status ID. This endpoint is useful for monitoring the progress or outcome of webhook journal entries, allowing you to check if an entry is pending, in progress, completed, failed, or expired.
     *
     * @param string $statusID The unique identifier of the status to retrieve. It should be in UUID format.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStatus($statusID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
