<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal\Journal;

use HubSpotSDK\BatchResponseJournalFetchResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID query param: An integer representing the ID of the portal installation for which the webhooks journal data should be retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $count The number of earliest journal entries to retrieve. This must be an integer with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation. This is an integer value that specifies which portal's data to access.
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
     * @param int $count Path param: The number of journal entries to retrieve. This must be an integer with a minimum value of 1.
     * @param string $offset Path param: The starting point for fetching the journal entries. This is a string value.
     * @param int $installPortalID Query param: The ID of the portal installation. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getFromOffset(
        int $count,
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
     *
     * @param int $count The maximum number of journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param int $installPortalID The ID of the portal installation. This is an integer value used to specify the portal context for the request.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatest(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse;
}
