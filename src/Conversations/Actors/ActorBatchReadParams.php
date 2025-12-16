<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Actors;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\ActorsService::batchRead()
 *
 * @phpstan-type ActorBatchReadParamsShape = array{
 *   inputs: list<string>, property?: string|null
 * }
 */
final class ActorBatchReadParams implements BaseModel
{
    /** @use SdkModel<ActorBatchReadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Required(list: 'string')]
    public array $inputs;

    #[Optional]
    public ?string $property;

    /**
     * `new ActorBatchReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActorBatchReadParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActorBatchReadParams)->withInputs(...)
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
    public static function with(array $inputs, ?string $property = null): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        null !== $property && $self['property'] = $property;

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

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }
}
