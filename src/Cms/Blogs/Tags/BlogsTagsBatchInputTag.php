<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type blogs_tags_batch_input_tag = array{inputs: list<BlogsTagsTag>}
 */
final class BlogsTagsBatchInputTag implements BaseModel
{
    /** @use SdkModel<blogs_tags_batch_input_tag> */
    use SdkModel;

    /** @var list<BlogsTagsTag> $inputs */
    #[Api(list: BlogsTagsTag::class)]
    public array $inputs;

    /**
     * `new BlogsTagsBatchInputTag()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogsTagsBatchInputTag::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogsTagsBatchInputTag)->withInputs(...)
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
     * @param list<BlogsTagsTag> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<BlogsTagsTag> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
