<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\TaxRates\PublicTaxRateGroup;
use HubspotSDK\Settings\TaxRates\TaxRateListParams;

interface TaxRatesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TaxRateListParams $params
     *
     * @return BaseResponse<Page<PublicTaxRateGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|TaxRateListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $taxRateGroupID the ID of the tax rate to retrieve
     *
     * @return BaseResponse<PublicTaxRateGroup>
     *
     * @throws APIException
     */
    public function get(
        string $taxRateGroupID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
