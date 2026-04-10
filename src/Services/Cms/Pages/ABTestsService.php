<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\PageData;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\ABTestsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class ABTestsService implements ABTestsContract
{
    /**
     * @api
     */
    public ABTestsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ABTestsRawService($client);
    }

    /**
     * @api
     *
     * Create a new A/B test variation based on the information provided in the request body.
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
    ): PageData {
        $params = Util::removeNulls(
            ['contentID' => $contentID, 'variationName' => $variationName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLandingPageVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new A/B test variation based on the information provided in the request body.
     *
     * @param string $contentID ID of the object to test
     * @param string $variationName name of A/B test variation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createSitePageVariation(
        string $contentID,
        string $variationName,
        RequestOptions|array|null $requestOptions = null,
    ): PageData {
        $params = Util::removeNulls(
            ['contentID' => $contentID, 'variationName' => $variationName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createSitePageVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * End an active A/B test and designate a winner.
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
    ): mixed {
        $params = Util::removeNulls(
            ['abTestID' => $abTestID, 'winnerID' => $winnerID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->endLandingPageTest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * End an active A/B test and designate a winner.
     *
     * @param string $abTestID ID of the test to end
     * @param string $winnerID ID of the object to designate as the test winner
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function endSitePageTest(
        string $abTestID,
        string $winnerID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['abTestID' => $abTestID, 'winnerID' => $winnerID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->endSitePageTest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Rerun a previous A/B test.
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
    ): mixed {
        $params = Util::removeNulls(
            ['abTestID' => $abTestID, 'variationID' => $variationID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rerunLandingPageTest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Rerun a previous A/B test.
     *
     * @param string $abTestID ID of the test to rerun
     * @param string $variationID ID of the object to reactivate as a test variation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rerunSitePageTest(
        string $abTestID,
        string $variationID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['abTestID' => $abTestID, 'variationID' => $variationID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rerunSitePageTest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
