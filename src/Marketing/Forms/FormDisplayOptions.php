<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormDisplayOptions\Theme;
use HubspotSDK\Marketing\Forms\FormStyle\SubmitAlignment;

/**
 * Options for styling the form.
 *
 * @phpstan-type FormDisplayOptionsShape = array{
 *   renderRawHtml: bool,
 *   style: FormStyle,
 *   submitButtonText: string,
 *   theme: value-of<Theme>,
 *   cssClass?: string|null,
 * }
 */
final class FormDisplayOptions implements BaseModel
{
    /** @use SdkModel<FormDisplayOptionsShape> */
    use SdkModel;

    /**
     * Whether the form will render as raw HTML as opposed to inside an iFrame.
     */
    #[Api]
    public bool $renderRawHtml;

    /**
     * Styling options for the form.
     */
    #[Api]
    public FormStyle $style;

    /**
     * The text displayed on the form submit button.
     */
    #[Api]
    public string $submitButtonText;

    /**
     * The theme used for styling the input fields. This will not apply if the form is added to a HubSpot CMS page.
     *
     * @var value-of<Theme> $theme
     */
    #[Api(enum: Theme::class)]
    public string $theme;

    #[Api(optional: true)]
    public ?string $cssClass;

    /**
     * `new FormDisplayOptions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormDisplayOptions::with(
     *   renderRawHtml: ..., style: ..., submitButtonText: ..., theme: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FormDisplayOptions)
     *   ->withRenderRawHTML(...)
     *   ->withStyle(...)
     *   ->withSubmitButtonText(...)
     *   ->withTheme(...)
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
     * @param FormStyle|array{
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
     * } $style
     * @param Theme|value-of<Theme> $theme
     */
    public static function with(
        bool $renderRawHtml,
        FormStyle|array $style,
        string $submitButtonText,
        Theme|string $theme,
        ?string $cssClass = null,
    ): self {
        $obj = new self;

        $obj['renderRawHtml'] = $renderRawHtml;
        $obj['style'] = $style;
        $obj['submitButtonText'] = $submitButtonText;
        $obj['theme'] = $theme;

        null !== $cssClass && $obj['cssClass'] = $cssClass;

        return $obj;
    }

    /**
     * Whether the form will render as raw HTML as opposed to inside an iFrame.
     */
    public function withRenderRawHTML(bool $renderRawHTML): self
    {
        $obj = clone $this;
        $obj['renderRawHtml'] = $renderRawHTML;

        return $obj;
    }

    /**
     * Styling options for the form.
     *
     * @param FormStyle|array{
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
     * } $style
     */
    public function withStyle(FormStyle|array $style): self
    {
        $obj = clone $this;
        $obj['style'] = $style;

        return $obj;
    }

    /**
     * The text displayed on the form submit button.
     */
    public function withSubmitButtonText(string $submitButtonText): self
    {
        $obj = clone $this;
        $obj['submitButtonText'] = $submitButtonText;

        return $obj;
    }

    /**
     * The theme used for styling the input fields. This will not apply if the form is added to a HubSpot CMS page.
     *
     * @param Theme|value-of<Theme> $theme
     */
    public function withTheme(Theme|string $theme): self
    {
        $obj = clone $this;
        $obj['theme'] = $theme;

        return $obj;
    }

    public function withCssClass(string $cssClass): self
    {
        $obj = clone $this;
        $obj['cssClass'] = $cssClass;

        return $obj;
    }
}
