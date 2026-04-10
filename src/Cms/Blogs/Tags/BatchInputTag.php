<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Tags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TagShape from \HubSpotSDK\Cms\Blogs\Tags\Tag
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
