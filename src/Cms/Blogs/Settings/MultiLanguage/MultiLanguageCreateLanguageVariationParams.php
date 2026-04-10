<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Settings\MultiLanguage;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new language variation from an existing blog.
 *
 * @see HubSpotSDK\Services\Cms\Blogs\Settings\MultiLanguageService::createLanguageVariation()
 *
 * @phpstan-type MultiLanguageCreateLanguageVariationParamsShape = array{
 *   id: string,
 *   language?: string|null,
 *   primaryLanguage?: string|null,
 *   slug?: string|null,
 * }
 */
final class MultiLanguageCreateLanguageVariationParams implements BaseModel
{
    /** @use SdkModel<MultiLanguageCreateLanguageVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of blog to clone.
     */
    #[Required]
    public string $id;

    /**
     * Target language of new variant.
     */
    #[Optional]
    public ?string $language;

    /**
     * Language of primary blog to clone.
     */
    #[Optional]
    public ?string $primaryLanguage;

    /**
     * Path to this blog.
     */
    #[Optional]
    public ?string $slug;

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
        ?string $primaryLanguage = null,
        ?string $slug = null,
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $language && $self['language'] = $language;
        null !== $primaryLanguage && $self['primaryLanguage'] = $primaryLanguage;
        null !== $slug && $self['slug'] = $slug;

        return $self;
    }

    /**
     * ID of blog to clone.
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
     * Language of primary blog to clone.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $self = clone $this;
        $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }

    /**
     * Path to this blog.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }
}
