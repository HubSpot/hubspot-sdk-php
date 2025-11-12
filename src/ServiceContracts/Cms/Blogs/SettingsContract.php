<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\SettingAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Settings\SettingCreateLanguageVariationParams;
use HubspotSDK\Cms\Blogs\Settings\SettingDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Settings\SettingGetRevisionParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListRevisionsParams;
use HubspotSDK\Cms\Blogs\Settings\SettingSetNewLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Settings\SettingUpdateLanguagesParams;
use HubspotSDK\Cms\Blogs\Settings\VersionBlog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface SettingsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SettingListParams $params
     *
     * @return Page<Blog>
     *
     * @throws APIException
     */
    public function list(
        array|SettingListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SettingAttachToLangGroupParams $params
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|SettingAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SettingCreateLanguageVariationParams $params
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|SettingCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): Blog;

    /**
     * @api
     *
     * @param array<mixed>|SettingDetachFromLangGroupParams $params
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|SettingDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $blogID,
        ?RequestOptions $requestOptions = null
    ): Blog;

    /**
     * @api
     *
     * @param array<mixed>|SettingGetRevisionParams $params
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|SettingGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): VersionBlog;

    /**
     * @api
     *
     * @param array<mixed>|SettingListRevisionsParams $params
     *
     * @return Page<VersionBlog>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $blogID,
        array|SettingListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SettingSetNewLangPrimaryParams $params
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|SettingSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SettingUpdateLanguagesParams $params
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|SettingUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
