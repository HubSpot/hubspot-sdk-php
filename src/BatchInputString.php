<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputStringShape = array{inputs: list<string>}
 */
final class BatchInputString implements BaseModel
{
    /** @use SdkModel<BatchInputStringShape> */
    use SdkModel;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Required(list: 'string')]
    public array $inputs;

    /**
     * `new BatchInputString()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputString::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputString)->withInputs(...)
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
     * @param list<string> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
