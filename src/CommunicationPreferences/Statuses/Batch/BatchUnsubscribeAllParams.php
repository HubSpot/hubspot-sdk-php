<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\Statuses\Batch;

use HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams\Channel;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Unsubscribe a set of contacts from all email subscriptions.
 *
 * @see HubspotSDK\Services\CommunicationPreferences\Statuses\BatchService::unsubscribeAll()
 *
 * @phpstan-type BatchUnsubscribeAllParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   inputs: list<string>,
 *   businessUnitID?: int|null,
 *   verbose?: bool|null,
 * }
 */
final class BatchUnsubscribeAllParams implements BaseModel
{
    /** @use SdkModel<BatchUnsubscribeAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A required string specifying the communication channel. Currently, only 'EMAIL' is supported.
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
     * The ID of the business unit to which the operation applies. It is an optional parameter.
     */
    #[Optional]
    public ?int $businessUnitID;

    /**
     * A boolean indicating whether to include detailed information in the response. Defaults to false.
     */
    #[Optional]
    public ?bool $verbose;

    /**
     * `new BatchUnsubscribeAllParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUnsubscribeAllParams::with(channel: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUnsubscribeAllParams)->withChannel(...)->withInputs(...)
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
        ?int $businessUnitID = null,
        ?bool $verbose = null,
    ): self {
        $self = new self;

        $self['channel'] = $channel;
        $self['inputs'] = $inputs;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $verbose && $self['verbose'] = $verbose;

        return $self;
    }

    /**
     * A required string specifying the communication channel. Currently, only 'EMAIL' is supported.
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
     * The ID of the business unit to which the operation applies. It is an optional parameter.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * A boolean indicating whether to include detailed information in the response. Defaults to false.
     */
    public function withVerbose(bool $verbose): self
    {
        $self = clone $this;
        $self['verbose'] = $verbose;

        return $self;
    }
}
