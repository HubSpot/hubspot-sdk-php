<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\StatusState;

/**
 * Set the subscription status of a specific contact.
 *
 * @see HubspotSDK\Marketing\Subscriptions\V4\Statuses->update
 *
 * @phpstan-type status_update_params = array{
 *   channel: Channel|value-of<Channel>,
 *   statusState: StatusState|value-of<StatusState>,
 *   subscriptionID: int,
 *   legalBasis?: LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 * }
 */
final class StatusUpdateParams implements BaseModel
{
    /** @use SdkModel<status_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The type of communication channel, with 'EMAIL' as the only supported option.
     *
     * @var value-of<Channel> $channel
     */
    #[Api(enum: Channel::class)]
    public string $channel;

    /**
     * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @var value-of<StatusState> $statusState
     */
    #[Api(enum: StatusState::class)]
    public string $statusState;

    /**
     * The unique identifier of the subscription to be updated.
     */
    #[Api('subscriptionId')]
    public int $subscriptionID;

    /**
     * The legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    /**
     * An explanation for the legal basis used for communication.
     */
    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /**
     * `new StatusUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusUpdateParams::with(channel: ..., statusState: ..., subscriptionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusUpdateParams)
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
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public static function with(
        Channel|string $channel,
        StatusState|string $statusState,
        int $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;
        $obj['statusState'] = $statusState;
        $obj->subscriptionID = $subscriptionID;

        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }

    /**
     * The type of communication channel, with 'EMAIL' as the only supported option.
     *
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $obj = clone $this;
        $obj['channel'] = $channel;

        return $obj;
    }

    /**
     * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @param StatusState|value-of<StatusState> $statusState
     */
    public function withStatusState(StatusState|string $statusState): self
    {
        $obj = clone $this;
        $obj['statusState'] = $statusState;

        return $obj;
    }

    /**
     * The unique identifier of the subscription to be updated.
     */
    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    /**
     * The legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     *
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $obj = clone $this;
        $obj['legalBasis'] = $legalBasis;

        return $obj;
    }

    /**
     * An explanation for the legal basis used for communication.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }
}
