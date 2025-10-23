<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for creating new language variant blog.
 *
 * @phpstan-type blog_language_clone_request_v_next = array{
 *   id: string, language?: string, primaryLanguage?: string, slug?: string
 * }
 */
final class BlogLanguageCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<blog_language_clone_request_v_next> */
    use SdkModel;

    /**
     * ID of blog to clone.
     */
    #[Api]
    public string $id;

    /**
     * Target language of new variant.
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * Language of primary blog to clone.
     */
    #[Api(optional: true)]
    public ?string $primaryLanguage;

    /**
     * Path to this blog.
     */
    #[Api(optional: true)]
    public ?string $slug;

    /**
     * `new BlogLanguageCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogLanguageCloneRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogLanguageCloneRequestVNext)->withID(...)
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
        $obj = new self;

        $obj->id = $id;

        null !== $language && $obj->language = $language;
        null !== $primaryLanguage && $obj->primaryLanguage = $primaryLanguage;
        null !== $slug && $obj->slug = $slug;

        return $obj;
    }

    /**
     * ID of blog to clone.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Target language of new variant.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    /**
     * Language of primary blog to clone.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }

    /**
     * Path to this blog.
     */
    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }
}
