<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess\Type;

/**
 * @phpstan-type LegalConsentOptionsExplicitConsentToProcessShape = array{
 *   communicationsCheckboxes: list<LegalConsentCheckbox>,
 *   privacyText: string,
 *   type: value-of<Type>,
 *   communicationConsentText?: string|null,
 *   consentToProcessCheckboxLabel?: string|null,
 *   consentToProcessFooterText?: string|null,
 *   consentToProcessText?: string|null,
 * }
 */
final class LegalConsentOptionsExplicitConsentToProcess implements BaseModel
{
    /** @use SdkModel<LegalConsentOptionsExplicitConsentToProcessShape> */
    use SdkModel;

    /** @var list<LegalConsentCheckbox> $communicationsCheckboxes */
    #[Required(list: LegalConsentCheckbox::class)]
    public array $communicationsCheckboxes;

    #[Required]
    public string $privacyText;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $communicationConsentText;

    #[Optional]
    public ?string $consentToProcessCheckboxLabel;

    #[Optional]
    public ?string $consentToProcessFooterText;

    #[Optional]
    public ?string $consentToProcessText;

    /**
     * `new LegalConsentOptionsExplicitConsentToProcess()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LegalConsentOptionsExplicitConsentToProcess::with(
     *   communicationsCheckboxes: ..., privacyText: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LegalConsentOptionsExplicitConsentToProcess)
     *   ->withCommunicationsCheckboxes(...)
     *   ->withPrivacyText(...)
     *   ->withType(...)
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
     * @param list<LegalConsentCheckbox|array{
     *   label: string, required: bool, subscriptionTypeID: int
     * }> $communicationsCheckboxes
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $communicationsCheckboxes,
        string $privacyText,
        Type|string $type = 'explicit_consent_to_process',
        ?string $communicationConsentText = null,
        ?string $consentToProcessCheckboxLabel = null,
        ?string $consentToProcessFooterText = null,
        ?string $consentToProcessText = null,
    ): self {
        $self = new self;

        $self['communicationsCheckboxes'] = $communicationsCheckboxes;
        $self['privacyText'] = $privacyText;
        $self['type'] = $type;

        null !== $communicationConsentText && $self['communicationConsentText'] = $communicationConsentText;
        null !== $consentToProcessCheckboxLabel && $self['consentToProcessCheckboxLabel'] = $consentToProcessCheckboxLabel;
        null !== $consentToProcessFooterText && $self['consentToProcessFooterText'] = $consentToProcessFooterText;
        null !== $consentToProcessText && $self['consentToProcessText'] = $consentToProcessText;

        return $self;
    }

    /**
     * @param list<LegalConsentCheckbox|array{
     *   label: string, required: bool, subscriptionTypeID: int
     * }> $communicationsCheckboxes
     */
    public function withCommunicationsCheckboxes(
        array $communicationsCheckboxes
    ): self {
        $self = clone $this;
        $self['communicationsCheckboxes'] = $communicationsCheckboxes;

        return $self;
    }

    public function withPrivacyText(string $privacyText): self
    {
        $self = clone $this;
        $self['privacyText'] = $privacyText;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withCommunicationConsentText(
        string $communicationConsentText
    ): self {
        $self = clone $this;
        $self['communicationConsentText'] = $communicationConsentText;

        return $self;
    }

    public function withConsentToProcessCheckboxLabel(
        string $consentToProcessCheckboxLabel
    ): self {
        $self = clone $this;
        $self['consentToProcessCheckboxLabel'] = $consentToProcessCheckboxLabel;

        return $self;
    }

    public function withConsentToProcessFooterText(
        string $consentToProcessFooterText
    ): self {
        $self = clone $this;
        $self['consentToProcessFooterText'] = $consentToProcessFooterText;

        return $self;
    }

    public function withConsentToProcessText(string $consentToProcessText): self
    {
        $self = clone $this;
        $self['consentToProcessText'] = $consentToProcessText;

        return $self;
    }
}
