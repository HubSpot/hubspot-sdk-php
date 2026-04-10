<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences;

use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\Channel;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\LegalBasis;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\StatusState;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Set the subscription status of a specific contact.
 *
 * @see HubSpotSDK\Services\CommunicationPreferencesService::updateStatus()
 *
 * @phpstan-type CommunicationPreferenceUpdateStatusParamsShape = array{
 *   channel: Channel|value-of<Channel>,
 *   statusState: StatusState|value-of<StatusState>,
 *   subscriptionID: int,
 *   legalBasis?: null|LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string|null,
 * }
 */
final class CommunicationPreferenceUpdateStatusParams implements BaseModel
{
    /** @use SdkModel<CommunicationPreferenceUpdateStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The type of communication channel, with 'EMAIL' as the only supported option.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @var value-of<StatusState> $statusState
     */
    #[Required(enum: StatusState::class)]
    public string $statusState;

    /**
     * The unique identifier of the subscription to be updated.
     */
    #[Required('subscriptionId')]
    public int $subscriptionID;

    /**
     * The legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Optional(enum: LegalBasis::class)]
    public ?string $legalBasis;

    /**
     * An explanation for the legal basis used for communication.
     */
    #[Optional]
    public ?string $legalBasisExplanation;

    /**
     * `new CommunicationPreferenceUpdateStatusParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunicationPreferenceUpdateStatusParams::with(
     *   channel: ..., statusState: ..., subscriptionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunicationPreferenceUpdateStatusParams)
     *   ->withChannel(...)
     *   ->withStatusState(...)
     *   ->withSubscriptionID(...)
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
     * @param StatusState|value-of<StatusState> $statusState
     * @param LegalBasis|value-of<LegalBasis>|null $legalBasis
     */
    public static function with(
        Channel|string $channel,
        StatusState|string $statusState,
        int $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $self = new self;

        $self['channel'] = $channel;
        $self['statusState'] = $statusState;
        $self['subscriptionID'] = $subscriptionID;

        null !== $legalBasis && $self['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }

    /**
     * The type of communication channel, with 'EMAIL' as the only supported option.
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
     * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @param StatusState|value-of<StatusState> $statusState
     */
    public function withStatusState(StatusState|string $statusState): self
    {
        $self = clone $this;
        $self['statusState'] = $statusState;

        return $self;
    }

    /**
     * The unique identifier of the subscription to be updated.
     */
    public function withSubscriptionID(int $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }

    /**
     * The legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     *
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $self = clone $this;
        $self['legalBasis'] = $legalBasis;

        return $self;
    }

    /**
     * An explanation for the legal basis used for communication.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $self = clone $this;
        $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }
}
