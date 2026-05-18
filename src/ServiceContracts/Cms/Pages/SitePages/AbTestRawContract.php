<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\SitePages;

use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Cms\Pages\SitePages\AbTest\AbTestCreateSitePageVariationParams;
use HubSpotSDK\Cms\Pages\SitePages\AbTest\AbTestEndSitePageTestParams;
use HubSpotSDK\Cms\Pages\SitePages\AbTest\AbTestRerunSitePageTestParams;
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
     * @param array<string,mixed>|AbTestCreateSitePageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
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
