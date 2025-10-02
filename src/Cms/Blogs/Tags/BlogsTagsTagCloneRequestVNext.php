<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type blogs_tags_tag_clone_request_v_next = array{
 *   id: string, name: string, language?: string, primaryLanguage?: string
 * }
 */
final class BlogsTagsTagCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<blogs_tags_tag_clone_request_v_next> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $language;

    #[Api(optional: true)]
    public ?string $primaryLanguage;

    /**
     * `new BlogsTagsTagCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogsTagsTagCloneRequestVNext::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogsTagsTagCloneRequestVNext)->withID(...)->withName(...)
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
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;

        null !== $language && $obj->language = $language;
        null !== $primaryLanguage && $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }
}
