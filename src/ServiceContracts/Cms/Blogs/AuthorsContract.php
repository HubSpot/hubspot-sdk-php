<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Authors\AuthorAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorCreateBatchParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorCreateLanguageVariationParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorCreateParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorDeleteBatchParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorDeleteParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorGetBatchParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorGetParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorListParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorSetNewLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorUpdateBatchParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorUpdateLanguagesParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams;
use HubspotSDK\Cms\Blogs\Authors\BatchResponseBlogAuthor;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface AuthorsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AuthorCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AuthorCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BlogAuthor;

    /**
     * @api
     *
     * @param array<mixed>|AuthorUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|AuthorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogAuthor;

    /**
     * @api
     *
     * @param array<mixed>|AuthorListParams $params
     *
     * @return Page<BlogAuthor>
     *
     * @throws APIException
     */
    public function list(
        array|AuthorListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|AuthorDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|AuthorDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AuthorAttachToLangGroupParams $params
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|AuthorAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AuthorCreateBatchParams $params
     *
     * @throws APIException
     */
    public function createBatch(
        array|AuthorCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param array<mixed>|AuthorCreateLanguageVariationParams $params
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|AuthorCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogAuthor;

    /**
     * @api
     *
     * @param array<mixed>|AuthorDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|AuthorDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AuthorDetachFromLangGroupParams $params
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|AuthorDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AuthorGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|AuthorGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogAuthor;

    /**
     * @api
     *
     * @param array<mixed>|AuthorGetBatchParams $params
     *
     * @throws APIException
     */
    public function getBatch(
        array|AuthorGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param array<mixed>|AuthorSetNewLangPrimaryParams $params
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|AuthorSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AuthorUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        array|AuthorUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param array<mixed>|AuthorUpdateLanguagesParams $params
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|AuthorUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
