<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences;

use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams\Channel;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Unsubscribe a contact from all email subscriptions.
 *
 * @see HubSpotSDK\Services\CommunicationPreferencesService::unsubscribeAll()
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
     * The communication channel to unsubscribe from. Must be 'EMAIL'.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The ID of the business unit associated with the request. This is an optional integer parameter.
     */
    #[Optional]
    public ?int $businessUnitID;

    /**
     * A boolean indicating whether to include detailed information in the response. Defaults to false.
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
     * The communication channel to unsubscribe from. Must be 'EMAIL'.
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
     * The ID of the business unit associated with the request. This is an optional integer parameter.
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
