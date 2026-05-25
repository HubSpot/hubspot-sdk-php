<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal\Subscriptions;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\FilterCreateResponse;
use HubSpotSDK\FilterResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\WebhooksJournal\Subscriptions\Filters\FilterCreateParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface FiltersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FilterCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FilterCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
