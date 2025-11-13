<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create the Blog Tag objects detailed in the request body.
 *
 * @see HubspotSDK\Services\Cms\Blogs\TagsService::createBatch()
 *
 * @phpstan-type TagCreateBatchParamsShape = array{inputs: list<Tag>}
 */
final class TagCreateBatchParams implements BaseModel
{
    /** @use SdkModel<TagCreateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Blog tags to input.
     *
     * @var list<Tag> $inputs
     */
    #[Api(list: Tag::class)]
    public array $inputs;

    /**
     * `new TagCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagCreateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagCreateBatchParams)->withInputs(...)
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
     * @param list<Tag> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Blog tags to input.
     *
     * @param list<Tag> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
