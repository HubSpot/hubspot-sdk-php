<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Settings\Currencies\ExchangeRates;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\PublicObjectID;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Settings\Currencies\ExchangeRates\BatchContract;
use HubSpotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubSpotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubSpotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

/**
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubSpotSDK\Settings\Currencies\ExchangeRateCreateRequest
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubSpotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Create multiple exchange rates in a single request.
     *
     * @param list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the conversion rates for multiple exchange rates in a batch operation.
     *
     * @param list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details of multiple exchange rates in a single request, specified by their IDs.
     *
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs An array of deal split inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
