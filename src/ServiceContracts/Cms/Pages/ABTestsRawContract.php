<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages;

use HubSpotSDK\Cms\Pages\ABTests\AbTestCreateLandingPageVariationParams;
use HubSpotSDK\Cms\Pages\ABTests\AbTestCreateSitePageVariationParams;
use HubSpotSDK\Cms\Pages\ABTests\AbTestEndLandingPageTestParams;
use HubSpotSDK\Cms\Pages\ABTests\AbTestEndSitePageTestParams;
use HubSpotSDK\Cms\Pages\ABTests\AbTestRerunLandingPageTestParams;
use HubSpotSDK\Cms\Pages\ABTests\AbTestRerunSitePageTestParams;
use HubSpotSDK\Cms\Pages\PageData;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ABTestsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AbTestCreateLandingPageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
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
     * @param array<string,mixed>|AbTestCreateSitePageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function createSitePageVariation(
        array|AbTestCreateSitePageVariationParams $params,
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
     * @param array<string,mixed>|AbTestEndSitePageTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function endSitePageTest(
        array|AbTestEndSitePageTestParams $params,
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

    /**
     * @api
     *
     * @param array<string,mixed>|AbTestRerunSitePageTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function rerunSitePageTest(
        array|AbTestRerunSitePageTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
