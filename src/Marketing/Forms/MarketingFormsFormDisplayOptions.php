<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\MarketingFormsFormDisplayOptions\Theme;

/**
 * @phpstan-type marketing_forms_form_display_options = array{
 *   renderRawHTML: bool,
 *   style: MarketingFormsFormStyle,
 *   submitButtonText: string,
 *   theme: value-of<Theme>,
 *   cssClass?: string,
 * }
 */
final class MarketingFormsFormDisplayOptions implements BaseModel
{
    /** @use SdkModel<marketing_forms_form_display_options> */
    use SdkModel;

    #[Api('renderRawHtml')]
    public bool $renderRawHTML;

    #[Api]
    public MarketingFormsFormStyle $style;

    #[Api]
    public string $submitButtonText;

    /** @var value-of<Theme> $theme */
    #[Api(enum: Theme::class)]
    public string $theme;

    #[Api(optional: true)]
    public ?string $cssClass;

    /**
     * `new MarketingFormsFormDisplayOptions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsFormDisplayOptions::with(
     *   renderRawHTML: ..., style: ..., submitButtonText: ..., theme: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsFormDisplayOptions)
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
     * @param Theme|value-of<Theme> $theme
     */
    public static function with(
        bool $renderRawHTML,
        MarketingFormsFormStyle $style,
        string $submitButtonText,
        Theme|string $theme,
        ?string $cssClass = null,
    ): self {
        $obj = new self;

        $obj->renderRawHTML = $renderRawHTML;
        $obj->style = $style;
        $obj->submitButtonText = $submitButtonText;
        $obj['theme'] = $theme;

        null !== $cssClass && $obj->cssClass = $cssClass;

        return $obj;
    }

    public function withRenderRawHTML(bool $renderRawHTML): self
    {
        $obj = clone $this;
        $obj->renderRawHTML = $renderRawHTML;

        return $obj;
    }

    public function withStyle(MarketingFormsFormStyle $style): self
    {
        $obj = clone $this;
        $obj->style = $style;

        return $obj;
    }

    public function withSubmitButtonText(string $submitButtonText): self
    {
        $obj = clone $this;
        $obj->submitButtonText = $submitButtonText;

        return $obj;
    }

    /**
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
        $obj->cssClass = $cssClass;

        return $obj;
    }
}
