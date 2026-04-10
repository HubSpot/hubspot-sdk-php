<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Scheduler\Meetings;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicGetAvailabilityBySlugParams;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicGetBookingInfoBySlugParams;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicListParams;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicListParams\Type;
use HubSpotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkMetadata;
use HubSpotSDK\ServiceContracts\Scheduler\Meetings\BasicRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BasicRawService implements BasicRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a paged list meeting scheduling pages
     *
     * @param array{
     *   after?: string,
     *   limit?: int,
     *   name?: string,
     *   organizerUserID?: string,
     *   type?: Type|value-of<Type>,
     * }|BasicListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExternalLinkMetadata>>
     *
     * @throws APIException
     */
    public function list(
        array|BasicListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BasicListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'scheduler/2026-03/meetings/meeting-links',
            query: Util::array_transform_keys(
                $parsed,
                ['organizerUserID' => 'organizerUserId']
            ),
            options: $options,
            convert: ExternalLinkMetadata::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Get the next availability times for a meeting page.
     *
     * @param array{
     *   timezone: string, monthOffset?: int
     * }|BasicGetAvailabilityBySlugParams $params
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
    ): BaseResponse {
        [$parsed, $options] = BasicGetAvailabilityBySlugParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'scheduler/2026-03/meetings/meeting-links/book/availability-page/%1$s',
                $slug,
            ],
            query: $parsed,
            options: $options,
            convert: ExternalLinkAvailabilityAndBusyTimes::class,
        );
    }

    /**
     * @api
     *
     * Get details about the initial information necessary for a meeting scheduler.
     *
     * @param array{timezone: string}|BasicGetBookingInfoBySlugParams $params
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
    ): BaseResponse {
        [$parsed, $options] = BasicGetBookingInfoBySlugParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['scheduler/2026-03/meetings/meeting-links/book/%1$s', $slug],
            query: $parsed,
            options: $options,
            convert: ExternalBookingInfo::class,
        );
    }
}
