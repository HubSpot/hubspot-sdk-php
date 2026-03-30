<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs\Posts;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageAttachToLangGroupParams\Language;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageUpdateLangsParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\Posts\MultiLanguageRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Attach a blog post to a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
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
            path: 'cms/blogs/2026-03/posts/multi-language/attach-to-lang-group',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing blog post
     *
     * @param array{
     *   id: string, language?: string
     * }|MultiLanguageCreateLangVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|MultiLanguageCreateLangVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MultiLanguageCreateLangVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/posts/multi-language/create-language-variation',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Detach a blog post from a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
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
            path: 'cms/blogs/2026-03/posts/multi-language/detach-from-lang-group',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Set the primary language of a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content) to the language of the provided post (specified as an ID in the request body)
     *
     * @param array{id: string}|MultiLanguageSetLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|MultiLanguageSetLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MultiLanguageSetLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'cms/blogs/2026-03/posts/multi-language/set-new-lang-primary',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each post in a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param array{
     *   languages: array<string,MultiLanguageUpdateLangsParams\Language|value-of<MultiLanguageUpdateLangsParams\Language>>,
     *   primaryID: string,
     * }|MultiLanguageUpdateLangsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function updateLangs(
        array|MultiLanguageUpdateLangsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MultiLanguageUpdateLangsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/posts/multi-language/update-languages',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
