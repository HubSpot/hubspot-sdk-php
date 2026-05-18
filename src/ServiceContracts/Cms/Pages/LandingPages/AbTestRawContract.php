<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages;

use HubSpotSDK\Cms\Pages\LandingPages\AbTest\AbTestCreateLandingPageVariationParams;
use HubSpotSDK\Cms\Pages\LandingPages\AbTest\AbTestEndLandingPageTestParams;
use HubSpotSDK\Cms\Pages\LandingPages\AbTest\AbTestRerunLandingPageTestParams;
use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface AbTestRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AbTestCreateLandingPageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function createLandingPageVariation(
        array|AbTestCreateLandingPageVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AbTestEndLandingPageTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function endLandingPageTest(
        array|AbTestEndLandingPageTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AbTestRerunLandingPageTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function rerunLandingPageTest(
        array|AbTestRerunLandingPageTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
