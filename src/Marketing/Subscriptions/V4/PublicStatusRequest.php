<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\StatusState;

/**
 * @phpstan-type PublicStatusRequestShape = array{
 *   channel: value-of<Channel>,
 *   statusState: value-of<StatusState>,
 *   subscriberIdString: string,
 *   subscriptionId: int,
 *   legalBasis?: value-of<LegalBasis>|null,
 *   legalBasisExplanation?: string|null,
 * }
 */
final class PublicStatusRequest implements BaseModel
{
    /** @use SdkModel<PublicStatusRequestShape> */
    use SdkModel;

    /**
     * The type of communication channel. Currently, only `EMAIL` is supported.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The status of the contact's subscription.
     *
     * @var value-of<StatusState> $statusState
     */
    #[Required(enum: StatusState::class)]
    public string $statusState;

    /**
     * The contact's email address.
     */
    #[Required]
    public string $subscriberIdString;

    /**
     * The ID of the subscription to update.
     */
    #[Required]
    public int $subscriptionId;

    /**
     * The legal basis for communication.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Optional(enum: LegalBasis::class)]
    public ?string $legalBasis;

    /**
     * The explanation for the legal basis.
     */
    #[Optional]
    public ?string $legalBasisExplanation;

    /**
     * `new PublicStatusRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicStatusRequest::with(
     *   channel: ..., statusState: ..., subscriberIdString: ..., subscriptionId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicStatusRequest)
     *   ->withChannel(...)
     *   ->withStatusState(...)
     *   ->withSubscriberIDString(...)
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
        string $subscriberIdString,
        int $subscriptionId,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;
        $obj['statusState'] = $statusState;
        $obj['subscriberIdString'] = $subscriberIdString;
        $obj['subscriptionId'] = $subscriptionId;

        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj['legalBasisExplanation'] = $legalBasisExplanation;

        return $obj;
    }

    /**
     * The type of communication channel. Currently, only `EMAIL` is supported.
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
     * The status of the contact's subscription.
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
     * The contact's email address.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj['subscriberIdString'] = $subscriberIDString;

        return $obj;
    }

    /**
     * The ID of the subscription to update.
     */
    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj['subscriptionId'] = $subscriptionID;

        return $obj;
    }

    /**
     * The legal basis for communication.
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
     * The explanation for the legal basis.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj['legalBasisExplanation'] = $legalBasisExplanation;

        return $obj;
    }
}
