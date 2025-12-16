<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormDisplayOptions\Theme;

/**
 * Options for styling the form.
 *
 * @phpstan-import-type FormStyleShape from \HubspotSDK\Marketing\Forms\FormStyle
 *
 * @phpstan-type FormDisplayOptionsShape = array{
 *   renderRawHTML: bool,
 *   style: FormStyle|FormStyleShape,
 *   submitButtonText: string,
 *   theme: Theme|value-of<Theme>,
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
    #[Required('renderRawHtml')]
    public bool $renderRawHTML;

    /**
     * Styling options for the form.
     */
    #[Required]
    public FormStyle $style;

    /**
     * The text displayed on the form submit button.
     */
    #[Required]
    public string $submitButtonText;

    /**
     * The theme used for styling the input fields. This will not apply if the form is added to a HubSpot CMS page.
     *
     * @var value-of<Theme> $theme
     */
    #[Required(enum: Theme::class)]
    public string $theme;

    #[Optional]
    public ?string $cssClass;

    /**
     * `new FormDisplayOptions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormDisplayOptions::with(
     *   renderRawHTML: ..., style: ..., submitButtonText: ..., theme: ...
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
     * @param FormStyleShape $style
     * @param Theme|value-of<Theme> $theme
     */
    public static function with(
        bool $renderRawHTML,
        FormStyle|array $style,
        string $submitButtonText,
        Theme|string $theme,
        ?string $cssClass = null,
    ): self {
        $self = new self;

        $self['renderRawHTML'] = $renderRawHTML;
        $self['style'] = $style;
        $self['submitButtonText'] = $submitButtonText;
        $self['theme'] = $theme;

        null !== $cssClass && $self['cssClass'] = $cssClass;

        return $self;
    }

    /**
     * Whether the form will render as raw HTML as opposed to inside an iFrame.
     */
    public function withRenderRawHTML(bool $renderRawHTML): self
    {
        $self = clone $this;
        $self['renderRawHTML'] = $renderRawHTML;

        return $self;
    }

    /**
     * Styling options for the form.
     *
     * @param FormStyleShape $style
     */
    public function withStyle(FormStyle|array $style): self
    {
        $self = clone $this;
        $self['style'] = $style;

        return $self;
    }

    /**
     * The text displayed on the form submit button.
     */
    public function withSubmitButtonText(string $submitButtonText): self
    {
        $self = clone $this;
        $self['submitButtonText'] = $submitButtonText;

        return $self;
    }

    /**
     * The theme used for styling the input fields. This will not apply if the form is added to a HubSpot CMS page.
     *
     * @param Theme|value-of<Theme> $theme
     */
    public function withTheme(Theme|string $theme): self
    {
        $self = clone $this;
        $self['theme'] = $theme;

        return $self;
    }

    public function withCssClass(string $cssClass): self
    {
        $self = clone $this;
        $self['cssClass'] = $cssClass;

        return $self;
    }
}
