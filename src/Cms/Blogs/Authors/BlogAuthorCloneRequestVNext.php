<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Cms\Blogs\Authors\BlogAuthor\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for cloning blog authors.
 *
 * @phpstan-type BlogAuthorCloneRequestVNextShape = array{
 *   id: string,
 *   blogAuthor: BlogAuthor,
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
    #[Api]
    public string $id;

    /**
     * Model definition for a Blog Author.
     */
    #[Api]
    public BlogAuthor $blogAuthor;

    /**
     * Language of newly cloned object.
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * Primary language in multi-language group.
     */
    #[Api(optional: true)]
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
     * @param BlogAuthor|array{
     *   id: string,
     *   avatar: string,
     *   bio: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   displayName: string,
     *   email: string,
     *   facebook: string,
     *   fullName: string,
     *   language: value-of<Language>,
     *   linkedin: string,
     *   name: string,
     *   slug: string,
     *   translatedFromId: int,
     *   twitter: string,
     *   updated: \DateTimeInterface,
     *   website: string,
     * } $blogAuthor
     */
    public static function with(
        string $id,
        BlogAuthor|array $blogAuthor,
        ?string $language = null,
        ?string $primaryLanguage = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['blogAuthor'] = $blogAuthor;

        null !== $language && $obj['language'] = $language;
        null !== $primaryLanguage && $obj['primaryLanguage'] = $primaryLanguage;

        return $obj;
    }

    /**
     * ID of the object to be cloned.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Model definition for a Blog Author.
     *
     * @param BlogAuthor|array{
     *   id: string,
     *   avatar: string,
     *   bio: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   displayName: string,
     *   email: string,
     *   facebook: string,
     *   fullName: string,
     *   language: value-of<Language>,
     *   linkedin: string,
     *   name: string,
     *   slug: string,
     *   translatedFromId: int,
     *   twitter: string,
     *   updated: \DateTimeInterface,
     *   website: string,
     * } $blogAuthor
     */
    public function withBlogAuthor(BlogAuthor|array $blogAuthor): self
    {
        $obj = clone $this;
        $obj['blogAuthor'] = $blogAuthor;

        return $obj;
    }

    /**
     * Language of newly cloned object.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * Primary language in multi-language group.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj['primaryLanguage'] = $primaryLanguage;

        return $obj;
    }
}
