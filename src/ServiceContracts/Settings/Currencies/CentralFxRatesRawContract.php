<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings\Currencies;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\Currencies\CentralExchangeRatesInformation;
use HubSpotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams;
use HubSpotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubSpotSDK\Settings\Currencies\ExchangeRate;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CentralFxRatesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CentralFxRateCreateCurrencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function createCurrency(
        array|CentralFxRateCreateCurrencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CentralExchangeRatesInformation>
     *
     * @throws APIException
     */
    public function getInformation(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseCurrencyCodeInfoNoPaging>
     *
     * @throws APIException
     */
    public function getUnsupportedCurrencies(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
