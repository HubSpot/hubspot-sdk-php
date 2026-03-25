<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\BlogVersion;
use HubspotSDK\Cms\Blogs\Settings\SettingGetRevisionParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListRevisionsParams;
use HubspotSDK\Cms\Blogs\Settings\VersionBlog;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SettingsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SettingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<Blog>>
     *
     * @throws APIException
     */
    public function list(
        array|SettingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Blog>
     *
     * @throws APIException
     */
    public function get(
        string $blogID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SettingGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BlogVersion>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|SettingGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SettingListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<VersionBlog>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $blogID,
        array|SettingListRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
