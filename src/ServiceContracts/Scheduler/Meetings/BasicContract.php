<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Scheduler\Meetings;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicListParams\Type;
use HubSpotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkMetadata;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BasicContract
{
    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param Type|value-of<Type> $type
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ExternalLinkMetadata>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?string $organizerUserID = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        string $timezone,
        ?int $monthOffset = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalLinkAvailabilityAndBusyTimes;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        string $timezone,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalBookingInfo;
}
