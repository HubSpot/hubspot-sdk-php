<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Blogs;

use HubSpotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams;
use HubSpotSDK\Cms\Blogs\Tags\TagCreateLangVariationParams;
use HubSpotSDK\Cms\Blogs\Tags\TagCreateParams;
use HubSpotSDK\Cms\Blogs\Tags\TagDeleteParams;
use HubSpotSDK\Cms\Blogs\Tags\TagDetachFromLangGroupParams;
use HubSpotSDK\Cms\Blogs\Tags\TagGetParams;
use HubSpotSDK\Cms\Blogs\Tags\TagListAuthorsCursorByQueryParams;
use HubSpotSDK\Cms\Blogs\Tags\TagListAuthorsCursorParams;
use HubSpotSDK\Cms\Blogs\Tags\TagListCursorByQueryParams;
use HubSpotSDK\Cms\Blogs\Tags\TagListCursorParams;
use HubSpotSDK\Cms\Blogs\Tags\TagListParams;
use HubSpotSDK\Cms\Blogs\Tags\TagListPostsCursorByQueryParams;
use HubSpotSDK\Cms\Blogs\Tags\TagListPostsCursorParams;
use HubSpotSDK\Cms\Blogs\Tags\TagSetLangPrimaryParams;
use HubSpotSDK\Cms\Blogs\Tags\TagUpdateLangsParams;
use HubSpotSDK\Cms\Blogs\Tags\TagUpdateParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
