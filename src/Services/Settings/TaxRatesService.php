<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Settings;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Settings\TaxRatesContract;
use HubSpotSDK\Settings\TaxRates\PublicTaxRateGroup;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
    ): Page {
        $params = Util::removeNulls(
            ['active' => $active, 'after' => $after, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific tax rate by its `taxRateGroupId`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $taxRateGroupID,
        RequestOptions|array|null $requestOptions = null
    ): PublicTaxRateGroup {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($taxRateGroupID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
