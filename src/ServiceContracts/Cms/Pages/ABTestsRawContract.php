<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Pages;

use HubspotSDK\Cms\Pages\ABTests\AbTestCreateLandingPageVariationParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestCreateSitePageVariationParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestEndLandingPageTestParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestEndSitePageTestParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestRerunLandingPageTestParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestRerunSitePageTestParams;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ABTestsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AbTestCreateLandingPageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
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
     * @return BaseResponse<Page>
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
