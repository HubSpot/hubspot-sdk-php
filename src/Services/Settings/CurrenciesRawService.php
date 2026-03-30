<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\CurrenciesRawContract;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CurrenciesRawService implements CurrenciesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the details for the company currency. The company currency is used in deal totals, reports, and the default currency for new deals.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyCurrency>
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/currencies/2026-03/company-currency',
            options: $requestOptions,
            convert: CompanyCurrency::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of all available currency codes and their names.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseCurrencyCodeInfoNoPaging>
     *
     * @throws APIException
     */
    public function listCodes(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/currencies/2026-03/codes',
            options: $requestOptions,
            convert: CollectionResponseCurrencyCodeInfoNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Set or update the primary company currency.
     *
     * @param array{
     *   currencyCode: value-of<CurrencyCode>
     * }|CurrencyUpdateCompanyCurrencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyCurrency>
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        array|CurrencyUpdateCompanyCurrencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyUpdateCompanyCurrencyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'settings/currencies/2026-03/company-currency',
            body: (object) $parsed,
            options: $options,
            convert: CompanyCurrency::class,
        );
    }
}
