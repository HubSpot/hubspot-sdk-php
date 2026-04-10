<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms;

use HubSpotSDK\Cms\UpdateLanguagesRequestVNext\Language;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type UpdateLanguagesRequestVNextShape = array{
 *   languages: array<string,Language|value-of<Language>>, primaryID: string
 * }
 */
final class UpdateLanguagesRequestVNext implements BaseModel
{
    /** @use SdkModel<UpdateLanguagesRequestVNextShape> */
    use SdkModel;

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
     * `new UpdateLanguagesRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UpdateLanguagesRequestVNext::with(languages: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UpdateLanguagesRequestVNext)->withLanguages(...)->withPrimaryID(...)
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
