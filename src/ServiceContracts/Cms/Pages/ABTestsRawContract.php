<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Pages;

use HubspotSDK\Cms\Pages\ABTests\AbTestCreateAbTestVariationParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestEndAbTestParams;
use HubspotSDK\Cms\Pages\ABTests\AbTestRerunAbTestParams;
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
     * @param array<string,mixed>|AbTestCreateAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|AbTestCreateAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AbTestEndAbTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function endAbTest(
        array|AbTestEndAbTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AbTestRerunAbTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function rerunAbTest(
        array|AbTestRerunAbTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
