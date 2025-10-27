<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\TaxRatesContract;
use HubspotSDK\Settings\TaxRates\CollectionResponsePublicTaxRateGroupForwardPaging;
use HubspotSDK\Settings\TaxRates\PublicTaxRateGroup;

final class TaxRatesService implements TaxRatesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a paginated list of all tax rates set up in the account tax rate library
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicTaxRateGroupForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'tax-rates/v1/tax-rates',
            options: $requestOptions,
            convert: CollectionResponsePublicTaxRateGroupForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific tax rate by its `taxRateGroupId`.
     *
     * @throws APIException
     */
    public function get(
        string $taxRateGroupID,
        ?RequestOptions $requestOptions = null
    ): PublicTaxRateGroup {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['tax-rates/v1/tax-rates/%1$s', $taxRateGroupID],
            options: $requestOptions,
            convert: PublicTaxRateGroup::class,
        );
    }
}
