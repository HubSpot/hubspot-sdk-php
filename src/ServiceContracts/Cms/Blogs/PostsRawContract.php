<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\PostCloneParams;
use HubspotSDK\Cms\Blogs\Posts\PostCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams;
use HubspotSDK\Cms\Blogs\Posts\PostDeleteParams;
use HubspotSDK\Cms\Blogs\Posts\PostDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\PostGetParams;
use HubspotSDK\Cms\Blogs\Posts\PostGetPreviousVersionParams;
use HubspotSDK\Cms\Blogs\Posts\PostGetPreviousVersionsParams;
use HubspotSDK\Cms\Blogs\Posts\PostListParams;
use HubspotSDK\Cms\Blogs\Posts\PostRestorePreviousVersionParams;
use HubspotSDK\Cms\Blogs\Posts\PostRestorePreviousVersionToDraftParams;
use HubspotSDK\Cms\Blogs\Posts\PostScheduleParams;
use HubspotSDK\Cms\Blogs\Posts\PostSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateLangsParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateParams;
use HubspotSDK\Cms\Blogs\Posts\VersionBlogPost;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface PostsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PostCreateParams $params
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function create(
        array|PostCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID path param: The ID of the blog post to update
     * @param array<mixed>|PostUpdateParams $params
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|PostUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostListParams $params
     *
     * @return BaseResponse<Page<BlogPost>>
     *
     * @throws APIException
     */
    public function list(
        array|PostListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the ID of the blog post to delete
     * @param array<mixed>|PostDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|PostDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostAttachToLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|PostAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostCloneParams $params
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function clone(
        array|PostCloneParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostCreateLangVariationParams $params
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|PostCreateLangVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostDetachFromLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|PostDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the ID of the blog post to retrieve
     * @param array<mixed>|PostGetParams $params
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|PostGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the ID of the blog post to retrieve the draft of
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function getDraftByID(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the ID of the version to retrieve
     * @param array<mixed>|PostGetPreviousVersionParams $params
     *
     * @return BaseResponse<VersionBlogPost>
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        array|PostGetPreviousVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the ID of the blog post to retrieve previous versions of
     * @param array<mixed>|PostGetPreviousVersionsParams $params
     *
     * @return BaseResponse<Page<VersionBlogPost>>
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        array|PostGetPreviousVersionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the ID of the post to publish
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function pushLive(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the ID of the blog post to reset
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the ID of the version to restore the blog post to
     * @param array<mixed>|PostRestorePreviousVersionParams $params
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        array|PostRestorePreviousVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $revisionID the ID of the version to restore the blog post to
     * @param array<mixed>|PostRestorePreviousVersionToDraftParams $params
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        array|PostRestorePreviousVersionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostScheduleParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|PostScheduleParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostSetLangPrimaryParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|PostSetLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the ID of the blog post to update the draft of
     * @param array<mixed>|PostUpdateDraftParams $params
     *
     * @return BaseResponse<BlogPost>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|PostUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostUpdateLangsParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLangs(
        array|PostUpdateLangsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
