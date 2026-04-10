<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubSpotSDK\Settings\Currencies\CompanyCurrency;
use HubSpotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CurrenciesContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
        RequestOptions|array|null $requestOptions = null
    ): CompanyCurrency;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCodes(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseCurrencyCodeInfoNoPaging;

    /**
     * @api
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode The three-letter code representing a specific currency (ex. USD).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        CurrencyCode|string $currencyCode,
        RequestOptions|array|null $requestOptions = null,
    ): CompanyCurrency;
}
