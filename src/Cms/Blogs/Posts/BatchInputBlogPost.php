<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Wrapper for providing an array of blog posts as inputs.
 *
 * @phpstan-type BatchInputBlogPostShape = array{inputs: list<mixed>}
 */
final class BatchInputBlogPost implements BaseModel
{
    /** @use SdkModel<BatchInputBlogPostShape> */
    use SdkModel;

    /**
     * Blog posts to input.
     *
     * @var list<mixed> $inputs
     */
    #[Required(list: BlogPost::class)]
    public array $inputs;

    /**
     * `new BatchInputBlogPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputBlogPost::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputBlogPost)->withInputs(...)
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
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Blog posts to input.
     *
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
