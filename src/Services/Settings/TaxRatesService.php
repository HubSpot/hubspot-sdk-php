<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\TaxRatesContract;
use HubspotSDK\Settings\TaxRates\PublicTaxRateGroup;

final class TaxRatesService implements TaxRatesContract
{
    /**
     * @api
     */
    public TaxRatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TaxRatesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a paginated list of all tax rates set up in the account tax rate library
     *
     * @param bool $active include inactive rates
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the paging.next.after JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicTaxRateGroup>
     *
     * @throws APIException
     */
    public function list(
        ?bool $active = null,
        ?string $after = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['active' => $active, 'after' => $after, 'limit' => $limit];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific tax rate by its `taxRateGroupId`.
     *
     * @param string $taxRateGroupID the ID of the tax rate to retrieve
     *
     * @throws APIException
     */
    public function get(
        string $taxRateGroupID,
        ?RequestOptions $requestOptions = null
    ): PublicTaxRateGroup {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($taxRateGroupID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
