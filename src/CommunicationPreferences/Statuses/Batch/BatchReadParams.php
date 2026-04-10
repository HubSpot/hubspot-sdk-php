<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\Statuses\Batch;

use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Batch retrieve subscription statuses for a set of contacts.
 *
 * @see HubSpotSDK\Services\CommunicationPreferences\Statuses\BatchService::read()
 *
 * @phpstan-type BatchReadParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   inputs: list<string>,
 *   businessUnitID?: int|null,
 * }
 */
final class BatchReadParams implements BaseModel
{
    /** @use SdkModel<BatchReadParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Required(list: 'string')]
    public array $inputs;

    #[Optional]
    public ?int $businessUnitID;

    /**
     * `new BatchReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReadParams::with(channel: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReadParams)->withChannel(...)->withInputs(...)
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
     * @param Channel|value-of<Channel> $channel
     * @param list<string> $inputs
     */
    public static function with(
        Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null
    ): self {
        $self = new self;

        $self['channel'] = $channel;
        $self['inputs'] = $inputs;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

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

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }
}
