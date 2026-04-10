<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Scheduler\Meetings\ExternalLegalConsentOptions\LegitimateInterestLegalBasis;
use HubSpotSDK\Scheduler\Meetings\ExternalLegalConsentOptions\ProcessingConsentType;

/**
 * @phpstan-import-type ExternalCommunicationConsentCheckboxShape from \HubSpotSDK\Scheduler\Meetings\ExternalCommunicationConsentCheckbox
 *
 * @phpstan-type ExternalLegalConsentOptionsShape = array{
 *   communicationConsentCheckboxes: list<ExternalCommunicationConsentCheckbox|ExternalCommunicationConsentCheckboxShape>,
 *   communicationConsentText: string,
 *   isLegitimateInterest: bool,
 *   legitimateInterestSubscriptionTypes: list<int>,
 *   privacyPolicyText: string,
 *   processingConsentCheckboxLabel: string,
 *   processingConsentFooterText: string,
 *   processingConsentText: string,
 *   processingConsentType: ProcessingConsentType|value-of<ProcessingConsentType>,
 *   legitimateInterestLegalBasis?: null|LegitimateInterestLegalBasis|value-of<LegitimateInterestLegalBasis>,
 * }
 */
final class ExternalLegalConsentOptions implements BaseModel
{
    /** @use SdkModel<ExternalLegalConsentOptionsShape> */
    use SdkModel;

    /** @var list<ExternalCommunicationConsentCheckbox> $communicationConsentCheckboxes */
    #[Required(list: ExternalCommunicationConsentCheckbox::class)]
    public array $communicationConsentCheckboxes;

    /**
     * The text that describes the consent for communication preferences.
     */
    #[Required]
    public string $communicationConsentText;

    /**
     * Whether the legal basis for processing is legitimate interest.
     */
    #[Required]
    public bool $isLegitimateInterest;

    /** @var list<int> $legitimateInterestSubscriptionTypes */
    #[Required(list: 'int')]
    public array $legitimateInterestSubscriptionTypes;

    /**
     * The text that describes the data processing privacy policy.
     */
    #[Required]
    public string $privacyPolicyText;

    /**
     * The label for the checkbox used to obtain consent for data processing.
     */
    #[Required]
    public string $processingConsentCheckboxLabel;

    /**
     * The footer text accompanying the consent for data processing. This field is not used by the meeting platform and will always be empty.
     */
    #[Required]
    public string $processingConsentFooterText;

    /**
     * The text that describes the consent for processing personal data.
     */
    #[Required]
    public string $processingConsentText;

    /**
     * The type of consent required for processing. Accepted values are: IMPLICIT, REQUIRED_CHECKBOX.
     *
     * @var value-of<ProcessingConsentType> $processingConsentType
     */
    #[Required(enum: ProcessingConsentType::class)]
    public string $processingConsentType;

    /**
     * The legal basis for processing under legitimate interest. Accepted values are: LEGITIMATE_INTEREST_PQL, LEGITIMATE_INTEREST_CLIENT, PERFORMANCE_OF_CONTRACT, CONSENT_WITH_NOTICE, NON_GDPR, PROCESS_AND_STORE, LEGITIMATE_INTEREST_OTHER.
     *
     * @var value-of<LegitimateInterestLegalBasis>|null $legitimateInterestLegalBasis
     */
    #[Optional(enum: LegitimateInterestLegalBasis::class)]
    public ?string $legitimateInterestLegalBasis;

    /**
     * `new ExternalLegalConsentOptions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLegalConsentOptions::with(
     *   communicationConsentCheckboxes: ...,
     *   communicationConsentText: ...,
     *   isLegitimateInterest: ...,
     *   legitimateInterestSubscriptionTypes: ...,
     *   privacyPolicyText: ...,
     *   processingConsentCheckboxLabel: ...,
     *   processingConsentFooterText: ...,
     *   processingConsentText: ...,
     *   processingConsentType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLegalConsentOptions)
     *   ->withCommunicationConsentCheckboxes(...)
     *   ->withCommunicationConsentText(...)
     *   ->withIsLegitimateInterest(...)
     *   ->withLegitimateInterestSubscriptionTypes(...)
     *   ->withPrivacyPolicyText(...)
     *   ->withProcessingConsentCheckboxLabel(...)
     *   ->withProcessingConsentFooterText(...)
     *   ->withProcessingConsentText(...)
     *   ->withProcessingConsentType(...)
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
     * @param list<ExternalCommunicationConsentCheckbox|ExternalCommunicationConsentCheckboxShape> $communicationConsentCheckboxes
     * @param list<int> $legitimateInterestSubscriptionTypes
     * @param ProcessingConsentType|value-of<ProcessingConsentType> $processingConsentType
     * @param LegitimateInterestLegalBasis|value-of<LegitimateInterestLegalBasis>|null $legitimateInterestLegalBasis
     */
    public static function with(
        array $communicationConsentCheckboxes,
        string $communicationConsentText,
        bool $isLegitimateInterest,
        array $legitimateInterestSubscriptionTypes,
        string $privacyPolicyText,
        string $processingConsentCheckboxLabel,
        string $processingConsentFooterText,
        string $processingConsentText,
        ProcessingConsentType|string $processingConsentType,
        LegitimateInterestLegalBasis|string|null $legitimateInterestLegalBasis = null,
    ): self {
        $self = new self;

        $self['communicationConsentCheckboxes'] = $communicationConsentCheckboxes;
        $self['communicationConsentText'] = $communicationConsentText;
        $self['isLegitimateInterest'] = $isLegitimateInterest;
        $self['legitimateInterestSubscriptionTypes'] = $legitimateInterestSubscriptionTypes;
        $self['privacyPolicyText'] = $privacyPolicyText;
        $self['processingConsentCheckboxLabel'] = $processingConsentCheckboxLabel;
        $self['processingConsentFooterText'] = $processingConsentFooterText;
        $self['processingConsentText'] = $processingConsentText;
        $self['processingConsentType'] = $processingConsentType;

        null !== $legitimateInterestLegalBasis && $self['legitimateInterestLegalBasis'] = $legitimateInterestLegalBasis;

        return $self;
    }

