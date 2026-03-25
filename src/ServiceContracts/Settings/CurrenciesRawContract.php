<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CurrenciesRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyCurrency>
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
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
    public function listCodes(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CurrencyUpdateCompanyCurrencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyCurrency>
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        array|CurrencyUpdateCompanyCurrencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
