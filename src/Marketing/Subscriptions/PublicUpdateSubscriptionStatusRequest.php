<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\PublicUpdateSubscriptionStatusRequest\LegalBasis;

/**
 * @phpstan-type PublicUpdateSubscriptionStatusRequestShape = array{
 *   emailAddress: string,
 *   subscriptionID: string,
 *   legalBasis?: null|LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string|null,
 * }
 */
final class PublicUpdateSubscriptionStatusRequest implements BaseModel
{
    /** @use SdkModel<PublicUpdateSubscriptionStatusRequestShape> */
    use SdkModel;

    /**
     * Contact's email address.
     */
    #[Required]
    public string $emailAddress;

    /**
     * ID of the subscription being updated for the contact.
     */
    #[Required('subscriptionId')]
    public string $subscriptionID;

    /**
     * Legal basis for updating the contact's status (required for GDPR enabled portals).
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Optional(enum: LegalBasis::class)]
    public ?string $legalBasis;

    /**
     * A more detailed explanation to go with the legal basis (required for GDPR enabled portals).
     */
    #[Optional]
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
     * @param LegalBasis|value-of<LegalBasis>|null $legalBasis
     */
    public static function with(
        string $emailAddress,
        string $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $self = new self;

        $self['emailAddress'] = $emailAddress;
        $self['subscriptionID'] = $subscriptionID;

        null !== $legalBasis && $self['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }

    /**
     * Contact's email address.
     */
    public function withEmailAddress(string $emailAddress): self
    {
        $self = clone $this;
        $self['emailAddress'] = $emailAddress;

        return $self;
    }

    /**
     * ID of the subscription being updated for the contact.
     */
    public function withSubscriptionID(string $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }

    /**
     * Legal basis for updating the contact's status (required for GDPR enabled portals).
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
     * A more detailed explanation to go with the legal basis (required for GDPR enabled portals).
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $self = clone $this;
        $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }
}
