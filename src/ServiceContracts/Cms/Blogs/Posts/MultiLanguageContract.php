<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageAttachToLangGroupParams\Language;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MultiLanguageContract
{
    /**
     * @api
     *
     * @param string $id ID of the object to add to a multi-language group
     * @param Language|value-of<Language> $language designated language of the object to add to a multi-language group
     * @param string $primaryID ID of primary language object in multi-language group
     * @param PrimaryLanguage|value-of<PrimaryLanguage> $primaryLanguage primary language of the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        string $id,
        Language|string $language,
        string $primaryID,
        PrimaryLanguage|string|null $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $id ID of blog post to clone
     * @param string $language target language of new variant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createLangVariation(
        string $id,
        ?string $language = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $id ID of the object to remove from a multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param string $id ID of object to set as primary in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setLangPrimary(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string,\HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageUpdateLangsParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageUpdateLangsParams\Language>> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLangs(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
