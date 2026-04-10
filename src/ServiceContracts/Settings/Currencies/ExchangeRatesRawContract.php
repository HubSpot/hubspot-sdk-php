<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings\Currencies;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubSpotSDK\Settings\Currencies\ExchangeRate;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateCreateExchangeRateParams;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateExchangeRateParams;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ExchangeRatesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ExchangeRateCreateExchangeRateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function createExchangeRate(
        array|ExchangeRateCreateExchangeRateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseExchangeRateNoPaging>
     *
     * @throws APIException
     */
    public function listCurrentExchangeRates(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ExchangeRateListExchangeRatesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExchangeRate>>
     *
     * @throws APIException
     */
    public function listExchangeRates(
        array|ExchangeRateListExchangeRatesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ExchangeRateUpdateExchangeRateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        array|ExchangeRateUpdateExchangeRateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ExchangeRateUpdateVisibilityParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateVisibility(
        array|ExchangeRateUpdateVisibilityParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
