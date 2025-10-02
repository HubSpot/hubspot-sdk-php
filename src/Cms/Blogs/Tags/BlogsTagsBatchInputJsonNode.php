<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type blogs_tags_batch_input_json_node = array{inputs: list<mixed>}
 */
final class BlogsTagsBatchInputJsonNode implements BaseModel
{
    /** @use SdkModel<blogs_tags_batch_input_json_node> */
    use SdkModel;

    /** @var list<mixed> $inputs */
    #[Api(list: 'mixed')]
    public array $inputs;

    /**
     * `new BlogsTagsBatchInputJsonNode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogsTagsBatchInputJsonNode::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogsTagsBatchInputJsonNode)->withInputs(...)
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
     * @param list<mixed> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
