<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages;

use HubSpotSDK\Cms\Pages\LandingPages\LandingPageCloneParams;
use HubSpotSDK\Cms\Pages\LandingPages\LandingPageCreateParams;
use HubSpotSDK\Cms\Pages\LandingPages\LandingPageDeleteParams;
use HubSpotSDK\Cms\Pages\LandingPages\LandingPageGetParams;
use HubSpotSDK\Cms\Pages\LandingPages\LandingPageListParams;
use HubSpotSDK\Cms\Pages\LandingPages\LandingPageScheduleParams;
use HubSpotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams;
use HubSpotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams;
use HubSpotSDK\Cms\Pages\PageData;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface LandingPagesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function create(
        array|LandingPageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|LandingPageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|LandingPageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PageData>>
     *
     * @throws APIException
     */
    public function list(
        array|LandingPageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|LandingPageDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCloneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function clone(
        array|LandingPageCloneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|LandingPageGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function pushDraftLive(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageScheduleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|LandingPageScheduleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|LandingPageUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
