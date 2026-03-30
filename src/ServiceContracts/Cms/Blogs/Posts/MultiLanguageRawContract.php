<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageUpdateLangsParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MultiLanguageRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MultiLanguageAttachToLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|MultiLanguageAttachToLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MultiLanguageCreateLangVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|MultiLanguageCreateLangVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MultiLanguageDetachFromLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|MultiLanguageDetachFromLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MultiLanguageSetLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|MultiLanguageSetLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MultiLanguageUpdateLangsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function updateLangs(
        array|MultiLanguageUpdateLangsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
