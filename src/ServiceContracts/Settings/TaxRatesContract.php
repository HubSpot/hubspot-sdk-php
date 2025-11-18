<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\TaxRates\PublicTaxRateGroup;
use HubspotSDK\Settings\TaxRates\TaxRateListParams;

interface TaxRatesContract
{
    /**
     * @api
     *
     * @param array<mixed>|TaxRateListParams $params
     *
     * @return Page<PublicTaxRateGroup>
     *
     * @throws APIException
     */
    public function list(
        array|TaxRateListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $taxRateGroupID,
        ?RequestOptions $requestOptions = null
    ): PublicTaxRateGroup;
}
