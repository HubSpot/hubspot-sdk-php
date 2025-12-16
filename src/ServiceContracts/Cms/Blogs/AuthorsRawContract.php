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
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface AuthorsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AuthorCreateParams $params
     *
     * @return BaseResponse<BlogAuthor>
     *
     * @throws APIException
     */
    public function create(
        array|AuthorCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID path param: The Blog Author id
     * @param array<string,mixed>|AuthorUpdateParams $params
     *
     * @return BaseResponse<BlogAuthor>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|AuthorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorListParams $params
     *
     * @return BaseResponse<Page<BlogAuthor>>
     *
     * @throws APIException
     */
    public function list(
        array|AuthorListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Blog Author id
     * @param array<string,mixed>|AuthorDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|AuthorDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorAttachToLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|AuthorAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorCreateBatchParams $params
     *
     * @return BaseResponse<BatchResponseBlogAuthor>
     *
     * @throws APIException
     */
    public function createBatch(
        array|AuthorCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorCreateLanguageVariationParams $params
     *
     * @return BaseResponse<BlogAuthor>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|AuthorCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorDeleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|AuthorDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorDetachFromLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|AuthorDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Blog Author id
     * @param array<string,mixed>|AuthorGetParams $params
     *
     * @return BaseResponse<BlogAuthor>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|AuthorGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorGetBatchParams $params
     *
     * @return BaseResponse<BatchResponseBlogAuthor>
     *
     * @throws APIException
     */
    public function getBatch(
        array|AuthorGetBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorSetNewLangPrimaryParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|AuthorSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponseBlogAuthor>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|AuthorUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorUpdateLanguagesParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|AuthorUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
