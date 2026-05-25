<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal\Subscriptions;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Filter;
use HubSpotSDK\FilterCreateResponse;
use HubSpotSDK\FilterResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\Subscriptions\FiltersContract;

/**
 * @phpstan-import-type FilterShape from \HubSpotSDK\Filter
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class FiltersService implements FiltersContract
{
    /**
     * @api
     */
    public FiltersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FiltersRawService($client);
    }

    /**
     * @api
     *
     * Create a new filter for a specific webhook subscription in the HubSpot account. This endpoint allows you to define conditions that determine when a webhook should be triggered. The filter is associated with a subscription identified by its ID, and the request must include the filter details.
     *
     * @param Filter|FilterShape $filter defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against
     * @param int $subscriptionID The unique identifier of the subscription to which the filter will be applied. It is an integer formatted as int64.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Filter|array $filter,
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): FilterCreateResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'subscriptionID' => $subscriptionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the filters associated with a specific webhook subscription. This endpoint allows you to view the filters applied to a subscription, which can help in managing and understanding the conditions set for webhook events.
     *
     * @param int $subscriptionID The unique identifier of the subscription for which to retrieve filters. This is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @return list<FilterResponse>
     *
     * @throws APIException
     */
    public function list(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove a specific filter from the webhooks journal subscriptions. This operation is useful for managing and cleaning up filters that are no longer needed. Once deleted, the filter cannot be recovered.
     *
     * @param int $filterID the unique identifier of the filter to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($filterID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific filter associated with a webhook journal subscription. This endpoint allows you to access the details of the filter identified by the filterId, which is useful for managing and understanding the conditions applied to webhook events.
     *
     * @param int $filterID The unique identifier of the filter to retrieve. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): FilterResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($filterID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
