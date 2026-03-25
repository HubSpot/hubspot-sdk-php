<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams\Channel;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Unsubscribe a subscriber from all communication channels. This endpoint allows you to remove a subscriber from all communication preferences, effectively opting them out from receiving any further communications. This can be useful for ensuring compliance with user requests or legal requirements.
 *
 * @see HubspotSDK\Services\CommunicationPreferencesService::unsubscribeAll()
 *
 * @phpstan-type CommunicationPreferenceUnsubscribeAllParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   businessUnitID?: int|null,
 *   verbose?: bool|null,
 * }
 */
final class CommunicationPreferenceUnsubscribeAllParams implements BaseModel
{
    /** @use SdkModel<CommunicationPreferenceUnsubscribeAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The communication channel from which to unsubscribe the subscriber. Must be 'EMAIL'.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The ID of the business unit associated with the subscriber. This is an optional parameter.
     */
    #[Optional]
    public ?int $businessUnitID;

    /**
     * A boolean flag indicating whether to include detailed information in the response. Defaults to false.
     */
    #[Optional]
    public ?bool $verbose;

    /**
     * `new CommunicationPreferenceUnsubscribeAllParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunicationPreferenceUnsubscribeAllParams::with(channel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunicationPreferenceUnsubscribeAllParams)->withChannel(...)
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
     */
    public static function with(
        Channel|string $channel,
        ?int $businessUnitID = null,
        ?bool $verbose = null
    ): self {
        $self = new self;

        $self['channel'] = $channel;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $verbose && $self['verbose'] = $verbose;

        return $self;
    }

    /**
     * The communication channel from which to unsubscribe the subscriber. Must be 'EMAIL'.
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
     * The ID of the business unit associated with the subscriber. This is an optional parameter.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * A boolean flag indicating whether to include detailed information in the response. Defaults to false.
     */
    public function withVerbose(bool $verbose): self
    {
        $self = clone $this;
        $self['verbose'] = $verbose;

        return $self;
    }
}