    /**
     * @param list<ExternalCommunicationConsentCheckbox|ExternalCommunicationConsentCheckboxShape> $communicationConsentCheckboxes
     */
    public function withCommunicationConsentCheckboxes(
        array $communicationConsentCheckboxes
    ): self {
        $self = clone $this;
        $self['communicationConsentCheckboxes'] = $communicationConsentCheckboxes;

        return $self;
    }

    /**
     * The text that describes the consent for communication preferences.
     */
    public function withCommunicationConsentText(
        string $communicationConsentText
    ): self {
        $self = clone $this;
        $self['communicationConsentText'] = $communicationConsentText;

        return $self;
    }

    /**
     * Whether the legal basis for processing is legitimate interest.
     */
    public function withIsLegitimateInterest(bool $isLegitimateInterest): self
    {
        $self = clone $this;
        $self['isLegitimateInterest'] = $isLegitimateInterest;

        return $self;
    }

    /**
     * @param list<int> $legitimateInterestSubscriptionTypes
     */
    public function withLegitimateInterestSubscriptionTypes(
        array $legitimateInterestSubscriptionTypes
    ): self {
        $self = clone $this;
        $self['legitimateInterestSubscriptionTypes'] = $legitimateInterestSubscriptionTypes;

        return $self;
    }

    /**
     * The text that describes the data processing privacy policy.
     */
    public function withPrivacyPolicyText(string $privacyPolicyText): self
    {
        $self = clone $this;
        $self['privacyPolicyText'] = $privacyPolicyText;

        return $self;
    }

    /**
     * The label for the checkbox used to obtain consent for data processing.
     */
    public function withProcessingConsentCheckboxLabel(
        string $processingConsentCheckboxLabel
    ): self {
        $self = clone $this;
        $self['processingConsentCheckboxLabel'] = $processingConsentCheckboxLabel;

        return $self;
    }

    /**
     * The footer text accompanying the consent for data processing. This field is not used by the meeting platform and will always be empty.
     */
    public function withProcessingConsentFooterText(
        string $processingConsentFooterText
    ): self {
        $self = clone $this;
        $self['processingConsentFooterText'] = $processingConsentFooterText;

        return $self;
    }

    /**
     * The text that describes the consent for processing personal data.
     */
    public function withProcessingConsentText(
        string $processingConsentText
    ): self {
        $self = clone $this;
        $self['processingConsentText'] = $processingConsentText;

        return $self;
    }

    /**
     * The type of consent required for processing. Accepted values are: IMPLICIT, REQUIRED_CHECKBOX.
     *
     * @param ProcessingConsentType|value-of<ProcessingConsentType> $processingConsentType
     */
    public function withProcessingConsentType(
        ProcessingConsentType|string $processingConsentType
    ): self {
        $self = clone $this;
        $self['processingConsentType'] = $processingConsentType;

        return $self;
    }

    /**
     * The legal basis for processing under legitimate interest. Accepted values are: LEGITIMATE_INTEREST_PQL, LEGITIMATE_INTEREST_CLIENT, PERFORMANCE_OF_CONTRACT, CONSENT_WITH_NOTICE, NON_GDPR, PROCESS_AND_STORE, LEGITIMATE_INTEREST_OTHER.
     *
     * @param LegitimateInterestLegalBasis|value-of<LegitimateInterestLegalBasis> $legitimateInterestLegalBasis
     */
    public function withLegitimateInterestLegalBasis(
        LegitimateInterestLegalBasis|string $legitimateInterestLegalBasis
    ): self {
        $self = clone $this;
        $self['legitimateInterestLegalBasis'] = $legitimateInterestLegalBasis;

        return $self;
    }
}
