<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\TaxRates\CollectionResponsePublicTaxRateGroupForwardPaging;
use HubspotSDK\Settings\TaxRates\PublicTaxRateGroup;

interface TaxRatesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicTaxRateGroupForwardPaging;

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
