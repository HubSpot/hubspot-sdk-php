<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\MultiLanguage;

use HubSpotSDK\Cms\Pages\MultiLanguage\MultiLanguageAttachToLangGroupParams\Language;
use HubSpotSDK\Cms\Pages\MultiLanguage\MultiLanguageAttachToLangGroupParams\PrimaryLanguage;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Attach a site page to a multi-language group.
 *
 * @see HubSpotSDK\Services\Cms\Pages\MultiLanguageService::attachToLangGroup()
 *
 * @phpstan-type MultiLanguageAttachToLangGroupParamsShape = array{
 *   id: string,
 *   language: Language|value-of<Language>,
 *   primaryID: string,
 *   primaryLanguage?: null|PrimaryLanguage|value-of<PrimaryLanguage>,
 * }
 */
final class MultiLanguageAttachToLangGroupParams implements BaseModel
{
    /** @use SdkModel<MultiLanguageAttachToLangGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to add to a multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * Designated language of the object to add to a multi-language group.
     *
     * @var value-of<Language> $language
     */
    #[Required(enum: Language::class)]
    public string $language;

    /**
     * ID of primary language object in multi-language group.
     */
    #[Required('primaryId')]
    public string $primaryID;

    /**
     * Primary language of the multi-language group.
     *
     * @var value-of<PrimaryLanguage>|null $primaryLanguage
     */
    #[Optional(enum: PrimaryLanguage::class)]
    public ?string $primaryLanguage;

    /**
     * `new MultiLanguageAttachToLangGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiLanguageAttachToLangGroupParams::with(
     *   id: ..., language: ..., primaryID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultiLanguageAttachToLangGroupParams)
     *   ->withID(...)
     *   ->withLanguage(...)
     *   ->withPrimaryID(...)
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
     * @param Language|value-of<Language> $language
     * @param PrimaryLanguage|value-of<PrimaryLanguage>|null $primaryLanguage
     */
    public static function with(
        string $id,
        Language|string $language,
        string $primaryID,
        PrimaryLanguage|string|null $primaryLanguage = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['language'] = $language;
        $self['primaryID'] = $primaryID;

        null !== $primaryLanguage && $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }

    /**
     * ID of the object to add to a multi-language group.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Designated language of the object to add to a multi-language group.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * ID of primary language object in multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $self = clone $this;
        $self['primaryID'] = $primaryID;

        return $self;
    }

    /**
     * Primary language of the multi-language group.
     *
     * @param PrimaryLanguage|value-of<PrimaryLanguage> $primaryLanguage
     */
    public function withPrimaryLanguage(
        PrimaryLanguage|string $primaryLanguage
    ): self {
        $self = clone $this;
        $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }
}
