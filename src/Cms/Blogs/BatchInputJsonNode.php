<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputJsonNodeShape = array{inputs: list<mixed>}
 */
final class BatchInputJsonNode implements BaseModel
{
    /** @use SdkModel<BatchInputJsonNodeShape> */
    use SdkModel;

    /**
     * JSON nodes to input.
     *
     * @var list<mixed> $inputs
     */
    #[Required(list: 'mixed')]
    public array $inputs;

    /**
     * `new BatchInputJsonNode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputJsonNode::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputJsonNode)->withInputs(...)
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
     * JSON nodes to input.
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
