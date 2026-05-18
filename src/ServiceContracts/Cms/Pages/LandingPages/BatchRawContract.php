<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages;

use HubSpotSDK\Cms\Pages\BatchResponsePage;
use HubSpotSDK\Cms\Pages\LandingPages\Batch\BatchCreateLandingPagesParams;
use HubSpotSDK\Cms\Pages\LandingPages\Batch\BatchDeleteLandingPagesParams;
use HubSpotSDK\Cms\Pages\LandingPages\Batch\BatchGetLandingPagesParams;
use HubSpotSDK\Cms\Pages\LandingPages\Batch\BatchUpdateLandingPagesParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createLandingPages(
        array|BatchCreateLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchDeleteLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteLandingPages(
        array|BatchDeleteLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getLandingPages(
        array|BatchGetLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateLandingPages(
        array|BatchUpdateLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
