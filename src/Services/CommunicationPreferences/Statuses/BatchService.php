<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CommunicationPreferences\Statuses;

use HubspotSDK\Client;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicStatus;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicStatusBulkResponse;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;
use HubspotSDK\CommunicationPreferences\PublicStatusRequest;
use HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams\Channel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CommunicationPreferences\Statuses\BatchContract;

/**
 * @phpstan-import-type PublicStatusRequestShape from \HubspotSDK\CommunicationPreferences\PublicStatusRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Retrieve the unsubscribe-all status for a batch of subscribers in a specified channel. This endpoint is useful for checking the current unsubscribe-all status of multiple subscribers at once, helping to manage and audit communication preferences efficiently.
     *
     * @param Channel|value-of<Channel> $channel Query param: The communication channel to check the unsubscribe-all status for. Currently, only 'EMAIL' is supported. This parameter is required.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: The ID of the business unit for which the statuses are being retrieved. This is an optional parameter.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatuses(
        Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicWideStatusBulkResponse {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'inputs' => $inputs,
                'businessUnitID' => $businessUnitID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getUnsubscribeAllStatuses(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the subscription statuses for multiple subscribers in a batch operation. This endpoint allows you to check the communication preferences of several subscribers at once, which is useful for managing large lists of contacts efficiently.
     *
     * @param \HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel> $channel Query param: The communication channel to filter by. This parameter is required and currently only supports 'EMAIL'.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: An optional identifier for the business unit. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function read(
        \HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicStatusBulkResponse {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'inputs' => $inputs,
                'businessUnitID' => $businessUnitID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->read(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unsubscribe a set of contacts from all email subscriptions.
     *
     * @param \HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel> $channel Query param: A required string specifying the communication channel. Currently, only 'EMAIL' is supported.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: The ID of the business unit to which the operation applies. It is an optional parameter.
     * @param bool $verbose Query param: A boolean indicating whether to include detailed information in the response. Defaults to false.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        \HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null,
        bool $verbose = false,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicBulkOptOutFromAllResponse {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'inputs' => $inputs,
                'businessUnitID' => $businessUnitID,
                'verbose' => $verbose,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unsubscribeAll(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the subscription status for a set of contacts.
     *
     * @param list<PublicStatusRequest|PublicStatusRequestShape> $inputs An array of PublicStatusRequest objects, each representing a subscription status update request. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStatuses(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponsePublicStatus {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateStatuses(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
