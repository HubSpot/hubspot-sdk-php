<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicButtonStyleSettingsShape from \HubspotSDK\Marketing\Emails\PublicButtonStyleSettings
 * @phpstan-import-type PublicDividerStyleSettingsShape from \HubspotSDK\Marketing\Emails\PublicDividerStyleSettings
 * @phpstan-import-type PublicFontStyleShape from \HubspotSDK\Marketing\Emails\PublicFontStyle
 *
 * @phpstan-type PublicEmailStyleSettingsShape = array{
 *   backgroundColor?: string|null,
 *   backgroundImage?: string|null,
 *   backgroundImageType?: string|null,
 *   bodyBorderColor?: string|null,
 *   bodyBorderColorChoice?: string|null,
 *   bodyBorderWidth?: float|null,
 *   bodyColor?: string|null,
 *   buttonStyleSettings?: null|PublicButtonStyleSettings|PublicButtonStyleSettingsShape,
 *   colorPickerFavorite1?: string|null,
 *   colorPickerFavorite2?: string|null,
 *   colorPickerFavorite3?: string|null,
 *   colorPickerFavorite4?: string|null,
 *   colorPickerFavorite5?: string|null,
 *   colorPickerFavorite6?: string|null,
 *   dividerStyleSettings?: null|PublicDividerStyleSettings|PublicDividerStyleSettingsShape,
 *   emailBodyPadding?: string|null,
 *   emailBodyWidth?: string|null,
 *   headingOneFont?: null|PublicFontStyle|PublicFontStyleShape,
 *   headingTwoFont?: null|PublicFontStyle|PublicFontStyleShape,
 *   linksFont?: null|PublicFontStyle|PublicFontStyleShape,
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
 * }
 */
final class PublicEmailStyleSettings implements BaseModel
{
    /** @use SdkModel<PublicEmailStyleSettingsShape> */
    use SdkModel;

    #[Optional]
    public ?string $backgroundColor;

    #[Optional]
    public ?string $backgroundImage;

    #[Optional]
    public ?string $backgroundImageType;

    #[Optional]
    public ?string $bodyBorderColor;

    #[Optional]
    public ?string $bodyBorderColorChoice;

    #[Optional]
    public ?float $bodyBorderWidth;

    #[Optional]
    public ?string $bodyColor;

    #[Optional]
    public ?PublicButtonStyleSettings $buttonStyleSettings;

    #[Optional]
    public ?string $colorPickerFavorite1;

    #[Optional]
    public ?string $colorPickerFavorite2;

    #[Optional]
    public ?string $colorPickerFavorite3;

    #[Optional]
    public ?string $colorPickerFavorite4;

    #[Optional]
    public ?string $colorPickerFavorite5;

    #[Optional]
    public ?string $colorPickerFavorite6;

    #[Optional]
    public ?PublicDividerStyleSettings $dividerStyleSettings;

    #[Optional]
    public ?string $emailBodyPadding;

    #[Optional]
    public ?string $emailBodyWidth;

    #[Optional]
    public ?PublicFontStyle $headingOneFont;

    #[Optional]
    public ?PublicFontStyle $headingTwoFont;

    #[Optional]
    public ?PublicFontStyle $linksFont;

    #[Optional]
    public ?string $primaryAccentColor;

    #[Optional]
    public ?string $primaryFont;

    #[Optional]
    public ?string $primaryFontColor;

    #[Optional]
    public ?string $primaryFontLineHeight;

    #[Optional]
    public ?float $primaryFontSize;

    #[Optional]
    public ?string $secondaryAccentColor;

    #[Optional]
    public ?string $secondaryFont;

    #[Optional]
    public ?string $secondaryFontColor;

    #[Optional]
    public ?string $secondaryFontLineHeight;

