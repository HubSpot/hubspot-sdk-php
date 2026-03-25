<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings\MultiLanguage;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\Settings\MultiLanguageService::createLanguageVariation()
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

    #[Required]
    public string $id;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?string $primaryLanguage;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $self = clone $this;
        $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }
}
