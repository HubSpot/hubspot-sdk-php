<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(list: LegalConsentCheckbox::class)]
    public array $communicationsCheckboxes;

    #[Api]
    public string $privacyText;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $communicationConsentText;

    #[Api(optional: true)]
    public ?string $consentToProcessCheckboxLabel;

    #[Api(optional: true)]
    public ?string $consentToProcessFooterText;

    #[Api(optional: true)]
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
     * @param list<LegalConsentCheckbox> $communicationsCheckboxes
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
        $obj = new self;

        $obj->communicationsCheckboxes = $communicationsCheckboxes;
        $obj->privacyText = $privacyText;
        $obj['type'] = $type;

        null !== $communicationConsentText && $obj->communicationConsentText = $communicationConsentText;
        null !== $consentToProcessCheckboxLabel && $obj->consentToProcessCheckboxLabel = $consentToProcessCheckboxLabel;
        null !== $consentToProcessFooterText && $obj->consentToProcessFooterText = $consentToProcessFooterText;
        null !== $consentToProcessText && $obj->consentToProcessText = $consentToProcessText;

        return $obj;
    }

    /**
     * @param list<LegalConsentCheckbox> $communicationsCheckboxes
     */
    public function withCommunicationsCheckboxes(
        array $communicationsCheckboxes
    ): self {
        $obj = clone $this;
        $obj->communicationsCheckboxes = $communicationsCheckboxes;

        return $obj;
    }

    public function withPrivacyText(string $privacyText): self
    {
        $obj = clone $this;
        $obj->privacyText = $privacyText;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withCommunicationConsentText(
        string $communicationConsentText
    ): self {
        $obj = clone $this;
        $obj->communicationConsentText = $communicationConsentText;

        return $obj;
    }

    public function withConsentToProcessCheckboxLabel(
        string $consentToProcessCheckboxLabel
    ): self {
        $obj = clone $this;
        $obj->consentToProcessCheckboxLabel = $consentToProcessCheckboxLabel;

        return $obj;
    }

    public function withConsentToProcessFooterText(
        string $consentToProcessFooterText
    ): self {
        $obj = clone $this;
        $obj->consentToProcessFooterText = $consentToProcessFooterText;

        return $obj;
    }

    public function withConsentToProcessText(string $consentToProcessText): self
    {
        $obj = clone $this;
        $obj->consentToProcessText = $consentToProcessText;

        return $obj;
    }
}
