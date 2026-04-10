<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Blogs\Posts;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageAttachToLangGroupParams\Language;
use HubSpotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageAttachToLangGroupParams\PrimaryLanguage;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Blogs\Posts\MultiLanguageContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class MultiLanguageService implements MultiLanguageContract
{
    /**
     * @api
     */
    public MultiLanguageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MultiLanguageRawService($client);
    }

    /**
     * @api
     *
     * Attach a blog post to a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
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
    ): string {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'language' => $language,
                'primaryID' => $primaryID,
                'primaryLanguage' => $primaryLanguage,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->attachToLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new language variation from an existing blog post
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
    ): string {
        $params = Util::removeNulls(['id' => $id, 'language' => $language]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLangVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Detach a blog post from a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param string $id ID of the object to remove from a multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->detachFromLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the primary language of a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content) to the language of the provided post (specified as an ID in the request body)
     *
     * @param string $id ID of object to set as primary in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setLangPrimary(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setLangPrimary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Explicitly set new languages for each post in a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param array<string,\HubSpotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageUpdateLangsParams\Language|value-of<\HubSpotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageUpdateLangsParams\Language>> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLangs(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            ['languages' => $languages, 'primaryID' => $primaryID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLangs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
