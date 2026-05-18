<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\SitePages\MultiLanguage;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new language variation from an existing website page. The variation will be a copy of the draft state of the source page. To preview the content, you can [retrieve the draft of the source website page](/api-reference/latest/cms/pages/website-pages/drafts/get-website-page-draft).
 *
 * @see HubSpotSDK\Services\Cms\Pages\SitePages\MultiLanguageService::createLanguageVariation()
 *
 * @phpstan-type MultiLanguageCreateLanguageVariationParamsShape = array{
 *   id: string,
 *   language?: string|null,
 *   primaryLanguage?: string|null,
 *   usePublished?: bool|null,
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

    #[Optional]
    public ?bool $usePublished;

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
        ?bool $usePublished = null,
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $language && $self['language'] = $language;
        null !== $primaryLanguage && $self['primaryLanguage'] = $primaryLanguage;
        null !== $usePublished && $self['usePublished'] = $usePublished;

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

    public function withUsePublished(bool $usePublished): self
    {
        $self = clone $this;
        $self['usePublished'] = $usePublished;

        return $self;
    }
}
