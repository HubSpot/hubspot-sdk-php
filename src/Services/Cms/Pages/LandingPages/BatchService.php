<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\BatchResponsePage;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages\BatchContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Create a batch of landing pages as detailed in the request body.
     *
     * @param list<mixed> $inputs pages to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createLandingPages(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponsePage {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLandingPages(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete landing pages specified by ID in the request body. Note: this is not the same as the dashboard `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to `true`.
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteLandingPages(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteLandingPages(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a batch of landing pages as specified in the request body.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLandingPages(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePage {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLandingPages(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a batch of landing pages as specified in the request body.
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLandingPages(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePage {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLandingPages(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
