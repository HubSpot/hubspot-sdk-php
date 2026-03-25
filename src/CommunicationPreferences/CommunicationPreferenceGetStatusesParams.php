<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams\Channel;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a contact's current email subscription preferences.
 *
 * @see HubspotSDK\Services\CommunicationPreferencesService::getStatuses()
 *
 * @phpstan-type CommunicationPreferenceGetStatusesParamsShape = array{
 *   channel: Channel|value-of<Channel>, businessUnitID?: int|null
 * }
 */
final class CommunicationPreferenceGetStatusesParams implements BaseModel
{
    /** @use SdkModel<CommunicationPreferenceGetStatusesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A required string indicating the communication channel to retrieve the status for. Valid value is 'EMAIL'.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * An optional integer representing the business unit ID to filter the subscription status.
     */
    #[Optional]
    public ?int $businessUnitID;

    /**
     * `new CommunicationPreferenceGetStatusesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunicationPreferenceGetStatusesParams::with(channel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunicationPreferenceGetStatusesParams)->withChannel(...)
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
        ?int $businessUnitID = null
    ): self {
        $self = new self;

        $self['channel'] = $channel;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * A required string indicating the communication channel to retrieve the status for. Valid value is 'EMAIL'.
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
     * An optional integer representing the business unit ID to filter the subscription status.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }
}
