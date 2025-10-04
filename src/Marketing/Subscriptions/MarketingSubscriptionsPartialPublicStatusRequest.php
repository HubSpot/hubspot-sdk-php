<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\MarketingSubscriptionsPartialPublicStatusRequest\Channel;
use HubspotSDK\Marketing\Subscriptions\MarketingSubscriptionsPartialPublicStatusRequest\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\MarketingSubscriptionsPartialPublicStatusRequest\StatusState;

/**
 * @phpstan-type marketing_subscriptions_partial_public_status_request = array{
 *   channel: value-of<Channel>,
 *   statusState: value-of<StatusState>,
 *   subscriptionID: int,
 *   legalBasis?: value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 * }
 */
final class MarketingSubscriptionsPartialPublicStatusRequest implements BaseModel
{
    /** @use SdkModel<marketing_subscriptions_partial_public_status_request> */
    use SdkModel;

    /** @var value-of<Channel> $channel */
    #[Api(enum: Channel::class)]
    public string $channel;

    /** @var value-of<StatusState> $statusState */
    #[Api(enum: StatusState::class)]
    public string $statusState;

    #[Api('subscriptionId')]
    public int $subscriptionID;

    /** @var value-of<LegalBasis>|null $legalBasis */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /**
     * `new MarketingSubscriptionsPartialPublicStatusRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingSubscriptionsPartialPublicStatusRequest::with(
     *   channel: ..., statusState: ..., subscriptionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingSubscriptionsPartialPublicStatusRequest)
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
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $obj = clone $this;
        $obj['channel'] = $channel;

        return $obj;
    }

    /**
     * @param StatusState|value-of<StatusState> $statusState
     */
    public function withStatusState(StatusState|string $statusState): self
    {
        $obj = clone $this;
        $obj['statusState'] = $statusState;

        return $obj;
    }

    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    /**
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $obj = clone $this;
        $obj['legalBasis'] = $legalBasis;

        return $obj;
    }

    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }
}
