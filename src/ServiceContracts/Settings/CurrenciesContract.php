<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateForwardPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\ToCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

use const HubspotSDK\Core\OMIT as omit;

interface CurrenciesContract
{
    /**
     * @api
     *
     * @param list<ExchangeRateCreateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchCreate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param list<PublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function batchGet(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchGetRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param list<ExchangeRateUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchUpdate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpdateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param float $conversionRate
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     * @param \DateTimeInterface $effectiveAt
     *
     * @throws APIException
     */
    public function createExchangeRate(
        $conversionRate,
        $fromCurrencyCode,
        $effectiveAt = omit,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createExchangeRateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        $currencyCode,
        ?RequestOptions $requestOptions = null
    ): CompanyCurrency;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateCompanyCurrencyRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CompanyCurrency;

    /**
     * @api
     *
     * @param float $conversionRate
     * @param \DateTimeInterface $effectiveAt
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        $conversionRate,
        $effectiveAt = omit,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateExchangeRateRaw(
        string $exchangeRateID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate;

    /**
     * @api
     *
     * @param \HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\FromCurrencyCode|value-of<\HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\FromCurrencyCode> $fromCurrencyCode
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     * @param bool $visibleInUi
     *
     * @throws APIException
     */
    public function updateVisibility(
        $fromCurrencyCode,
        $toCurrencyCode,
        $visibleInUi,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateVisibilityRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
