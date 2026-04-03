<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Pages;

use HubspotSDK\Cms\Pages\CmsPage;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageCloneParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageCreateParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageDeleteParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageGetParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageListParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageScheduleParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageSetNewLangPrimaryParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageUpdateDraftParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface WebsitePagesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WebsitePageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CmsPage>
     *
     * @throws APIException
     */
    public function create(
        array|WebsitePageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|WebsitePageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CmsPage>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|WebsitePageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebsitePageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<CmsPage>>
     *
     * @throws APIException
     */
    public function list(
        array|WebsitePageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebsitePageDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|WebsitePageDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebsitePageCloneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CmsPage>
     *
     * @throws APIException
     */
    public function clone(
        array|WebsitePageCloneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebsitePageGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CmsPage>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|WebsitePageGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CmsPage>
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
    public function publishDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebsitePageScheduleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|WebsitePageScheduleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebsitePageSetNewLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|WebsitePageSetNewLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebsitePageUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CmsPage>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|WebsitePageUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
