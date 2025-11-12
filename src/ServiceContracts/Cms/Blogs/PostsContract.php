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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface PostsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PostCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PostCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|PostUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostListParams $params
     *
     * @return Page<BlogPost>
     *
     * @throws APIException
     */
    public function list(
        array|PostListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|PostDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|PostDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PostAttachToLangGroupParams $params
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|PostAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PostCloneParams $params
     *
     * @throws APIException
     */
    public function clone(
        array|PostCloneParams $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostCreateLangVariationParams $params
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|PostCreateLangVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostDetachFromLangGroupParams $params
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|PostDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PostGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|PostGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getDraftByID(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostGetPreviousVersionParams $params
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        array|PostGetPreviousVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): VersionBlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostGetPreviousVersionsParams $params
     *
     * @return Page<VersionBlogPost>
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        array|PostGetPreviousVersionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function pushLive(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PostRestorePreviousVersionParams $params
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        array|PostRestorePreviousVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostRestorePreviousVersionToDraftParams $params
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        array|PostRestorePreviousVersionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostScheduleParams $params
     *
     * @throws APIException
     */
    public function schedule(
        array|PostScheduleParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PostSetLangPrimaryParams $params
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|PostSetLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PostUpdateDraftParams $params
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|PostUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @param array<mixed>|PostUpdateLangsParams $params
     *
     * @throws APIException
     */
    public function updateLangs(
        array|PostUpdateLangsParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
