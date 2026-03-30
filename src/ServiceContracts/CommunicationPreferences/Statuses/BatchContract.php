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
    ): BatchResponsePublicStatusBulkResponse;

    /**
     * @api
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
