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
     * Checks whether a set of contacts have opted out of all communications.
     *
     * @param Channel|value-of<Channel> $channel Query param
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param
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
     * @param \HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel> $channel Query param
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param
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
     * @param \HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel> $channel Query param
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param
     * @param bool $verbose Query param
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
