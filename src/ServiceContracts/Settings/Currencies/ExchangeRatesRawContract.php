<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings\Currencies;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateCreateExchangeRateParams;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateExchangeRateParams;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
