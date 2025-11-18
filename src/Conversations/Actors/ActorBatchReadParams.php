<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Actors;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Resolve a set of `ActorId`s to the underlying actors/participants.
 *
 * @see HubspotSDK\Services\Conversations\ActorsService::batchRead()
 *
 * @phpstan-type ActorBatchReadParamsShape = array{
 *   inputs: list<string>, property?: string
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
    #[Api(list: 'string')]
    public array $inputs;

    /**
     * A specific property to include in the actor response.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->inputs = $inputs;

        null !== $property && $obj->property = $property;

        return $obj;
    }

    /**
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * A specific property to include in the actor response.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }
}
