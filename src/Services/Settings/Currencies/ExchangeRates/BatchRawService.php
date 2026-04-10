<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Settings\Currencies\ExchangeRates;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\PublicObjectID;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Settings\Currencies\ExchangeRates\BatchRawContract;
use HubSpotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubSpotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubSpotSDK\Settings\Currencies\ExchangeRates\Batch\BatchCreateParams;
use HubSpotSDK\Settings\Currencies\ExchangeRates\Batch\BatchGetParams;
use HubSpotSDK\Settings\Currencies\ExchangeRates\Batch\BatchUpdateParams;
use HubSpotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

/**
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubSpotSDK\Settings\Currencies\ExchangeRateCreateRequest
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubSpotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create multiple exchange rates in a single request.
     *
     * @param array{
     *   inputs: list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape>
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/currencies/2026-03/exchange-rates/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Update the conversion rates for multiple exchange rates in a batch operation.
     *
     * @param array{
     *   inputs: list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape>
     * }|BatchUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/currencies/2026-03/exchange-rates/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the details of multiple exchange rates in a single request, specified by their IDs.
     *
     * @param array{
     *   inputs: list<PublicObjectID|PublicObjectIDShape>
     * }|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/currencies/2026-03/exchange-rates/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );
    }
}
