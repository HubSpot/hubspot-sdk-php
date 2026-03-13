<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Wrapper for providing an array of blog authors as inputs.
 *
 * @phpstan-import-type BlogAuthorShape from \HubspotSDK\Cms\Blogs\Authors\BlogAuthor
 *
 * @phpstan-type BatchInputBlogAuthorShape = array{
 *   inputs: list<BlogAuthor|BlogAuthorShape>
 * }
 */
final class BatchInputBlogAuthor implements BaseModel
{
    /** @use SdkModel<BatchInputBlogAuthorShape> */
    use SdkModel;

    /**
     * Blog authors to input.
     *
     * @var list<BlogAuthor> $inputs
     */
    #[Required(list: BlogAuthor::class)]
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
     * @param list<BlogAuthor|BlogAuthorShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Blog authors to input.
     *
     * @param list<BlogAuthor|BlogAuthorShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
