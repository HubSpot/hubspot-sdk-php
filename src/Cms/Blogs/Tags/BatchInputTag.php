<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Wrapper for providing an array of blog tags as inputs.
 *
 * @phpstan-import-type TagShape from \HubspotSDK\Cms\Blogs\Tags\Tag
 *
 * @phpstan-type BatchInputTagShape = array{inputs: list<Tag|TagShape>}
 */
final class BatchInputTag implements BaseModel
{
    /** @use SdkModel<BatchInputTagShape> */
    use SdkModel;

    /**
     * Blog tags to input.
     *
     * @var list<Tag> $inputs
     */
    #[Required(list: Tag::class)]
    public array $inputs;

    /**
     * `new BatchInputTag()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputTag::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputTag)->withInputs(...)
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
     * @param list<Tag|TagShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Blog tags to input.
     *
     * @param list<Tag|TagShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
