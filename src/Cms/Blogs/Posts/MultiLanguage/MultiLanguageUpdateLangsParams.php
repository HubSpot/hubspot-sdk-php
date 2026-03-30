<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts\MultiLanguage;

use HubspotSDK\Cms\Blogs\Posts\MultiLanguage\MultiLanguageUpdateLangsParams\Language;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Explicitly set new languages for each post in a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
 *
 * @see HubspotSDK\Services\Cms\Blogs\Posts\MultiLanguageService::updateLangs()
 *
 * @phpstan-type MultiLanguageUpdateLangsParamsShape = array{
 *   languages: array<string,Language|value-of<Language>>, primaryID: string
 * }
 */
final class MultiLanguageUpdateLangsParams implements BaseModel
{
    /** @use SdkModel<MultiLanguageUpdateLangsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Map of object IDs to associated languages of object in the multi-language group.
     *
     * @var array<string,value-of<Language>> $languages
     */
    #[Required(map: Language::class)]
    public array $languages;

    /**
     * ID of the primary object in the multi-language group.
     */
    #[Required('primaryId')]
    public string $primaryID;

    /**
     * `new MultiLanguageUpdateLangsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiLanguageUpdateLangsParams::with(languages: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultiLanguageUpdateLangsParams)->withLanguages(...)->withPrimaryID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,Language|value-of<Language>> $languages
     */
    public static function with(array $languages, string $primaryID): self
    {
        $self = new self;

        $self['languages'] = $languages;
        $self['primaryID'] = $primaryID;

        return $self;
    }

    /**
     * Map of object IDs to associated languages of object in the multi-language group.
     *
     * @param array<string,Language|value-of<Language>> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    /**
     * ID of the primary object in the multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $self = clone $this;
        $self['primaryID'] = $primaryID;

        return $self;
    }
}
