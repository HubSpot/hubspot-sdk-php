<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyBatchCreateParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchGetParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchUpdateParams;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams;
use HubspotSDK\Settings\Currencies\ExchangeRate;

interface CurrenciesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CurrencyBatchCreateParams $params
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function batchCreate(
        array|CurrencyBatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CurrencyBatchGetParams $params
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function batchGet(
        array|CurrencyBatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CurrencyBatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|CurrencyBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CurrencyCreateExchangeRateParams $params
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function createExchangeRate(
        array|CurrencyCreateExchangeRateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CompanyCurrency>
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $exchangeRateID the ID of the exchange rate to retrieve
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CollectionResponseCurrencyCodeInfoNoPaging>
     *
     * @throws APIException
     */
    public function listCodes(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CollectionResponseExchangeRateNoPaging>
     *
     * @throws APIException
     */
    public function listCurrentExchangeRates(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CurrencyListExchangeRatesParams $params
     *
     * @return BaseResponse<Page<ExchangeRate>>
     *
     * @throws APIException
     */
    public function listExchangeRates(
        array|CurrencyListExchangeRatesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CurrencyUpdateCompanyCurrencyParams $params
     *
     * @return BaseResponse<CompanyCurrency>
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        array|CurrencyUpdateCompanyCurrencyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $exchangeRateID the unique identifier of the exchange rate to be updated
     * @param array<string,mixed>|CurrencyUpdateExchangeRateParams $params
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        array|CurrencyUpdateExchangeRateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CurrencyUpdateVisibilityParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateVisibility(
        array|CurrencyUpdateVisibilityParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
