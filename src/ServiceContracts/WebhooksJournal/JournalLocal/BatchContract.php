<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal\JournalLocal;

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
     * @param int $installPortalID Query param: The ID of the portal where the webhooks are installed. This parameter is optional and is used to specify the target portal for the operation.
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
    ): BatchResponseJournalFetchResponse;

    /**
     * @api
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
    ): BatchResponseJournalFetchResponse;
}
