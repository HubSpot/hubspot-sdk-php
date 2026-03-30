<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Pages;

use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ABTestsContract
{
    /**
     * @api
     *
     * @param string $contentID ID of the object to test
     * @param string $variationName name of A/B test variation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        string $contentID,
        string $variationName,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $abTestID ID of the test to end
     * @param string $winnerID ID of the object to designate as the test winner
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function endAbTest(
        string $abTestID,
        string $winnerID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $abTestID ID of the test to rerun
     * @param string $variationID ID of the object to reactivate as a test variation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rerunAbTest(
        string $abTestID,
        string $variationID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
