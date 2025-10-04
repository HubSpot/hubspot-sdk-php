<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V3;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V3\SubscriptionsV3PublicUpdateSubscriptionStatusRequest\LegalBasis;

/**
 * @phpstan-type subscriptions_v3_public_update_subscription_status_request = array{
 *   emailAddress: string,
 *   subscriptionID: string,
 *   legalBasis?: value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 * }
 */
final class SubscriptionsV3PublicUpdateSubscriptionStatusRequest implements BaseModel
{
    /** @use SdkModel<subscriptions_v3_public_update_subscription_status_request> */
    use SdkModel;

    #[Api]
    public string $emailAddress;

    #[Api('subscriptionId')]
    public string $subscriptionID;

    /** @var value-of<LegalBasis>|null $legalBasis */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /**
     * `new SubscriptionsV3PublicUpdateSubscriptionStatusRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionsV3PublicUpdateSubscriptionStatusRequest::with(
     *   emailAddress: ..., subscriptionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionsV3PublicUpdateSubscriptionStatusRequest)
     *   ->withEmailAddress(...)
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
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public static function with(
        string $emailAddress,
        string $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $obj = new self;

        $obj->emailAddress = $emailAddress;
        $obj->subscriptionID = $subscriptionID;

        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }

    public function withEmailAddress(string $emailAddress): self
    {
        $obj = clone $this;
        $obj->emailAddress = $emailAddress;

        return $obj;
    }

    public function withSubscriptionID(string $subscriptionID): self
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
