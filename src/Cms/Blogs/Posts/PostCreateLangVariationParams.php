<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new language variation from an existing blog post.
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::createLangVariation()
 *
 * @phpstan-type PostCreateLangVariationParamsShape = array{
 *   id: string, language?: string
 * }
 */
final class PostCreateLangVariationParams implements BaseModel
{
    /** @use SdkModel<PostCreateLangVariationParamsShape> */
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
     * `new PostCreateLangVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostCreateLangVariationParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostCreateLangVariationParams)->withID(...)
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
