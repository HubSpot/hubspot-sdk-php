<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\TaxRates\PublicTaxRateGroup;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TaxRatesContract
{
    /**
     * @api
     *
     * @param bool $active include inactive rates
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the paging.next.after JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicTaxRateGroup>
     *
     * @throws APIException
     */
    public function list(
        ?bool $active = null,
        ?string $after = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $taxRateGroupID the ID of the tax rate to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $taxRateGroupID,
        RequestOptions|array|null $requestOptions = null
    ): PublicTaxRateGroup;
}
