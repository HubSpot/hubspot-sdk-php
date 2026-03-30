<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\MultiLanguage;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new language variation from an existing site page.
 *
 * @see HubspotSDK\Services\Cms\Pages\MultiLanguageService::createLanguageVariation()
 *
 * @phpstan-type MultiLanguageCreateLanguageVariationParamsShape = array{
 *   id: string, language?: string|null, primaryLanguage?: string|null
 * }
 */
final class MultiLanguageCreateLanguageVariationParams implements BaseModel
{
    /** @use SdkModel<MultiLanguageCreateLanguageVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of content to clone.
     */
    #[Required]
    public string $id;

    /**
     * Target language of new variant.
     */
    #[Optional]
    public ?string $language;

    /**
     * Language of primary content to clone.
     */
    #[Optional]
    public ?string $primaryLanguage;

    /**
     * `new MultiLanguageCreateLanguageVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiLanguageCreateLanguageVariationParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultiLanguageCreateLanguageVariationParams)->withID(...)
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
     */
    public static function with(
        string $id,
        ?string $language = null,
        ?string $primaryLanguage = null
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $language && $self['language'] = $language;
        null !== $primaryLanguage && $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }

    /**
     * ID of content to clone.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Target language of new variant.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Language of primary content to clone.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $self = clone $this;
        $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }
}
