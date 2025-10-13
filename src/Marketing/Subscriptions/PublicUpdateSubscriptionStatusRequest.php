<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\PublicUpdateSubscriptionStatusRequest\LegalBasis;

/**
 * @phpstan-type public_update_subscription_status_request = array{
 *   emailAddress: string,
 *   subscriptionID: string,
 *   legalBasis?: value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 * }
 */
final class PublicUpdateSubscriptionStatusRequest implements BaseModel
{
    /** @use SdkModel<public_update_subscription_status_request> */
    use SdkModel;

    /**
     * Contact's email address.
     */
    #[Api]
    public string $emailAddress;

    /**
     * ID of the subscription being updated for the contact.
     */
    #[Api('subscriptionId')]
    public string $subscriptionID;

    /**
     * Legal basis for updating the contact's status (required for GDPR enabled portals).
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    /**
     * A more detailed explanation to go with the legal basis (required for GDPR enabled portals).
     */
    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /**
     * `new PublicUpdateSubscriptionStatusRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicUpdateSubscriptionStatusRequest::with(
     *   emailAddress: ..., subscriptionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicUpdateSubscriptionStatusRequest)
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

    /**
     * Contact's email address.
     */
    public function withEmailAddress(string $emailAddress): self
    {
        $obj = clone $this;
        $obj->emailAddress = $emailAddress;

        return $obj;
    }

    /**
     * ID of the subscription being updated for the contact.
     */
    public function withSubscriptionID(string $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    /**
     * Legal basis for updating the contact's status (required for GDPR enabled portals).
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
     * A more detailed explanation to go with the legal basis (required for GDPR enabled portals).
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }
}
