<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\MultiLanguage\MultiLanguageAttachToLangGroupParams;
use HubspotSDK\Cms\Pages\MultiLanguage\MultiLanguageAttachToLangGroupParams\Language;
use HubspotSDK\Cms\Pages\MultiLanguage\MultiLanguageAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Cms\Pages\MultiLanguage\MultiLanguageCreateLanguageVariationParams;
use HubspotSDK\Cms\Pages\MultiLanguage\MultiLanguageDetachFromLangGroupParams;
use HubspotSDK\Cms\Pages\MultiLanguage\MultiLanguageSetNewLangPrimaryParams;
use HubspotSDK\Cms\Pages\MultiLanguage\MultiLanguageUpdateLanguagesParams;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\MultiLanguageRawContract;

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
     * Attach a site page to a multi-language group.
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
            path: 'cms/pages/2026-03/site-pages/multi-language/attach-to-lang-group',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing site page
     *
     * @param array{
     *   id: string, language?: string, primaryLanguage?: string
     * }|MultiLanguageCreateLanguageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
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
            path: 'cms/pages/2026-03/site-pages/multi-language/create-language-variation',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Detach a website page from a multi-language group.
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
            path: 'cms/pages/2026-03/site-pages/multi-language/detach-from-lang-group',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Set a site page as the primary language of a multi-language group.
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
            path: 'cms/pages/2026-03/site-pages/multi-language/set-new-lang-primary',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each site page in a multi-language group.
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
            path: 'cms/pages/2026-03/site-pages/multi-language/update-languages',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
