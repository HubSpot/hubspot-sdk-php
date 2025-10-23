<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Wrapper for providing an array of blog authors as inputs.
 *
 * @phpstan-type batch_input_blog_author = array{inputs: list<BlogAuthor>}
 */
final class BatchInputBlogAuthor implements BaseModel
{
    /** @use SdkModel<batch_input_blog_author> */
    use SdkModel;

    /**
     * Blog authors to input.
     *
     * @var list<BlogAuthor> $inputs
     */
    #[Api(list: BlogAuthor::class)]
    public array $inputs;

    /**
     * `new BatchInputBlogAuthor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputBlogAuthor::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputBlogAuthor)->withInputs(...)
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
     * @param list<BlogAuthor> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Blog authors to input.
     *
     * @param list<BlogAuthor> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
