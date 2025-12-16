<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentOptions\LegitimateInterestLegalBasis;

/**
 * @phpstan-import-type ExternalCommunicationConsentCheckboxShape from \HubspotSDK\Scheduler\Meetings\ExternalCommunicationConsentCheckbox
 *
 * @phpstan-type ExternalLegalConsentOptionsShape = array{
 *   communicationConsentCheckboxes: list<ExternalCommunicationConsentCheckboxShape>,
 *   communicationConsentText: string,
 *   isLegitimateInterest: bool,
 *   legitimateInterestSubscriptionTypes: list<int>,
 *   privacyPolicyText: string,
 *   processingConsentCheckboxLabel: string,
 *   processingConsentFooterText: string,
 *   processingConsentText: string,
 *   processingConsentType: string,
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

    #[Required]
    public string $communicationConsentText;

    #[Required]
    public bool $isLegitimateInterest;

    /** @var list<int> $legitimateInterestSubscriptionTypes */
    #[Required(list: 'int')]
    public array $legitimateInterestSubscriptionTypes;

    #[Required]
    public string $privacyPolicyText;

    #[Required]
    public string $processingConsentCheckboxLabel;

    #[Required]
    public string $processingConsentFooterText;

    #[Required]
    public string $processingConsentText;

    #[Required]
    public string $processingConsentType;

    /** @var value-of<LegitimateInterestLegalBasis>|null $legitimateInterestLegalBasis */
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
     * @param list<ExternalCommunicationConsentCheckboxShape> $communicationConsentCheckboxes
     * @param list<int> $legitimateInterestSubscriptionTypes
     * @param LegitimateInterestLegalBasis|value-of<LegitimateInterestLegalBasis> $legitimateInterestLegalBasis
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
        string $processingConsentType,
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
     * @param list<ExternalCommunicationConsentCheckboxShape> $communicationConsentCheckboxes
     */
    public function withCommunicationConsentCheckboxes(
        array $communicationConsentCheckboxes
    ): self {
        $self = clone $this;
        $self['communicationConsentCheckboxes'] = $communicationConsentCheckboxes;

        return $self;
    }

    public function withCommunicationConsentText(
        string $communicationConsentText
    ): self {
        $self = clone $this;
        $self['communicationConsentText'] = $communicationConsentText;

        return $self;
    }

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

    public function withPrivacyPolicyText(string $privacyPolicyText): self
    {
        $self = clone $this;
        $self['privacyPolicyText'] = $privacyPolicyText;

        return $self;
    }

    public function withProcessingConsentCheckboxLabel(
        string $processingConsentCheckboxLabel
    ): self {
        $self = clone $this;
        $self['processingConsentCheckboxLabel'] = $processingConsentCheckboxLabel;

        return $self;
    }

    public function withProcessingConsentFooterText(
        string $processingConsentFooterText
    ): self {
        $self = clone $this;
        $self['processingConsentFooterText'] = $processingConsentFooterText;

        return $self;
    }

    public function withProcessingConsentText(
        string $processingConsentText
    ): self {
        $self = clone $this;
        $self['processingConsentText'] = $processingConsentText;

        return $self;
    }

    public function withProcessingConsentType(
        string $processingConsentType
    ): self {
        $self = clone $this;
        $self['processingConsentType'] = $processingConsentType;

        return $self;
    }

    /**
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
