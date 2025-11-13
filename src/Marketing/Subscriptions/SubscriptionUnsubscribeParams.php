<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis;

/**
 * Unsubscribes a contact from the given subscription type. This API is not valid to use for unsubscribing a contact at a brand or portal level and will return an error.
 *
 * @see HubspotSDK\Services\Marketing\SubscriptionsService::unsubscribe()
 *
 * @phpstan-type SubscriptionUnsubscribeParamsShape = array{
 *   emailAddress: string,
 *   subscriptionId: string,
 *   legalBasis?: LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 * }
 */
final class SubscriptionUnsubscribeParams implements BaseModel
{
    /** @use SdkModel<SubscriptionUnsubscribeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Contact's email address.
     */
    #[Api]
    public string $emailAddress;

    /**
     * ID of the subscription being updated for the contact.
     */
    #[Api]
    public string $subscriptionId;

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
     * `new SubscriptionUnsubscribeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionUnsubscribeParams::with(emailAddress: ..., subscriptionId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionUnsubscribeParams)
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
        string $subscriptionId,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $obj = new self;

        $obj->emailAddress = $emailAddress;
        $obj->subscriptionId = $subscriptionId;

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
        $obj->subscriptionId = $subscriptionID;

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
