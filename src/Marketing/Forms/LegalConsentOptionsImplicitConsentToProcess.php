<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess\Type;

/**
 * @phpstan-import-type LegalConsentCheckboxShape from \HubspotSDK\Marketing\Forms\LegalConsentCheckbox
 *
 * @phpstan-type LegalConsentOptionsImplicitConsentToProcessShape = array{
 *   communicationsCheckboxes: list<LegalConsentCheckboxShape>,
 *   privacyText: string,
 *   type: Type|value-of<Type>,
 *   communicationConsentText?: string|null,
 *   consentToProcessText?: string|null,
 * }
 */
final class LegalConsentOptionsImplicitConsentToProcess implements BaseModel
{
    /** @use SdkModel<LegalConsentOptionsImplicitConsentToProcessShape> */
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
    public ?string $consentToProcessText;

    /**
     * `new LegalConsentOptionsImplicitConsentToProcess()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LegalConsentOptionsImplicitConsentToProcess::with(
     *   communicationsCheckboxes: ..., privacyText: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LegalConsentOptionsImplicitConsentToProcess)
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
     * @param list<LegalConsentCheckboxShape> $communicationsCheckboxes
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $communicationsCheckboxes,
        string $privacyText,
        Type|string $type = 'implicit_consent_to_process',
        ?string $communicationConsentText = null,
        ?string $consentToProcessText = null,
    ): self {
        $self = new self;

        $self['communicationsCheckboxes'] = $communicationsCheckboxes;
        $self['privacyText'] = $privacyText;
        $self['type'] = $type;

        null !== $communicationConsentText && $self['communicationConsentText'] = $communicationConsentText;
        null !== $consentToProcessText && $self['consentToProcessText'] = $consentToProcessText;

        return $self;
    }

    /**
     * @param list<LegalConsentCheckboxShape> $communicationsCheckboxes
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

    public function withConsentToProcessText(string $consentToProcessText): self
    {
        $self = clone $this;
        $self['consentToProcessText'] = $consentToProcessText;

        return $self;
    }
}
