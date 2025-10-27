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
 * @see HubspotSDK\Conversations\Actors->batchRead
 *
 * @phpstan-type actor_batch_read_params = array{inputs: list<string>}
 */
final class ActorBatchReadParams implements BaseModel
{
    /** @use SdkModel<actor_batch_read_params> */
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
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

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
}
