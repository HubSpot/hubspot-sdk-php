<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\CommunicationPreferences\Statuses;

use HubSpotSDK\Client;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatus;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\PublicStatusRequest;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams\Channel;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\CommunicationPreferences\Statuses\BatchContract;

/**
 * @phpstan-import-type PublicStatusRequestShape from \HubSpotSDK\CommunicationPreferences\PublicStatusRequest
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
     * Checks whether a set of contacts have opted out of all communications.
     *
     * @param Channel|value-of<Channel> $channel Query param: The communication channel to filter the unsubscribe statuses. This parameter is required and currently supports 'EMAIL' as a valid value.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: The ID of the business unit to filter the results. This is an optional parameter.
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
     * Batch retrieve subscription statuses for a set of contacts.
     *
     * @param \HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel|value-of<\HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel> $channel Query param: The communication channel to filter the subscription statuses. Must be 'EMAIL'.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: An optional integer representing the business unit ID. This parameter helps to filter the results based on the specific business unit.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function read(
        \HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel|string $channel,
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
     * @param \HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel|value-of<\HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel> $channel Query param: The communication channel from which subscribers will be unsubscribed. This parameter is required and currently supports only 'EMAIL'.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID query param: An optional integer representing the business unit ID for which the operation is being performed
     * @param bool $verbose Query param: A boolean indicating whether to include detailed information in the response. Defaults to false.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        \HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel|string $channel,
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
