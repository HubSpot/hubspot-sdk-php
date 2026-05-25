<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal\Subscriptions;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Conversion\ListOf;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Filter;
use HubSpotSDK\FilterCreateResponse;
use HubSpotSDK\FilterResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\Subscriptions\FiltersRawContract;
use HubSpotSDK\WebhooksJournal\Subscriptions\Filters\FilterCreateParams;

/**
 * @phpstan-import-type FilterShape from \HubSpotSDK\Filter
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class FiltersRawService implements FiltersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new filter for a specific webhook subscription in the HubSpot account. This endpoint allows you to define conditions that determine when a webhook should be triggered. The filter is associated with a subscription identified by its ID, and the request must include the filter details.
     *
     * @param array{
     *   filter: Filter|FilterShape, subscriptionID: int
     * }|FilterCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FilterCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FilterCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/subscriptions/2026-03/filters',
            body: (object) $parsed,
            options: $options,
            convert: FilterCreateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the filters associated with a specific webhook subscription. This endpoint allows you to view the filters applied to a subscription, which can help in managing and understanding the conditions set for webhook events.
     *
     * @param int $subscriptionID The unique identifier of the subscription for which to retrieve filters. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<FilterResponse>>
     *
     * @throws APIException
     */
    public function list(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/subscriptions/2026-03/filters/subscription/%1$s',
                $subscriptionID,
            ],
            options: $requestOptions,
            convert: new ListOf(FilterResponse::class),
        );
    }

    /**
     * @api
     *
     * Remove a specific filter from the webhooks journal subscriptions. This operation is useful for managing and cleaning up filters that are no longer needed. Once deleted, the filter cannot be recovered.
     *
     * @param int $filterID the unique identifier of the filter to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['webhooks-journal/subscriptions/2026-03/filters/%1$s', $filterID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific filter associated with a webhook journal subscription. This endpoint allows you to access the details of the filter identified by the filterId, which is useful for managing and understanding the conditions applied to webhook events.
     *
     * @param int $filterID The unique identifier of the filter to retrieve. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterResponse>
     *
     * @throws APIException
     */
    public function get(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/subscriptions/2026-03/filters/%1$s', $filterID],
            options: $requestOptions,
            convert: FilterResponse::class,
        );
    }
}
