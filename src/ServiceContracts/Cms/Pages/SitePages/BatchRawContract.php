<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\SitePages;

use HubSpotSDK\Cms\Pages\BatchResponsePage;
use HubSpotSDK\Cms\Pages\SitePages\Batch\BatchCreateSitePagesParams;
use HubSpotSDK\Cms\Pages\SitePages\Batch\BatchDeleteSitePagesParams;
use HubSpotSDK\Cms\Pages\SitePages\Batch\BatchGetSitePagesParams;
use HubSpotSDK\Cms\Pages\SitePages\Batch\BatchUpdateSitePagesParams;
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
     * @param array<string,mixed>|BatchCreateSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createSitePages(
        array|BatchCreateSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchDeleteSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSitePages(
        array|BatchDeleteSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getSitePages(
        array|BatchGetSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateSitePages(
        array|BatchUpdateSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
