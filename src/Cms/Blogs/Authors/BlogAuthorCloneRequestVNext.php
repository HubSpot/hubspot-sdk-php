<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Authors;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BlogAuthorShape from \HubSpotSDK\Cms\Blogs\Authors\BlogAuthor
 *
 * @phpstan-type BlogAuthorCloneRequestVNextShape = array{
 *   id: string,
 *   blogAuthor: BlogAuthor|BlogAuthorShape,
 *   language?: string|null,
 *   primaryLanguage?: string|null,
 * }
 */
final class BlogAuthorCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<BlogAuthorCloneRequestVNextShape> */
    use SdkModel;

    /**
     * ID of the object to be cloned.
     */
    #[Required]
    public string $id;

    #[Required]
    public BlogAuthor $blogAuthor;

    /**
     * Language of newly cloned object.
     */
    #[Optional]
    public ?string $language;

    /**
     * Primary language in multi-language group.
     */
    #[Optional]
    public ?string $primaryLanguage;

    /**
     * `new BlogAuthorCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogAuthorCloneRequestVNext::with(id: ..., blogAuthor: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogAuthorCloneRequestVNext)->withID(...)->withBlogAuthor(...)
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
     * @param BlogAuthor|BlogAuthorShape $blogAuthor
     */
    public static function with(
        string $id,
        BlogAuthor|array $blogAuthor,
        ?string $language = null,
        ?string $primaryLanguage = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['blogAuthor'] = $blogAuthor;

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
     * @param BlogAuthor|BlogAuthorShape $blogAuthor
     */
    public function withBlogAuthor(BlogAuthor|array $blogAuthor): self
    {
        $self = clone $this;
        $self['blogAuthor'] = $blogAuthor;

        return $self;
    }

    /**
     * Language of newly cloned object.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Primary language in multi-language group.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $self = clone $this;
        $self['primaryLanguage'] = $primaryLanguage;

        return $self;
    }
}
