<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormStyle\SubmitAlignment;

/**
 * Styling options for the form.
 *
 * @phpstan-type form_style = array{
 *   backgroundWidth: string,
 *   fontFamily: string,
 *   helpTextColor: string,
 *   helpTextSize: string,
 *   labelTextColor: string,
 *   labelTextSize: string,
 *   legalConsentTextColor: string,
 *   legalConsentTextSize: string,
 *   submitAlignment: value-of<SubmitAlignment>,
 *   submitColor: string,
 *   submitFontColor: string,
 *   submitSize: string,
 * }
 */
final class FormStyle implements BaseModel
{
    /** @use SdkModel<form_style> */
    use SdkModel;

    #[Api]
    public string $backgroundWidth;

    #[Api]
    public string $fontFamily;

    #[Api]
    public string $helpTextColor;

    #[Api]
    public string $helpTextSize;

    #[Api]
    public string $labelTextColor;

    #[Api]
    public string $labelTextSize;

    #[Api]
    public string $legalConsentTextColor;

    #[Api]
    public string $legalConsentTextSize;

    /** @var value-of<SubmitAlignment> $submitAlignment */
    #[Api(enum: SubmitAlignment::class)]
    public string $submitAlignment;

    #[Api]
    public string $submitColor;

    #[Api]
    public string $submitFontColor;

    #[Api]
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
        $obj = new self;

        $obj->backgroundWidth = $backgroundWidth;
        $obj->fontFamily = $fontFamily;
        $obj->helpTextColor = $helpTextColor;
        $obj->helpTextSize = $helpTextSize;
        $obj->labelTextColor = $labelTextColor;
        $obj->labelTextSize = $labelTextSize;
        $obj->legalConsentTextColor = $legalConsentTextColor;
        $obj->legalConsentTextSize = $legalConsentTextSize;
        $obj['submitAlignment'] = $submitAlignment;
        $obj->submitColor = $submitColor;
        $obj->submitFontColor = $submitFontColor;
        $obj->submitSize = $submitSize;

        return $obj;
    }

    public function withBackgroundWidth(string $backgroundWidth): self
    {
        $obj = clone $this;
        $obj->backgroundWidth = $backgroundWidth;

        return $obj;
    }

    public function withFontFamily(string $fontFamily): self
    {
        $obj = clone $this;
        $obj->fontFamily = $fontFamily;

        return $obj;
    }

    public function withHelpTextColor(string $helpTextColor): self
    {
        $obj = clone $this;
        $obj->helpTextColor = $helpTextColor;

        return $obj;
    }

    public function withHelpTextSize(string $helpTextSize): self
    {
        $obj = clone $this;
        $obj->helpTextSize = $helpTextSize;

        return $obj;
    }

    public function withLabelTextColor(string $labelTextColor): self
    {
        $obj = clone $this;
        $obj->labelTextColor = $labelTextColor;

        return $obj;
    }

    public function withLabelTextSize(string $labelTextSize): self
    {
        $obj = clone $this;
        $obj->labelTextSize = $labelTextSize;

        return $obj;
    }

    public function withLegalConsentTextColor(
        string $legalConsentTextColor
    ): self {
        $obj = clone $this;
        $obj->legalConsentTextColor = $legalConsentTextColor;

        return $obj;
    }

    public function withLegalConsentTextSize(string $legalConsentTextSize): self
    {
        $obj = clone $this;
        $obj->legalConsentTextSize = $legalConsentTextSize;

        return $obj;
    }

    /**
     * @param SubmitAlignment|value-of<SubmitAlignment> $submitAlignment
     */
    public function withSubmitAlignment(
        SubmitAlignment|string $submitAlignment
    ): self {
        $obj = clone $this;
        $obj['submitAlignment'] = $submitAlignment;

        return $obj;
    }

    public function withSubmitColor(string $submitColor): self
    {
        $obj = clone $this;
        $obj->submitColor = $submitColor;

        return $obj;
    }

    public function withSubmitFontColor(string $submitFontColor): self
    {
        $obj = clone $this;
        $obj->submitFontColor = $submitFontColor;

        return $obj;
    }

    public function withSubmitSize(string $submitSize): self
    {
        $obj = clone $this;
        $obj->submitSize = $submitSize;

        return $obj;
    }
}
