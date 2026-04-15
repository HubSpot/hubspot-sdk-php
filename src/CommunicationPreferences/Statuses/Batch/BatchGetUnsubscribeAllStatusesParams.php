<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\Statuses\Batch;

use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams\Channel;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Checks whether a set of contacts have opted out of all communications.
 *
 * @see HubSpotSDK\Services\CommunicationPreferences\Statuses\BatchService::getUnsubscribeAllStatuses()
 *
 * @phpstan-type BatchGetUnsubscribeAllStatusesParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   inputs: list<string>,
 *   businessUnitID?: int|null,
 * }
 */
final class BatchGetUnsubscribeAllStatusesParams implements BaseModel
{
    /** @use SdkModel<BatchGetUnsubscribeAllStatusesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The communication channel to filter the unsubscribe statuses. This parameter is required and currently supports 'EMAIL' as a valid value.
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
     * The ID of the business unit to filter the results. This is an optional parameter.
     */
    #[Optional]
    public ?int $businessUnitID;

    /**
     * `new BatchGetUnsubscribeAllStatusesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetUnsubscribeAllStatusesParams::with(channel: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetUnsubscribeAllStatusesParams)->withChannel(...)->withInputs(...)
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
     * The communication channel to filter the unsubscribe statuses. This parameter is required and currently supports 'EMAIL' as a valid value.
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
     * The ID of the business unit to filter the results. This is an optional parameter.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }
}
