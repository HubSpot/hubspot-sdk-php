<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams\Channel;

/**
 * Batch retrieve subscription statuses for a set of contacts.
 *
 * @see HubspotSDK\Services\Marketing\Subscriptions\V4\StatusesService::batchGet()
 *
 * @phpstan-type StatusBatchGetParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   inputs: list<string>,
 *   businessUnitID?: int|null,
 * }
 */
final class StatusBatchGetParams implements BaseModel
{
    /** @use SdkModel<StatusBatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
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
     * If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     */
    #[Optional]
    public ?int $businessUnitID;

    /**
     * `new StatusBatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusBatchGetParams::with(channel: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusBatchGetParams)->withChannel(...)->withInputs(...)
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
     * The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
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
     * If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }
}
