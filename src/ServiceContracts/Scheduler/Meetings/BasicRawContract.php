<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Scheduler\Meetings;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicGetAvailabilityBySlugParams;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicGetBookingInfoBySlugParams;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicListParams;
use HubSpotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkMetadata;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BasicRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BasicListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExternalLinkMetadata>>
     *
     * @throws APIException
     */
    public function list(
        array|BasicListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BasicGetAvailabilityBySlugParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalLinkAvailabilityAndBusyTimes>
     *
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        array|BasicGetAvailabilityBySlugParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BasicGetBookingInfoBySlugParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalBookingInfo>
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        array|BasicGetBookingInfoBySlugParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
