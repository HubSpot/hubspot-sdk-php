<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\ABTestsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
    public function createAbTestVariation(
        string $contentID,
        string $variationName,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['contentID' => $contentID, 'variationName' => $variationName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAbTestVariation(params: $params, requestOptions: $requestOptions);

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
    public function endAbTest(
        string $abTestID,
        string $winnerID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['abTestID' => $abTestID, 'winnerID' => $winnerID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->endAbTest(params: $params, requestOptions: $requestOptions);

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
    public function rerunAbTest(
        string $abTestID,
        string $variationID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['abTestID' => $abTestID, 'variationID' => $variationID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rerunAbTest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
