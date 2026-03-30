<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\ABTests\AbTestCreateAbTestVariationParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestEndAbTestParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestRerunAbTestParams;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\ABTestsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ABTestsRawService implements ABTestsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new A/B test variation based on the information provided in the request body.
     *
     * @param array{
     *   contentID: string, variationName: string
     * }|AbTestCreateAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|AbTestCreateAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AbTestCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/ab-test/create-variation',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * End an active A/B test and designate a winner.
     *
     * @param array{abTestID: string, winnerID: string}|AbTestEndAbTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function endAbTest(
        array|AbTestEndAbTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AbTestEndAbTestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/ab-test/end',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Rerun a previous A/B test.
     *
     * @param array{
     *   abTestID: string, variationID: string
     * }|AbTestRerunAbTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function rerunAbTest(
        array|AbTestRerunAbTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AbTestRerunAbTestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/ab-test/rerun',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
