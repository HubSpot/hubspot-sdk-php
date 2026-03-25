<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\AuthorsService::createLanguageVariation()
 *
 * @phpstan-import-type BlogAuthorShape from \HubspotSDK\Cms\Blogs\Authors\BlogAuthor
 *
 * @phpstan-type AuthorCreateLanguageVariationParamsShape = array{
 *   id: string,
 *   blogAuthor: BlogAuthor|BlogAuthorShape,
 *   language?: string|null,
 *   primaryLanguage?: string|null,
 * }
 */
final class AuthorCreateLanguageVariationParams implements BaseModel
{
    /** @use SdkModel<AuthorCreateLanguageVariationParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new AuthorCreateLanguageVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorCreateLanguageVariationParams::with(id: ..., blogAuthor: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorCreateLanguageVariationParams)->withID(...)->withBlogAuthor(...)
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
