<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new language variation from an existing Blog Tag.
 *
 * @see HubspotSDK\Services\Cms\Blogs\TagsService::createLangVariation()
 *
 * @phpstan-type TagCreateLangVariationParamsShape = array{
 *   id: string, name: string, language?: string, primaryLanguage?: string
 * }
 */
final class TagCreateLangVariationParams implements BaseModel
{
    /** @use SdkModel<TagCreateLangVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to be cloned.
     */
    #[Required]
    public string $id;

    /**
     * Name of newly cloned blog tag.
     */
    #[Required]
    public string $name;

    /**
     * Target language of new variant.
     */
    #[Optional]
    public ?string $language;

    /**
     * Language of primary blog tag to clone.
     */
    #[Optional]
    public ?string $primaryLanguage;

    /**
     * `new TagCreateLangVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagCreateLangVariationParams::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagCreateLangVariationParams)->withID(...)->withName(...)
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
        string $name,
        ?string $language = null,
        ?string $primaryLanguage = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;

        null !== $language && $self['language'] = $language;
        null !== $primaryLanguage && $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }

    /**
     * ID of the object to be cloned.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Name of newly cloned blog tag.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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
     * Language of primary blog tag to clone.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $self = clone $this;
        $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }
}
