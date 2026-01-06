<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings\Currencies;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\CentralExchangeRatesInformation;
use HubspotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\ExchangeRate;

interface CentralFxRatesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CentralFxRateCreateCurrencyParams $params
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function createCurrency(
        array|CentralFxRateCreateCurrencyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CentralExchangeRatesInformation>
     *
     * @throws APIException
     */
    public function getInformation(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CollectionResponseCurrencyCodeInfoNoPaging>
     *
     * @throws APIException
     */
    public function getUnsupportedCurrencies(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
