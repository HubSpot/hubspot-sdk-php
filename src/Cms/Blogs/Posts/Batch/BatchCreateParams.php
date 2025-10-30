<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts\Batch;

use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a batch of blog posts, specifying their content in the request body.
 *
 * @see HubspotSDK\Cms\Blogs\Posts\Batch->create
 *
 * @phpstan-type BatchCreateParamsShape = array{inputs: list<BlogPost>}
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Blog posts to input.
     *
     * @var list<BlogPost> $inputs
     */
    #[Api(list: BlogPost::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<BlogPost> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Blog posts to input.
     *
     * @param list<BlogPost> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
