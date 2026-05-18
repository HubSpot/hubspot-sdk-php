<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages;

use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface AbTestContract
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
    public function createLandingPageVariation(
        string $contentID,
        string $variationName,
        RequestOptions|array|null $requestOptions = null,
    ): PagesPage;

    /**
     * @api
     *
     * @param string $abTestID ID of the test to end
     * @param string $winnerID ID of the object to designate as the test winner
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function endLandingPageTest(
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
    public function rerunLandingPageTest(
        string $abTestID,
        string $variationID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
