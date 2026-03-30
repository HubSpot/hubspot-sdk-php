<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs\Settings;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageAttachToLangGroupParams\Language;
use HubspotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\Settings\MultiLanguageContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Attach a blog to a multi-language group.
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
     * Create a new language variation from an existing blog.
     *
     * @param string $id ID of blog to clone
     * @param string $language target language of new variant
     * @param string $primaryLanguage language of primary blog to clone
     * @param string $slug path to this blog
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        string $id,
        ?string $language = null,
        ?string $primaryLanguage = null,
        ?string $slug = null,
        RequestOptions|array|null $requestOptions = null,
    ): Blog {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'language' => $language,
                'primaryLanguage' => $primaryLanguage,
                'slug' => $slug,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLanguageVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Detaches a blog from a multi-language group.
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
     * Set a blog as the primary language of a multi-language group.
     *
     * @param string $id ID of object to set as primary in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setNewLangPrimary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Explicitly set new languages for each blog in a multi-language group.
     *
     * @param array<string,\HubspotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageUpdateLanguagesParams\Language|value-of<\HubspotSDK\Cms\Blogs\Settings\MultiLanguage\MultiLanguageUpdateLanguagesParams\Language>> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLanguages(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            ['languages' => $languages, 'primaryID' => $primaryID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLanguages(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
