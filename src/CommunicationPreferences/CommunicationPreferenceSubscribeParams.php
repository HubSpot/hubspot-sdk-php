<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\CommunicationPreferences\CommunicationPreferenceSubscribeParams\LegalBasis;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Subscribe a user to a specific communication preference using their email address and subscription ID. This endpoint allows you to manage subscription statuses by updating them to 'subscribed' for a given email address. It is useful for ensuring that users receive communications they have opted into.
 *
 * @see HubspotSDK\Services\CommunicationPreferencesService::subscribe()
 *
 * @phpstan-type CommunicationPreferenceSubscribeParamsShape = array{
 *   emailAddress: string,
 *   subscriptionID: string,
 *   legalBasis?: null|LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string|null,
 * }
 */
final class CommunicationPreferenceSubscribeParams implements BaseModel
{
    /** @use SdkModel<CommunicationPreferenceSubscribeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The email address of the user whose subscription status is being updated. It is a required field and must be a string.
     */
    #[Required]
    public string $emailAddress;

    /**
     * The unique identifier of the subscription for which the status is being updated. It is a required field and must be a string.
     */
    #[Required('subscriptionId')]
    public string $subscriptionID;

    /**
     * The legal basis for processing the subscription status change. It is an optional field and must be a string with valid values including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Optional(enum: LegalBasis::class)]
    public ?string $legalBasis;

    /**
     * An optional field providing an explanation for the legal basis used. It must be a string.
     */
    #[Optional]
    public ?string $legalBasisExplanation;

    /**
     * `new CommunicationPreferenceSubscribeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunicationPreferenceSubscribeParams::with(
     *   emailAddress: ..., subscriptionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunicationPreferenceSubscribeParams)
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
     * The email address of the user whose subscription status is being updated. It is a required field and must be a string.
     */
    public function withEmailAddress(string $emailAddress): self
    {
        $self = clone $this;
        $self['emailAddress'] = $emailAddress;

        return $self;
    }

    /**
     * The unique identifier of the subscription for which the status is being updated. It is a required field and must be a string.
     */
    public function withSubscriptionID(string $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }

    /**
     * The legal basis for processing the subscription status change. It is an optional field and must be a string with valid values including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
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
     * An optional field providing an explanation for the legal basis used. It must be a string.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $self = clone $this;
        $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }
}
