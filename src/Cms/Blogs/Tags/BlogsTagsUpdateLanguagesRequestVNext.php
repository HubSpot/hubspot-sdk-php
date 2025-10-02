<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type blogs_tags_update_languages_request_v_next = array{
 *   languages: array<string, string>, primaryID: string
 * }
 */
final class BlogsTagsUpdateLanguagesRequestVNext implements BaseModel
{
    /** @use SdkModel<blogs_tags_update_languages_request_v_next> */
    use SdkModel;

    /** @var array<string, string> $languages */
    #[Api(map: 'string')]
    public array $languages;

    #[Api('primaryId')]
    public string $primaryID;

    /**
     * `new BlogsTagsUpdateLanguagesRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogsTagsUpdateLanguagesRequestVNext::with(languages: ..., primaryID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogsTagsUpdateLanguagesRequestVNext)
     *   ->withLanguages(...)
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
     *
     * @param array<string, string> $languages
     */
    public static function with(array $languages, string $primaryID): self
    {
        $obj = new self;

        $obj->languages = $languages;
        $obj->primaryID = $primaryID;

        return $obj;
    }

    /**
     * @param array<string, string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $obj = clone $this;
        $obj->languages = $languages;

        return $obj;
    }

    public function withPrimaryID(string $primaryID): self
    {
        $obj = clone $this;
        $obj->primaryID = $primaryID;

        return $obj;
    }
}
