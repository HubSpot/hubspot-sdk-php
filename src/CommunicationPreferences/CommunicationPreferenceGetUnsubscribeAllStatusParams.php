<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences;

use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Check whether a contact has unsubscribed from all email subscriptions. If a contact has not opted out of all communications, the response `results` array will be empty.
 *
 * @see HubSpotSDK\Services\CommunicationPreferencesService::getUnsubscribeAllStatus()
 *
 * @phpstan-type CommunicationPreferenceGetUnsubscribeAllStatusParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   businessUnitID?: int|null,
 *   verbose?: bool|null,
 * }
 */
final class CommunicationPreferenceGetUnsubscribeAllStatusParams implements BaseModel
{
    /** @use SdkModel<CommunicationPreferenceGetUnsubscribeAllStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Channel> $channel */
    #[Required(enum: Channel::class)]
    public string $channel;

    #[Optional]
    public ?int $businessUnitID;

    #[Optional]
    public ?bool $verbose;

    /**
     * `new CommunicationPreferenceGetUnsubscribeAllStatusParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunicationPreferenceGetUnsubscribeAllStatusParams::with(channel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunicationPreferenceGetUnsubscribeAllStatusParams)->withChannel(...)
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
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

        return $self;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    public function withVerbose(bool $verbose): self
    {
        $self = clone $this;
        $self['verbose'] = $verbose;

        return $self;
    }
}
