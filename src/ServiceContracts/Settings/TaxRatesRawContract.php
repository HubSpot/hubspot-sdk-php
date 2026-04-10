<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\TaxRates\PublicTaxRateGroup;
use HubSpotSDK\Settings\TaxRates\TaxRateListParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
