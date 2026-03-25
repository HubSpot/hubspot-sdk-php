<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings\Currencies\ExchangeRates;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\Currencies\ExchangeRates\BatchRawContract;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubspotSDK\Settings\Currencies\ExchangeRates\Batch\BatchCreateParams;
use HubspotSDK\Settings\Currencies\ExchangeRates\Batch\BatchGetParams;
use HubspotSDK\Settings\Currencies\ExchangeRates\Batch\BatchUpdateParams;
use HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

/**
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
