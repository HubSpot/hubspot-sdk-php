<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CommunicationPreferences\Statuses;

use HubspotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicStatus;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicStatusBulkResponse;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;
use HubspotSDK\CommunicationPreferences\PublicStatusRequest;
use HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams\Channel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicStatusRequestShape from \HubspotSDK\CommunicationPreferences\PublicStatusRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
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
    ): BatchResponsePublicWideStatusBulkResponse;

    /**
     * @api
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
    ): BatchResponsePublicStatusBulkResponse;

    /**
     * @api
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
    ): BatchResponsePublicBulkOptOutFromAllResponse;

    /**
     * @api
     *
     * @param list<PublicStatusRequest|PublicStatusRequestShape> $inputs An array of PublicStatusRequest objects, each representing a subscription status update request. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStatuses(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponsePublicStatus;
}
