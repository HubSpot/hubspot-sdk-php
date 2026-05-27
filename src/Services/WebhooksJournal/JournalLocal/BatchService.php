<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal\JournalLocal;

use HubSpotSDK\BatchResponseJournalFetchResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\JournalLocal\BatchContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Execute a batch read operation on the webhooks journal. This endpoint allows you to retrieve a batch of webhook journal entries by providing the necessary input data. It is useful for processing multiple records in a single request, streamlining data retrieval tasks.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param: The ID of the portal where the webhooks are installed. This parameter is optional and is used to specify the target portal for the operation.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['inputs' => $inputs, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the earliest batch of webhook journal entries. This endpoint is useful for accessing the oldest available data in the webhook journal, allowing users to process or analyze historical webhook events. The number of entries to fetch is specified by the 'count' path parameter.
     *
     * @param int $count The number of earliest webhook journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation to filter the webhook journal entries. This is an optional integer parameter.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliest(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliest($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data. The number of entries returned is determined by the 'count' parameter.
     *
     * @param int $count Path param: The number of journal entries to retrieve in this batch. Must be an integer with a minimum value of 1.
     * @param string $offset path param: The starting point for the batch retrieval, specified as a string
     * @param int $installPortalID Query param: The ID of the portal where the webhooks are installed. This is an optional parameter.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getFromOffset(
        int $count,
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['offset' => $offset, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getFromOffset($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
