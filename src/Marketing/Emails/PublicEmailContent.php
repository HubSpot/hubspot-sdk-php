<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Data structure representing the content of the email.
 *
 * @phpstan-type PublicEmailContentShape = array{
 *   flexAreas?: array<string,mixed>|null,
 *   plainTextVersion?: string|null,
 *   smartFields?: array<string,mixed>|null,
 *   styleSettings?: PublicEmailStyleSettings|null,
 *   templatePath?: string|null,
 *   themeSettingsValues?: array<string,mixed>|null,
 *   widgetContainers?: array<string,mixed>|null,
 *   widgets?: array<string,mixed>|null,
 * }
 */
final class PublicEmailContent implements BaseModel
{
    /** @use SdkModel<PublicEmailContentShape> */
    use SdkModel;

    /** @var array<string,mixed>|null $flexAreas */
    #[Optional(map: 'mixed')]
    public ?array $flexAreas;

    #[Optional]
    public ?string $plainTextVersion;

    /** @var array<string,mixed>|null $smartFields */
    #[Optional(map: 'mixed')]
    public ?array $smartFields;

    #[Optional]
    public ?PublicEmailStyleSettings $styleSettings;

    #[Optional]
    public ?string $templatePath;

    /** @var array<string,mixed>|null $themeSettingsValues */
    #[Optional(map: 'mixed')]
    public ?array $themeSettingsValues;

    /** @var array<string,mixed>|null $widgetContainers */
    #[Optional(map: 'mixed')]
    public ?array $widgetContainers;

    /** @var array<string,mixed>|null $widgets */
    #[Optional(map: 'mixed')]
    public ?array $widgets;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $flexAreas
     * @param array<string,mixed> $smartFields
     * @param PublicEmailStyleSettings|array{
     *   backgroundColor?: string|null,
     *   backgroundImage?: string|null,
     *   backgroundImageType?: string|null,
     *   bodyBorderColor?: string|null,
     *   bodyBorderColorChoice?: string|null,
     *   bodyBorderWidth?: float|null,
     *   bodyColor?: string|null,
     *   buttonStyleSettings?: PublicButtonStyleSettings|null,
     *   colorPickerFavorite1?: string|null,
     *   colorPickerFavorite2?: string|null,
     *   colorPickerFavorite3?: string|null,
     *   colorPickerFavorite4?: string|null,
     *   colorPickerFavorite5?: string|null,
     *   colorPickerFavorite6?: string|null,
     *   dividerStyleSettings?: PublicDividerStyleSettings|null,
     *   emailBodyPadding?: string|null,
     *   emailBodyWidth?: string|null,
     *   headingOneFont?: PublicFontStyle|null,
     *   headingTwoFont?: PublicFontStyle|null,
     *   linksFont?: PublicFontStyle|null,
     *   primaryAccentColor?: string|null,
     *   primaryFont?: string|null,
     *   primaryFontColor?: string|null,
     *   primaryFontLineHeight?: string|null,
     *   primaryFontSize?: float|null,
     *   secondaryAccentColor?: string|null,
     *   secondaryFont?: string|null,
     *   secondaryFontColor?: string|null,
     *   secondaryFontLineHeight?: string|null,
     *   secondaryFontSize?: float|null,
     * } $styleSettings
     * @param array<string,mixed> $themeSettingsValues
     * @param array<string,mixed> $widgetContainers
     * @param array<string,mixed> $widgets
     */
    public static function with(
        ?array $flexAreas = null,
        ?string $plainTextVersion = null,
        ?array $smartFields = null,
        PublicEmailStyleSettings|array|null $styleSettings = null,
        ?string $templatePath = null,
        ?array $themeSettingsValues = null,
        ?array $widgetContainers = null,
        ?array $widgets = null,
    ): self {
        $obj = new self;

        null !== $flexAreas && $obj['flexAreas'] = $flexAreas;
        null !== $plainTextVersion && $obj['plainTextVersion'] = $plainTextVersion;
        null !== $smartFields && $obj['smartFields'] = $smartFields;
        null !== $styleSettings && $obj['styleSettings'] = $styleSettings;
        null !== $templatePath && $obj['templatePath'] = $templatePath;
        null !== $themeSettingsValues && $obj['themeSettingsValues'] = $themeSettingsValues;
        null !== $widgetContainers && $obj['widgetContainers'] = $widgetContainers;
        null !== $widgets && $obj['widgets'] = $widgets;

        return $obj;
    }

