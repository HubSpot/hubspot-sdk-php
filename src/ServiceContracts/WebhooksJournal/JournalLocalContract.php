<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\SnapshotStatusResponse;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface JournalLocalContract
{
    /**
     * @api
     *
     * @param int $installPortalID The ID of the portal for which to retrieve the earliest webhook journal entries. This parameter is optional and should be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliest(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param int $installPortalID The unique identifier of the portal installation for which to retrieve the latest journal entries. This parameter is optional and should be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatest(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
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
    ): string;

    /**
     * @api
     *
     * @param string $statusID The unique identifier of the status to retrieve. It should be in UUID format.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse;
}
