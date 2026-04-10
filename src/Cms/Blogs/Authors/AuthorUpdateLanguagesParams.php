<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Authors;

use HubSpotSDK\Cms\Blogs\Authors\AuthorUpdateLanguagesParams\Language;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Explicitly set new languages for each Blog Author in a multi-language group.
 *
 * @see HubSpotSDK\Services\Cms\Blogs\AuthorsService::updateLanguages()
 *
 * @phpstan-type AuthorUpdateLanguagesParamsShape = array{
 *   languages: array<string,Language|value-of<Language>>, primaryID: string
 * }
 */
final class AuthorUpdateLanguagesParams implements BaseModel
{
    /** @use SdkModel<AuthorUpdateLanguagesParamsShape> */
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
     * `new AuthorUpdateLanguagesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorUpdateLanguagesParams::with(languages: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorUpdateLanguagesParams)->withLanguages(...)->withPrimaryID(...)
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
