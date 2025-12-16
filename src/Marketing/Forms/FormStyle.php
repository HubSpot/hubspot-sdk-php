<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormStyle\SubmitAlignment;

/**
 * Styling options for the form.
 *
 * @phpstan-type FormStyleShape = array{
 *   backgroundWidth: string,
 *   fontFamily: string,
 *   helpTextColor: string,
 *   helpTextSize: string,
 *   labelTextColor: string,
 *   labelTextSize: string,
 *   legalConsentTextColor: string,
 *   legalConsentTextSize: string,
 *   submitAlignment: SubmitAlignment|value-of<SubmitAlignment>,
 *   submitColor: string,
 *   submitFontColor: string,
 *   submitSize: string,
 * }
 */
final class FormStyle implements BaseModel
{
    /** @use SdkModel<FormStyleShape> */
    use SdkModel;

    #[Required]
    public string $backgroundWidth;

    #[Required]
    public string $fontFamily;

    #[Required]
    public string $helpTextColor;

    #[Required]
    public string $helpTextSize;

    #[Required]
    public string $labelTextColor;

    #[Required]
    public string $labelTextSize;

    #[Required]
    public string $legalConsentTextColor;

    #[Required]
    public string $legalConsentTextSize;

    /** @var value-of<SubmitAlignment> $submitAlignment */
    #[Required(enum: SubmitAlignment::class)]
    public string $submitAlignment;

    #[Required]
    public string $submitColor;

    #[Required]
    public string $submitFontColor;

    #[Required]
    public string $submitSize;

    /**
     * `new FormStyle()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormStyle::with(
     *   backgroundWidth: ...,
     *   fontFamily: ...,
     *   helpTextColor: ...,
     *   helpTextSize: ...,
     *   labelTextColor: ...,
     *   labelTextSize: ...,
     *   legalConsentTextColor: ...,
     *   legalConsentTextSize: ...,
     *   submitAlignment: ...,
     *   submitColor: ...,
     *   submitFontColor: ...,
     *   submitSize: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FormStyle)
     *   ->withBackgroundWidth(...)
     *   ->withFontFamily(...)
     *   ->withHelpTextColor(...)
     *   ->withHelpTextSize(...)
     *   ->withLabelTextColor(...)
     *   ->withLabelTextSize(...)
     *   ->withLegalConsentTextColor(...)
     *   ->withLegalConsentTextSize(...)
     *   ->withSubmitAlignment(...)
     *   ->withSubmitColor(...)
     *   ->withSubmitFontColor(...)
     *   ->withSubmitSize(...)
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
     * @param SubmitAlignment|value-of<SubmitAlignment> $submitAlignment
     */
    public static function with(
        string $backgroundWidth,
        string $fontFamily,
        string $helpTextColor,
        string $helpTextSize,
        string $labelTextColor,
        string $labelTextSize,
        string $legalConsentTextColor,
        string $legalConsentTextSize,
        SubmitAlignment|string $submitAlignment,
        string $submitColor,
        string $submitFontColor,
        string $submitSize,
    ): self {
        $self = new self;

        $self['backgroundWidth'] = $backgroundWidth;
        $self['fontFamily'] = $fontFamily;
        $self['helpTextColor'] = $helpTextColor;
        $self['helpTextSize'] = $helpTextSize;
        $self['labelTextColor'] = $labelTextColor;
        $self['labelTextSize'] = $labelTextSize;
        $self['legalConsentTextColor'] = $legalConsentTextColor;
        $self['legalConsentTextSize'] = $legalConsentTextSize;
        $self['submitAlignment'] = $submitAlignment;
        $self['submitColor'] = $submitColor;
        $self['submitFontColor'] = $submitFontColor;
        $self['submitSize'] = $submitSize;

        return $self;
    }

    public function withBackgroundWidth(string $backgroundWidth): self
    {
        $self = clone $this;
        $self['backgroundWidth'] = $backgroundWidth;

        return $self;
    }

    public function withFontFamily(string $fontFamily): self
    {
        $self = clone $this;
        $self['fontFamily'] = $fontFamily;

        return $self;
    }

    public function withHelpTextColor(string $helpTextColor): self
    {
        $self = clone $this;
        $self['helpTextColor'] = $helpTextColor;

        return $self;
    }

    public function withHelpTextSize(string $helpTextSize): self
    {
        $self = clone $this;
        $self['helpTextSize'] = $helpTextSize;

        return $self;
    }

    public function withLabelTextColor(string $labelTextColor): self
    {
        $self = clone $this;
        $self['labelTextColor'] = $labelTextColor;

        return $self;
    }

    public function withLabelTextSize(string $labelTextSize): self
    {
        $self = clone $this;
        $self['labelTextSize'] = $labelTextSize;

        return $self;
    }

    public function withLegalConsentTextColor(
        string $legalConsentTextColor
    ): self {
        $self = clone $this;
        $self['legalConsentTextColor'] = $legalConsentTextColor;

        return $self;
    }

    public function withLegalConsentTextSize(string $legalConsentTextSize): self
    {
        $self = clone $this;
        $self['legalConsentTextSize'] = $legalConsentTextSize;

        return $self;
    }

    /**
     * @param SubmitAlignment|value-of<SubmitAlignment> $submitAlignment
     */
    public function withSubmitAlignment(
        SubmitAlignment|string $submitAlignment
    ): self {
        $self = clone $this;
        $self['submitAlignment'] = $submitAlignment;

        return $self;
    }

    public function withSubmitColor(string $submitColor): self
    {
        $self = clone $this;
        $self['submitColor'] = $submitColor;

        return $self;
    }

    public function withSubmitFontColor(string $submitFontColor): self
    {
        $self = clone $this;
        $self['submitFontColor'] = $submitFontColor;

        return $self;
    }

    public function withSubmitSize(string $submitSize): self
    {
        $self = clone $this;
        $self['submitSize'] = $submitSize;

        return $self;
    }
}
