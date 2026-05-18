<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages;

use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Cms\Pages\SitePages\SitePageCloneParams;
use HubSpotSDK\Cms\Pages\SitePages\SitePageCreateParams;
use HubSpotSDK\Cms\Pages\SitePages\SitePageDeleteParams;
use HubSpotSDK\Cms\Pages\SitePages\SitePageGetParams;
use HubSpotSDK\Cms\Pages\SitePages\SitePageListParams;
use HubSpotSDK\Cms\Pages\SitePages\SitePageScheduleParams;
use HubSpotSDK\Cms\Pages\SitePages\SitePageUpdateParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SitePagesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SitePageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function create(
        array|SitePageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|SitePageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|SitePageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PagesPage>>
     *
     * @throws APIException
     */
    public function list(
        array|SitePageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|SitePageDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageCloneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function clone(
        array|SitePageCloneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the unique identifier of the site page to retrieve
     * @param array<string,mixed>|SitePageGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|SitePageGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageScheduleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|SitePageScheduleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
