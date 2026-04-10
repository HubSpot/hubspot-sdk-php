<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\TaxRates\PublicTaxRateGroup;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface TaxRatesContract
{
    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $taxRateGroupID,
        RequestOptions|array|null $requestOptions = null
    ): PublicTaxRateGroup;
}
