<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\CommunicationPreferences\Statuses;

use HubSpotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatus;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\PublicStatusRequest;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams\Channel;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicStatusRequestShape from \HubSpotSDK\CommunicationPreferences\PublicStatusRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
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
    ): BatchResponsePublicWideStatusBulkResponse;

    /**
     * @api
     *
     * @param \HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel|value-of<\HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel> $channel Query param
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function read(
        \HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicStatusBulkResponse;

    /**
     * @api
     *
     * @param \HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel|value-of<\HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel> $channel Query param
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param
     * @param bool $verbose Query param
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
