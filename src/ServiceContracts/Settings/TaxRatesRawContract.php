<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\TaxRates\PublicTaxRateGroup;
use HubspotSDK\Settings\TaxRates\TaxRateListParams;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TaxRatesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TaxRateListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicTaxRateGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|TaxRateListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicTaxRateGroup>
     *
     * @throws APIException
     */
    public function get(
        string $taxRateGroupID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
