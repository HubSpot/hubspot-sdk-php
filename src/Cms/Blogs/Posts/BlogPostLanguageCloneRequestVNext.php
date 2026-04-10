<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Posts;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BlogPostLanguageCloneRequestVNextShape = array{
 *   id: string, language?: string|null
 * }
 */
final class BlogPostLanguageCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<BlogPostLanguageCloneRequestVNextShape> */
    use SdkModel;

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
     * `new BlogPostLanguageCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogPostLanguageCloneRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogPostLanguageCloneRequestVNext)->withID(...)
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
