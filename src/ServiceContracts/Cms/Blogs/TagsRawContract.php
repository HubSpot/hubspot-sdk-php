<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams;
use HubspotSDK\Cms\Blogs\Tags\TagDeleteParams;
use HubspotSDK\Cms\Blogs\Tags\TagDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagGetParams;
use HubspotSDK\Cms\Blogs\Tags\TagListAuthorsCursorByQueryParams;
use HubspotSDK\Cms\Blogs\Tags\TagListAuthorsCursorParams;
use HubspotSDK\Cms\Blogs\Tags\TagListCursorByQueryParams;
use HubspotSDK\Cms\Blogs\Tags\TagListCursorParams;
use HubspotSDK\Cms\Blogs\Tags\TagListParams;
use HubspotSDK\Cms\Blogs\Tags\TagListPostsCursorByQueryParams;
use HubspotSDK\Cms\Blogs\Tags\TagListPostsCursorParams;
use HubspotSDK\Cms\Blogs\Tags\TagSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateLangsParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TagsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TagCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function create(
        array|TagCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|TagUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|TagUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function list(
        array|TagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|TagDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagAttachToLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|TagAttachToLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagCreateLangVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|TagCreateLangVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagDetachFromLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|TagDetachFromLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|TagGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagListAuthorsCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listAuthorsCursor(
        array|TagListAuthorsCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagListAuthorsCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listAuthorsCursorByQuery(
        array|TagListAuthorsCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagListCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listCursor(
        array|TagListCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagListCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listCursorByQuery(
        array|TagListCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagListPostsCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listPostsCursor(
        array|TagListPostsCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagListPostsCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listPostsCursorByQuery(
        array|TagListPostsCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagSetLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|TagSetLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagUpdateLangsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function updateLangs(
        array|TagUpdateLangsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
