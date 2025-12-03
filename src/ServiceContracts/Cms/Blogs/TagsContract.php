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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface TagsContract
{
    /**
     * @api
     *
     * @param array<mixed>|TagCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TagCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): Tag;

    /**
     * @api
     *
     * @param array<mixed>|TagUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|TagUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Tag;

    /**
     * @api
     *
     * @param array<mixed>|TagListParams $params
     *
     * @return Page<Tag>
     *
     * @throws APIException
     */
    public function list(
        array|TagListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|TagDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|TagDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TagAttachToLangGroupParams $params
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|TagAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TagCreateBatchParams $params
     *
     * @throws APIException
     */
    public function createBatch(
        array|TagCreateBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param array<mixed>|TagCreateLangVariationParams $params
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|TagCreateLangVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): Tag;

    /**
     * @api
     *
     * @param array<mixed>|TagDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|TagDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TagDetachFromLangGroupParams $params
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|TagDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TagGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|TagGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): Tag;

    /**
     * @api
     *
     * @param array<mixed>|TagGetBatchParams $params
     *
     * @throws APIException
     */
    public function getBatch(
        array|TagGetBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param array<mixed>|TagSetLangPrimaryParams $params
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|TagSetLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TagUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        array|TagUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param array<mixed>|TagUpdateLangsParams $params
     *
     * @throws APIException
     */
    public function updateLangs(
        array|TagUpdateLangsParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
