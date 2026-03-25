<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\Statuses\Batch;

use HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams\Channel;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the subscription statuses for multiple subscribers in a batch operation. This endpoint allows you to check the communication preferences of several subscribers at once, which is useful for managing large lists of contacts efficiently.
 *
 * @see HubspotSDK\Services\CommunicationPreferences\Statuses\BatchService::read()
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

    /**
     * The communication channel to filter by. This parameter is required and currently only supports 'EMAIL'.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Required(list: 'string')]
    public array $inputs;

    /**
     * An optional identifier for the business unit. This is an integer value.
     */
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
     * The communication channel to filter by. This parameter is required and currently only supports 'EMAIL'.
     *
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

    /**
     * An optional identifier for the business unit. This is an integer value.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }
}