    #[Optional]
    public ?float $secondaryFontSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PublicButtonStyleSettings|PublicButtonStyleSettingsShape|null $buttonStyleSettings
     * @param PublicDividerStyleSettings|PublicDividerStyleSettingsShape|null $dividerStyleSettings
     * @param PublicFontStyle|PublicFontStyleShape|null $headingOneFont
     * @param PublicFontStyle|PublicFontStyleShape|null $headingTwoFont
     * @param PublicFontStyle|PublicFontStyleShape|null $linksFont
     */
    public static function with(
        ?string $backgroundColor = null,
        ?string $backgroundImage = null,
        ?string $backgroundImageType = null,
        ?string $bodyBorderColor = null,
        ?string $bodyBorderColorChoice = null,
        ?float $bodyBorderWidth = null,
        ?string $bodyColor = null,
        PublicButtonStyleSettings|array|null $buttonStyleSettings = null,
        ?string $colorPickerFavorite1 = null,
        ?string $colorPickerFavorite2 = null,
        ?string $colorPickerFavorite3 = null,
        ?string $colorPickerFavorite4 = null,
        ?string $colorPickerFavorite5 = null,
        ?string $colorPickerFavorite6 = null,
        PublicDividerStyleSettings|array|null $dividerStyleSettings = null,
        ?string $emailBodyPadding = null,
        ?string $emailBodyWidth = null,
        PublicFontStyle|array|null $headingOneFont = null,
        PublicFontStyle|array|null $headingTwoFont = null,
        PublicFontStyle|array|null $linksFont = null,
        ?string $primaryAccentColor = null,
        ?string $primaryFont = null,
        ?string $primaryFontColor = null,
        ?string $primaryFontLineHeight = null,
        ?float $primaryFontSize = null,
        ?string $secondaryAccentColor = null,
        ?string $secondaryFont = null,
        ?string $secondaryFontColor = null,
        ?string $secondaryFontLineHeight = null,
        ?float $secondaryFontSize = null,
    ): self {
        $self = new self;

        null !== $backgroundColor && $self['backgroundColor'] = $backgroundColor;
        null !== $backgroundImage && $self['backgroundImage'] = $backgroundImage;
        null !== $backgroundImageType && $self['backgroundImageType'] = $backgroundImageType;
        null !== $bodyBorderColor && $self['bodyBorderColor'] = $bodyBorderColor;
        null !== $bodyBorderColorChoice && $self['bodyBorderColorChoice'] = $bodyBorderColorChoice;
        null !== $bodyBorderWidth && $self['bodyBorderWidth'] = $bodyBorderWidth;
        null !== $bodyColor && $self['bodyColor'] = $bodyColor;
        null !== $buttonStyleSettings && $self['buttonStyleSettings'] = $buttonStyleSettings;
        null !== $colorPickerFavorite1 && $self['colorPickerFavorite1'] = $colorPickerFavorite1;
        null !== $colorPickerFavorite2 && $self['colorPickerFavorite2'] = $colorPickerFavorite2;
        null !== $colorPickerFavorite3 && $self['colorPickerFavorite3'] = $colorPickerFavorite3;
        null !== $colorPickerFavorite4 && $self['colorPickerFavorite4'] = $colorPickerFavorite4;
        null !== $colorPickerFavorite5 && $self['colorPickerFavorite5'] = $colorPickerFavorite5;
        null !== $colorPickerFavorite6 && $self['colorPickerFavorite6'] = $colorPickerFavorite6;
        null !== $dividerStyleSettings && $self['dividerStyleSettings'] = $dividerStyleSettings;
        null !== $emailBodyPadding && $self['emailBodyPadding'] = $emailBodyPadding;
        null !== $emailBodyWidth && $self['emailBodyWidth'] = $emailBodyWidth;
        null !== $headingOneFont && $self['headingOneFont'] = $headingOneFont;
        null !== $headingTwoFont && $self['headingTwoFont'] = $headingTwoFont;
        null !== $linksFont && $self['linksFont'] = $linksFont;
        null !== $primaryAccentColor && $self['primaryAccentColor'] = $primaryAccentColor;
        null !== $primaryFont && $self['primaryFont'] = $primaryFont;
        null !== $primaryFontColor && $self['primaryFontColor'] = $primaryFontColor;
        null !== $primaryFontLineHeight && $self['primaryFontLineHeight'] = $primaryFontLineHeight;
        null !== $primaryFontSize && $self['primaryFontSize'] = $primaryFontSize;
        null !== $secondaryAccentColor && $self['secondaryAccentColor'] = $secondaryAccentColor;
        null !== $secondaryFont && $self['secondaryFont'] = $secondaryFont;
        null !== $secondaryFontColor && $self['secondaryFontColor'] = $secondaryFontColor;
        null !== $secondaryFontLineHeight && $self['secondaryFontLineHeight'] = $secondaryFontLineHeight;
        null !== $secondaryFontSize && $self['secondaryFontSize'] = $secondaryFontSize;

        return $self;
    }

    public function withBackgroundColor(string $backgroundColor): self
    {
        $self = clone $this;
        $self['backgroundColor'] = $backgroundColor;

        return $self;
    }

    public function withBackgroundImage(string $backgroundImage): self
    {
        $self = clone $this;
        $self['backgroundImage'] = $backgroundImage;

        return $self;
    }

    public function withBackgroundImageType(string $backgroundImageType): self
    {
        $self = clone $this;
        $self['backgroundImageType'] = $backgroundImageType;

        return $self;
    }

    public function withBodyBorderColor(string $bodyBorderColor): self
    {
        $self = clone $this;
        $self['bodyBorderColor'] = $bodyBorderColor;

        return $self;
    }

    public function withBodyBorderColorChoice(
        string $bodyBorderColorChoice
    ): self {
        $self = clone $this;
        $self['bodyBorderColorChoice'] = $bodyBorderColorChoice;

        return $self;
    }

    public function withBodyBorderWidth(float $bodyBorderWidth): self
    {
        $self = clone $this;
        $self['bodyBorderWidth'] = $bodyBorderWidth;

        return $self;
    }

    public function withBodyColor(string $bodyColor): self
    {
        $self = clone $this;
        $self['bodyColor'] = $bodyColor;

        return $self;
    }

