<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentOptions\LegitimateInterestLegalBasis;

/**
 * @phpstan-type ExternalLegalConsentOptionsShape = array{
 *   communicationConsentCheckboxes: list<ExternalCommunicationConsentCheckbox>,
 *   communicationConsentText: string,
 *   isLegitimateInterest: bool,
 *   legitimateInterestSubscriptionTypes: list<int>,
 *   privacyPolicyText: string,
 *   processingConsentCheckboxLabel: string,
 *   processingConsentFooterText: string,
 *   processingConsentText: string,
 *   processingConsentType: string,
 *   legitimateInterestLegalBasis?: value-of<LegitimateInterestLegalBasis>|null,
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
     * @param list<ExternalCommunicationConsentCheckbox|array{
     *   communicationTypeID: string, label: string, required: bool
     * }> $communicationConsentCheckboxes
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
        $obj = new self;

        $obj['communicationConsentCheckboxes'] = $communicationConsentCheckboxes;
        $obj['communicationConsentText'] = $communicationConsentText;
        $obj['isLegitimateInterest'] = $isLegitimateInterest;
        $obj['legitimateInterestSubscriptionTypes'] = $legitimateInterestSubscriptionTypes;
        $obj['privacyPolicyText'] = $privacyPolicyText;
        $obj['processingConsentCheckboxLabel'] = $processingConsentCheckboxLabel;
        $obj['processingConsentFooterText'] = $processingConsentFooterText;
        $obj['processingConsentText'] = $processingConsentText;
        $obj['processingConsentType'] = $processingConsentType;

        null !== $legitimateInterestLegalBasis && $obj['legitimateInterestLegalBasis'] = $legitimateInterestLegalBasis;

        return $obj;
    }

    /**
     * @param list<ExternalCommunicationConsentCheckbox|array{
     *   communicationTypeID: string, label: string, required: bool
     * }> $communicationConsentCheckboxes
     */
    public function withCommunicationConsentCheckboxes(
        array $communicationConsentCheckboxes
    ): self {
        $obj = clone $this;
        $obj['communicationConsentCheckboxes'] = $communicationConsentCheckboxes;

        return $obj;
    }

    public function withCommunicationConsentText(
        string $communicationConsentText
    ): self {
        $obj = clone $this;
        $obj['communicationConsentText'] = $communicationConsentText;

        return $obj;
    }

    public function withIsLegitimateInterest(bool $isLegitimateInterest): self
    {
        $obj = clone $this;
        $obj['isLegitimateInterest'] = $isLegitimateInterest;

        return $obj;
    }

    /**
     * @param list<int> $legitimateInterestSubscriptionTypes
     */
    public function withLegitimateInterestSubscriptionTypes(
        array $legitimateInterestSubscriptionTypes
    ): self {
        $obj = clone $this;
        $obj['legitimateInterestSubscriptionTypes'] = $legitimateInterestSubscriptionTypes;

        return $obj;
    }

    public function withPrivacyPolicyText(string $privacyPolicyText): self
    {
        $obj = clone $this;
        $obj['privacyPolicyText'] = $privacyPolicyText;

        return $obj;
    }

    public function withProcessingConsentCheckboxLabel(
        string $processingConsentCheckboxLabel
    ): self {
        $obj = clone $this;
        $obj['processingConsentCheckboxLabel'] = $processingConsentCheckboxLabel;

        return $obj;
    }

    public function withProcessingConsentFooterText(
        string $processingConsentFooterText
    ): self {
        $obj = clone $this;
        $obj['processingConsentFooterText'] = $processingConsentFooterText;

        return $obj;
    }

    public function withProcessingConsentText(
        string $processingConsentText
    ): self {
        $obj = clone $this;
        $obj['processingConsentText'] = $processingConsentText;

        return $obj;
    }

    public function withProcessingConsentType(
        string $processingConsentType
    ): self {
        $obj = clone $this;
        $obj['processingConsentType'] = $processingConsentType;

        return $obj;
    }

    /**
     * @param LegitimateInterestLegalBasis|value-of<LegitimateInterestLegalBasis> $legitimateInterestLegalBasis
     */
    public function withLegitimateInterestLegalBasis(
        LegitimateInterestLegalBasis|string $legitimateInterestLegalBasis
    ): self {
        $obj = clone $this;
        $obj['legitimateInterestLegalBasis'] = $legitimateInterestLegalBasis;

        return $obj;
    }
}
