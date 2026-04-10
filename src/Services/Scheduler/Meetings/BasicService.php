<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Scheduler\Meetings;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicListParams\Type;
use HubSpotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkMetadata;
use HubSpotSDK\ServiceContracts\Scheduler\Meetings\BasicContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BasicService implements BasicContract
{
    /**
     * @api
     */
    public BasicRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BasicRawService($client);
    }

    /**
     * @api
     *
     * Get a paged list meeting scheduling pages
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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'limit' => $limit,
                'name' => $name,
                'organizerUserID' => $organizerUserID,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the next availability times for a meeting page.
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
    ): ExternalLinkAvailabilityAndBusyTimes {
        $params = Util::removeNulls(
            ['timezone' => $timezone, 'monthOffset' => $monthOffset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAvailabilityBySlug($slug, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get details about the initial information necessary for a meeting scheduler.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        string $timezone,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalBookingInfo {
        $params = Util::removeNulls(['timezone' => $timezone]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBookingInfoBySlug($slug, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
