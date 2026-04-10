<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Blogs;

use HubSpotSDK\Cms\Blogs\Authors\AuthorAttachToLangGroupParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorCreateLanguageVariationParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorCreateParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorDeleteParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorDetachFromLangGroupParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorGetCursorByQueryParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorGetCursorParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorGetParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorGetPostsCursorByQueryParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorGetPostsCursorParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorGetTagsCursorByQueryParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorGetTagsCursorParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorListParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorSetNewLangPrimaryParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorUpdateLanguagesParams;
use HubSpotSDK\Cms\Blogs\Authors\AuthorUpdateParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface AuthorsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AuthorCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function create(
        array|AuthorCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|AuthorUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|AuthorUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function list(
        array|AuthorListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|AuthorDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorAttachToLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|AuthorAttachToLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorCreateLanguageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|AuthorCreateLanguageVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorDetachFromLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|AuthorDetachFromLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|AuthorGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorGetCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getCursor(
        array|AuthorGetCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorGetCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getCursorByQuery(
        array|AuthorGetCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorGetPostsCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getPostsCursor(
        array|AuthorGetPostsCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorGetPostsCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getPostsCursorByQuery(
        array|AuthorGetPostsCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorGetTagsCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getTagsCursor(
        array|AuthorGetTagsCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorGetTagsCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getTagsCursorByQuery(
        array|AuthorGetTagsCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorSetNewLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|AuthorSetNewLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthorUpdateLanguagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|AuthorUpdateLanguagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
