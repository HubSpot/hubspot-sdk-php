<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams\LegalBasis;

/**
 * Subscribes a contact to the given subscription type. This API is not valid to use for subscribing a contact at a brand or portal level and will return an error.
 *
 * @see HubspotSDK\Services\Marketing\SubscriptionsService::subscribe()
 *
 * @phpstan-type SubscriptionSubscribeParamsShape = array{
 *   emailAddress: string,
 *   subscriptionID: string,
 *   legalBasis?: LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 * }
 */
final class SubscriptionSubscribeParams implements BaseModel
{
    /** @use SdkModel<SubscriptionSubscribeParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new SubscriptionSubscribeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionSubscribeParams::with(emailAddress: ..., subscriptionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionSubscribeParams)
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

        $obj['emailAddress'] = $emailAddress;
        $obj['subscriptionID'] = $subscriptionID;

        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj['legalBasisExplanation'] = $legalBasisExplanation;

        return $obj;
    }

    /**
     * Contact's email address.
     */
    public function withEmailAddress(string $emailAddress): self
    {
        $obj = clone $this;
        $obj['emailAddress'] = $emailAddress;

        return $obj;
    }

    /**
     * ID of the subscription being updated for the contact.
     */
    public function withSubscriptionID(string $subscriptionID): self
    {
        $obj = clone $this;
        $obj['subscriptionID'] = $subscriptionID;

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
        $obj['legalBasisExplanation'] = $legalBasisExplanation;

        return $obj;
    }
}
