<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type blogs_tags_attach_to_lang_primary_request_v_next = array{
 *   id: string, language: string, primaryID: string, primaryLanguage?: string
 * }
 */
final class BlogsTagsAttachToLangPrimaryRequestVNext implements BaseModel
{
    /** @use SdkModel<blogs_tags_attach_to_lang_primary_request_v_next> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $language;

    #[Api('primaryId')]
    public string $primaryID;

    #[Api(optional: true)]
    public ?string $primaryLanguage;

    /**
     * `new BlogsTagsAttachToLangPrimaryRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogsTagsAttachToLangPrimaryRequestVNext::with(
     *   id: ..., language: ..., primaryID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogsTagsAttachToLangPrimaryRequestVNext)
     *   ->withID(...)
     *   ->withLanguage(...)
     *   ->withPrimaryID(...)
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
        string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->language = $language;
        $obj->primaryID = $primaryID;

        null !== $primaryLanguage && $obj->primaryLanguage = $primaryLanguage;

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

    public function withPrimaryID(string $primaryID): self
    {
        $obj = clone $this;
        $obj->primaryID = $primaryID;

        return $obj;
    }

    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj->primaryLanguage = $primaryLanguage;

        return $obj;
    }
}
