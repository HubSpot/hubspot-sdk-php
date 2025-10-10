<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type blog_post_language_clone_request_v_next = array{
 *   id: string, language?: string
 * }
 */
final class BlogPostLanguageCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<blog_post_language_clone_request_v_next> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->id = $id;

        null !== $language && $obj->language = $language;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }
}
