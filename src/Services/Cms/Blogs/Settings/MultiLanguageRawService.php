<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Blogs\Settings;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Blogs\Settings\Blog;
use HubSpotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageAttachToLangGroupParams;
use HubSpotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageAttachToLangGroupParams\Language;
use HubSpotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageAttachToLangGroupParams\PrimaryLanguage;
use HubSpotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageCreateLanguageVariationParams;
use HubSpotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageDetachFromLangGroupParams;
use HubSpotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageSetNewLangPrimaryParams;
use HubSpotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageUpdateLanguagesParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Blogs\Settings\MultiLanguageRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class MultiLanguageRawService implements MultiLanguageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Attach a blog to a multi-language group.
     *
     * @param array{
     *   id: string,
     *   language: value-of<Language>,
     *   primaryID: string,
     *   primaryLanguage?: value-of<PrimaryLanguage>,
     * }|MultiLanguageAttachToLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|MultiLanguageAttachToLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MultiLanguageAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blog-settings/2026-03/settings/multi-language/attach-to-lang-group',
            headers: ['Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing blog.
     *
     * @param array{
     *   id: string, language?: string, primaryLanguage?: string, slug?: string
     * }|MultiLanguageCreateLanguageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Blog>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|MultiLanguageCreateLanguageVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MultiLanguageCreateLanguageVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blog-settings/2026-03/settings/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: Blog::class,
        );
    }

    /**
     * @api
     *
     * Detaches a blog from a multi-language group.
     *
     * @param array{id: string}|MultiLanguageDetachFromLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|MultiLanguageDetachFromLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MultiLanguageDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blog-settings/2026-03/settings/multi-language/detach-from-lang-group',
            headers: ['Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Set a blog as the primary language of a multi-language group.
     *
     * @param array{id: string}|MultiLanguageSetNewLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|MultiLanguageSetNewLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MultiLanguageSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'cms/blog-settings/2026-03/settings/multi-language/set-new-lang-primary',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each blog in a multi-language group.
     *
     * @param array{
     *   languages: array<string,MultiLanguageUpdateLanguagesParams\Language|value-of<MultiLanguageUpdateLanguagesParams\Language>>,
     *   primaryID: string,
     * }|MultiLanguageUpdateLanguagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|MultiLanguageUpdateLanguagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MultiLanguageUpdateLanguagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blog-settings/2026-03/settings/multi-language/update-languages',
            headers: ['Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
