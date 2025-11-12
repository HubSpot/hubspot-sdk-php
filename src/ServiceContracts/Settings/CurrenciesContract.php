<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateForwardPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyBatchCreateParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchGetParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchUpdateParams;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams;
use HubspotSDK\Settings\Currencies\ExchangeRate;

interface CurrenciesContract
{
    /**
     * @api
     *
     * @param array<mixed>|CurrencyBatchCreateParams $params
     *
     * @throws APIException
     */
    public function batchCreate(
        array|CurrencyBatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param array<mixed>|CurrencyBatchGetParams $params
     *
     * @throws APIException
     */
    public function batchGet(
        array|CurrencyBatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param array<mixed>|CurrencyBatchUpdateParams $params
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|CurrencyBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param array<mixed>|CurrencyCreateExchangeRateParams $params
     *
     * @throws APIException
     */
    public function createExchangeRate(
        array|CurrencyCreateExchangeRateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
        ?RequestOptions $requestOptions = null
    ): CompanyCurrency;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        ?RequestOptions $requestOptions = null
    ): ExchangeRate;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listCodes(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseCurrencyCodeInfoNoPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listCurrentExchangeRates(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseExchangeRateNoPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listExchangeRates(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseExchangeRateForwardPaging;

    /**
     * @api
     *
     * @param array<mixed>|CurrencyUpdateCompanyCurrencyParams $params
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        array|CurrencyUpdateCompanyCurrencyParams $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyCurrency;

    /**
     * @api
     *
     * @param array<mixed>|CurrencyUpdateExchangeRateParams $params
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        array|CurrencyUpdateExchangeRateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate;

    /**
     * @api
     *
     * @param array<mixed>|CurrencyUpdateVisibilityParams $params
     *
     * @throws APIException
     */
    public function updateVisibility(
        array|CurrencyUpdateVisibilityParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
