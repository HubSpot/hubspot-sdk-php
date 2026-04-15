<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences;

use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams\Channel;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a contact's current email subscription preferences.
 *
 * @see HubSpotSDK\Services\CommunicationPreferencesService::getStatuses()
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
     * The communication channel for which the subscription status is being retrieved. This parameter is required and currently supports only 'EMAIL'.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The ID of the business unit to filter the subscription status by. This is an optional parameter.
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
     * The communication channel for which the subscription status is being retrieved. This parameter is required and currently supports only 'EMAIL'.
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
     * The ID of the business unit to filter the subscription status by. This is an optional parameter.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }
}