    /**
     * @param array<string,mixed> $flexAreas
     */
    public function withFlexAreas(array $flexAreas): self
    {
        $obj = clone $this;
        $obj['flexAreas'] = $flexAreas;

        return $obj;
    }

    public function withPlainTextVersion(string $plainTextVersion): self
    {
        $obj = clone $this;
        $obj['plainTextVersion'] = $plainTextVersion;

        return $obj;
    }

    /**
     * @param array<string,mixed> $smartFields
     */
    public function withSmartFields(array $smartFields): self
    {
        $obj = clone $this;
        $obj['smartFields'] = $smartFields;

        return $obj;
    }

    /**
     * @param PublicEmailStyleSettings|array{
     *   backgroundColor?: string|null,
     *   backgroundImage?: string|null,
     *   backgroundImageType?: string|null,
     *   bodyBorderColor?: string|null,
     *   bodyBorderColorChoice?: string|null,
     *   bodyBorderWidth?: float|null,
     *   bodyColor?: string|null,
     *   buttonStyleSettings?: PublicButtonStyleSettings|null,
     *   colorPickerFavorite1?: string|null,
     *   colorPickerFavorite2?: string|null,
     *   colorPickerFavorite3?: string|null,
     *   colorPickerFavorite4?: string|null,
     *   colorPickerFavorite5?: string|null,
     *   colorPickerFavorite6?: string|null,
     *   dividerStyleSettings?: PublicDividerStyleSettings|null,
     *   emailBodyPadding?: string|null,
     *   emailBodyWidth?: string|null,
     *   headingOneFont?: PublicFontStyle|null,
     *   headingTwoFont?: PublicFontStyle|null,
     *   linksFont?: PublicFontStyle|null,
     *   primaryAccentColor?: string|null,
     *   primaryFont?: string|null,
     *   primaryFontColor?: string|null,
     *   primaryFontLineHeight?: string|null,
     *   primaryFontSize?: float|null,
     *   secondaryAccentColor?: string|null,
     *   secondaryFont?: string|null,
     *   secondaryFontColor?: string|null,
     *   secondaryFontLineHeight?: string|null,
     *   secondaryFontSize?: float|null,
     * } $styleSettings
     */
    public function withStyleSettings(
        PublicEmailStyleSettings|array $styleSettings
    ): self {
        $obj = clone $this;
        $obj['styleSettings'] = $styleSettings;

        return $obj;
    }

    public function withTemplatePath(string $templatePath): self
    {
        $obj = clone $this;
        $obj['templatePath'] = $templatePath;

        return $obj;
    }

    /**
     * @param array<string,mixed> $themeSettingsValues
     */
    public function withThemeSettingsValues(array $themeSettingsValues): self
    {
        $obj = clone $this;
        $obj['themeSettingsValues'] = $themeSettingsValues;

        return $obj;
    }

    /**
     * @param array<string,mixed> $widgetContainers
     */
    public function withWidgetContainers(array $widgetContainers): self
    {
        $obj = clone $this;
        $obj['widgetContainers'] = $widgetContainers;

        return $obj;
    }

    /**
     * @param array<string,mixed> $widgets
     */
    public function withWidgets(array $widgets): self
    {
        $obj = clone $this;
        $obj['widgets'] = $widgets;

        return $obj;
    }
}
