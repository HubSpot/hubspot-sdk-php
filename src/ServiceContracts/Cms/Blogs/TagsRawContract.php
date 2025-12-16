<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Tags\BatchResponseTag;
use HubspotSDK\Cms\Blogs\Tags\Tag;
use HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams;
use HubspotSDK\Cms\Blogs\Tags\TagDeleteBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagDeleteParams;
use HubspotSDK\Cms\Blogs\Tags\TagDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagGetBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagGetParams;
use HubspotSDK\Cms\Blogs\Tags\TagListParams;
use HubspotSDK\Cms\Blogs\Tags\TagSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateLangsParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface TagsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TagCreateParams $params
     *
     * @return BaseResponse<Tag>
     *
     * @throws APIException
     */
    public function create(
        array|TagCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID path param: The Blog Tag id
     * @param array<string,mixed>|TagUpdateParams $params
     *
     * @return BaseResponse<Tag>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|TagUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagListParams $params
     *
     * @return BaseResponse<Page<Tag>>
     *
     * @throws APIException
     */
    public function list(
        array|TagListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Blog Tag id
     * @param array<string,mixed>|TagDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|TagDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagAttachToLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|TagAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagCreateBatchParams $params
     *
     * @return BaseResponse<BatchResponseTag>
     *
     * @throws APIException
     */
    public function createBatch(
        array|TagCreateBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagCreateLangVariationParams $params
     *
     * @return BaseResponse<Tag>
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|TagCreateLangVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagDeleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|TagDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagDetachFromLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|TagDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Blog Tag id
     * @param array<string,mixed>|TagGetParams $params
     *
     * @return BaseResponse<Tag>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|TagGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagGetBatchParams $params
     *
     * @return BaseResponse<BatchResponseTag>
     *
     * @throws APIException
     */
    public function getBatch(
        array|TagGetBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagSetLangPrimaryParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|TagSetLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponseTag>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|TagUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagUpdateLangsParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLangs(
        array|TagUpdateLangsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
