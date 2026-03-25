<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Check whether a contact has unsubscribed from all email subscriptions. If a contact has not opted out of all communications, the response `results` array will be empty.
 *
 * @see HubspotSDK\Services\CommunicationPreferencesService::getUnsubscribeAllStatus()
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

    /**
     * The communication channel to unsubscribe from. Must be 'EMAIL'.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The ID of the business unit associated with the communication preferences.
     */
    #[Optional]
    public ?int $businessUnitID;

    /**
     * A boolean indicating whether to include detailed information in the response. Defaults to false.
     */
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
     * The ID of the business unit associated with the communication preferences.
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
