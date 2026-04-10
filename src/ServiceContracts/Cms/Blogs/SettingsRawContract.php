<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Blogs;

use HubSpotSDK\Cms\Blogs\Settings\Blog;
use HubSpotSDK\Cms\Blogs\Settings\BlogVersion;
use HubSpotSDK\Cms\Blogs\Settings\SettingGetRevisionParams;
use HubSpotSDK\Cms\Blogs\Settings\SettingListParams;
use HubSpotSDK\Cms\Blogs\Settings\SettingListRevisionsParams;
use HubSpotSDK\Cms\Blogs\Settings\VersionBlog;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
