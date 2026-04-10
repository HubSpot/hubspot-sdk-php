<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Posts\MultiLanguage;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new language variation from an existing blog post.
 *
 * @see HubSpotSDK\Services\Cms\Blogs\Posts\MultiLanguageService::createLangVariation()
 *
 * @phpstan-type MultiLanguageCreateLangVariationParamsShape = array{
 *   id: string, language?: string|null
 * }
 */
final class MultiLanguageCreateLangVariationParams implements BaseModel
{
    /** @use SdkModel<MultiLanguageCreateLangVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of blog post to clone.
     */
    #[Required]
    public string $id;

    /**
     * Target language of new variant.
     */
    #[Optional]
    public ?string $language;

    /**
     * `new MultiLanguageCreateLangVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiLanguageCreateLangVariationParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultiLanguageCreateLangVariationParams)->withID(...)
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
    public static function with(string $id, ?string $language = null): self
    {
        $self = new self;

        $self['id'] = $id;

        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
     * ID of blog post to clone.
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
}