    /**
     * @param PublicButtonStyleSettings|PublicButtonStyleSettingsShape $buttonStyleSettings
     */
    public function withButtonStyleSettings(
        PublicButtonStyleSettings|array $buttonStyleSettings
    ): self {
        $self = clone $this;
        $self['buttonStyleSettings'] = $buttonStyleSettings;

        return $self;
    }

    public function withColorPickerFavorite1(string $colorPickerFavorite1): self
    {
        $self = clone $this;
        $self['colorPickerFavorite1'] = $colorPickerFavorite1;

        return $self;
    }

    public function withColorPickerFavorite2(string $colorPickerFavorite2): self
    {
        $self = clone $this;
        $self['colorPickerFavorite2'] = $colorPickerFavorite2;

        return $self;
    }

    public function withColorPickerFavorite3(string $colorPickerFavorite3): self
    {
        $self = clone $this;
        $self['colorPickerFavorite3'] = $colorPickerFavorite3;

        return $self;
    }

    public function withColorPickerFavorite4(string $colorPickerFavorite4): self
    {
        $self = clone $this;
        $self['colorPickerFavorite4'] = $colorPickerFavorite4;

        return $self;
    }

    public function withColorPickerFavorite5(string $colorPickerFavorite5): self
    {
        $self = clone $this;
        $self['colorPickerFavorite5'] = $colorPickerFavorite5;

        return $self;
    }

    public function withColorPickerFavorite6(string $colorPickerFavorite6): self
    {
        $self = clone $this;
        $self['colorPickerFavorite6'] = $colorPickerFavorite6;

        return $self;
    }

    /**
     * @param PublicDividerStyleSettings|PublicDividerStyleSettingsShape $dividerStyleSettings
     */
    public function withDividerStyleSettings(
        PublicDividerStyleSettings|array $dividerStyleSettings
    ): self {
        $self = clone $this;
        $self['dividerStyleSettings'] = $dividerStyleSettings;

        return $self;
    }

    public function withEmailBodyPadding(string $emailBodyPadding): self
    {
        $self = clone $this;
        $self['emailBodyPadding'] = $emailBodyPadding;

        return $self;
    }

    public function withEmailBodyWidth(string $emailBodyWidth): self
    {
        $self = clone $this;
        $self['emailBodyWidth'] = $emailBodyWidth;

        return $self;
    }

    /**
     * @param PublicFontStyle|PublicFontStyleShape $headingOneFont
     */
    public function withHeadingOneFont(
        PublicFontStyle|array $headingOneFont
    ): self {
        $self = clone $this;
        $self['headingOneFont'] = $headingOneFont;

        return $self;
    }

    /**
     * @param PublicFontStyle|PublicFontStyleShape $headingTwoFont
     */
    public function withHeadingTwoFont(
        PublicFontStyle|array $headingTwoFont
    ): self {
        $self = clone $this;
        $self['headingTwoFont'] = $headingTwoFont;

        return $self;
    }

    /**
     * @param PublicFontStyle|PublicFontStyleShape $linksFont
     */
    public function withLinksFont(PublicFontStyle|array $linksFont): self
    {
        $self = clone $this;
        $self['linksFont'] = $linksFont;

        return $self;
    }

    public function withPrimaryAccentColor(string $primaryAccentColor): self
    {
        $self = clone $this;
        $self['primaryAccentColor'] = $primaryAccentColor;

        return $self;
    }

    public function withPrimaryFont(string $primaryFont): self
    {
        $self = clone $this;
        $self['primaryFont'] = $primaryFont;

        return $self;
    }

    public function withPrimaryFontColor(string $primaryFontColor): self
    {
        $self = clone $this;
        $self['primaryFontColor'] = $primaryFontColor;

        return $self;
    }

    public function withPrimaryFontLineHeight(
        string $primaryFontLineHeight
    ): self {
        $self = clone $this;
        $self['primaryFontLineHeight'] = $primaryFontLineHeight;

        return $self;
    }

    public function withPrimaryFontSize(float $primaryFontSize): self
    {
        $self = clone $this;
        $self['primaryFontSize'] = $primaryFontSize;

        return $self;
    }

    public function withSecondaryAccentColor(string $secondaryAccentColor): self
    {
        $self = clone $this;
        $self['secondaryAccentColor'] = $secondaryAccentColor;

        return $self;
    }

    public function withSecondaryFont(string $secondaryFont): self
    {
        $self = clone $this;
        $self['secondaryFont'] = $secondaryFont;

        return $self;
    }

    public function withSecondaryFontColor(string $secondaryFontColor): self
    {
        $self = clone $this;
        $self['secondaryFontColor'] = $secondaryFontColor;

        return $self;
    }

    public function withSecondaryFontLineHeight(
        string $secondaryFontLineHeight
    ): self {
        $self = clone $this;
        $self['secondaryFontLineHeight'] = $secondaryFontLineHeight;

        return $self;
    }

    public function withSecondaryFontSize(float $secondaryFontSize): self
    {
        $self = clone $this;
        $self['secondaryFontSize'] = $secondaryFontSize;

        return $self;
    }
}
