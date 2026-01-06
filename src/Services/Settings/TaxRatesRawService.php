<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\TaxRatesRawContract;
use HubspotSDK\Settings\TaxRates\PublicTaxRateGroup;
use HubspotSDK\Settings\TaxRates\TaxRateListParams;

final class TaxRatesRawService implements TaxRatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a paginated list of all tax rates set up in the account tax rate library
     *
     * @param array{
     *   active?: bool, after?: string, limit?: int
     * }|TaxRateListParams $params
     *
     * @return BaseResponse<Page<PublicTaxRateGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|TaxRateListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = TaxRateListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'tax-rates/v1/tax-rates',
            query: $parsed,
            options: $options,
            convert: PublicTaxRateGroup::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific tax rate by its `taxRateGroupId`.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['tax-rates/v1/tax-rates/%1$s', $taxRateGroupID],
            options: $requestOptions,
            convert: PublicTaxRateGroup::class,
        );
    }
}
