<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Basic\BasicGetAvailabilityBySlugParams;
use HubspotSDK\Scheduler\Meetings\Basic\BasicGetBookingInfoBySlugParams;
use HubspotSDK\Scheduler\Meetings\Basic\BasicListParams;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalLinkMetadata;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
