<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_emails_public_email_style_settings = array{
 *   backgroundColor?: string,
 *   backgroundImage?: string,
 *   backgroundImageType?: string,
 *   bodyBorderColor?: string,
 *   bodyBorderColorChoice?: string,
 *   bodyBorderWidth?: float,
 *   bodyColor?: string,
 *   buttonStyleSettings?: MarketingEmailsPublicButtonStyleSettings,
 *   colorPickerFavorite1?: string,
 *   colorPickerFavorite2?: string,
 *   colorPickerFavorite3?: string,
 *   colorPickerFavorite4?: string,
 *   colorPickerFavorite5?: string,
 *   colorPickerFavorite6?: string,
 *   dividerStyleSettings?: MarketingEmailsPublicDividerStyleSettings,
 *   emailBodyPadding?: string,
 *   emailBodyWidth?: string,
 *   headingOneFont?: MarketingEmailsPublicFontStyle,
 *   headingTwoFont?: MarketingEmailsPublicFontStyle,
 *   linksFont?: MarketingEmailsPublicFontStyle,
 *   primaryAccentColor?: string,
 *   primaryFont?: string,
 *   primaryFontColor?: string,
 *   primaryFontLineHeight?: string,
 *   primaryFontSize?: float,
 *   secondaryAccentColor?: string,
 *   secondaryFont?: string,
 *   secondaryFontColor?: string,
 *   secondaryFontLineHeight?: string,
 *   secondaryFontSize?: float,
 * }
 */
final class MarketingEmailsPublicEmailStyleSettings implements BaseModel
{
    /** @use SdkModel<marketing_emails_public_email_style_settings> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $backgroundColor;

    #[Api(optional: true)]
    public ?string $backgroundImage;

    #[Api(optional: true)]
    public ?string $backgroundImageType;

    #[Api(optional: true)]
    public ?string $bodyBorderColor;

    #[Api(optional: true)]
    public ?string $bodyBorderColorChoice;

    #[Api(optional: true)]
    public ?float $bodyBorderWidth;

    #[Api(optional: true)]
    public ?string $bodyColor;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicButtonStyleSettings $buttonStyleSettings;

    #[Api(optional: true)]
    public ?string $colorPickerFavorite1;

    #[Api(optional: true)]
    public ?string $colorPickerFavorite2;

    #[Api(optional: true)]
    public ?string $colorPickerFavorite3;

    #[Api(optional: true)]
    public ?string $colorPickerFavorite4;

    #[Api(optional: true)]
    public ?string $colorPickerFavorite5;

    #[Api(optional: true)]
    public ?string $colorPickerFavorite6;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicDividerStyleSettings $dividerStyleSettings;

    #[Api(optional: true)]
    public ?string $emailBodyPadding;

    #[Api(optional: true)]
    public ?string $emailBodyWidth;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicFontStyle $headingOneFont;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicFontStyle $headingTwoFont;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicFontStyle $linksFont;

    #[Api(optional: true)]
    public ?string $primaryAccentColor;

    #[Api(optional: true)]
    public ?string $primaryFont;

    #[Api(optional: true)]
    public ?string $primaryFontColor;

    #[Api(optional: true)]
    public ?string $primaryFontLineHeight;

    #[Api(optional: true)]
    public ?float $primaryFontSize;

    #[Api(optional: true)]
    public ?string $secondaryAccentColor;

    #[Api(optional: true)]
    public ?string $secondaryFont;

    #[Api(optional: true)]
    public ?string $secondaryFontColor;

    #[Api(optional: true)]
    public ?string $secondaryFontLineHeight;

    #[Api(optional: true)]
    public ?float $secondaryFontSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $backgroundColor = null,
        ?string $backgroundImage = null,
        ?string $backgroundImageType = null,
        ?string $bodyBorderColor = null,
        ?string $bodyBorderColorChoice = null,
        ?float $bodyBorderWidth = null,
        ?string $bodyColor = null,
        ?MarketingEmailsPublicButtonStyleSettings $buttonStyleSettings = null,
        ?string $colorPickerFavorite1 = null,
        ?string $colorPickerFavorite2 = null,
        ?string $colorPickerFavorite3 = null,
        ?string $colorPickerFavorite4 = null,
        ?string $colorPickerFavorite5 = null,
        ?string $colorPickerFavorite6 = null,
        ?MarketingEmailsPublicDividerStyleSettings $dividerStyleSettings = null,
        ?string $emailBodyPadding = null,
        ?string $emailBodyWidth = null,
        ?MarketingEmailsPublicFontStyle $headingOneFont = null,
        ?MarketingEmailsPublicFontStyle $headingTwoFont = null,
        ?MarketingEmailsPublicFontStyle $linksFont = null,
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
        $obj = new self;

        null !== $backgroundColor && $obj->backgroundColor = $backgroundColor;
        null !== $backgroundImage && $obj->backgroundImage = $backgroundImage;
        null !== $backgroundImageType && $obj->backgroundImageType = $backgroundImageType;
        null !== $bodyBorderColor && $obj->bodyBorderColor = $bodyBorderColor;
        null !== $bodyBorderColorChoice && $obj->bodyBorderColorChoice = $bodyBorderColorChoice;
        null !== $bodyBorderWidth && $obj->bodyBorderWidth = $bodyBorderWidth;
        null !== $bodyColor && $obj->bodyColor = $bodyColor;
        null !== $buttonStyleSettings && $obj->buttonStyleSettings = $buttonStyleSettings;
        null !== $colorPickerFavorite1 && $obj->colorPickerFavorite1 = $colorPickerFavorite1;
        null !== $colorPickerFavorite2 && $obj->colorPickerFavorite2 = $colorPickerFavorite2;
        null !== $colorPickerFavorite3 && $obj->colorPickerFavorite3 = $colorPickerFavorite3;
        null !== $colorPickerFavorite4 && $obj->colorPickerFavorite4 = $colorPickerFavorite4;
        null !== $colorPickerFavorite5 && $obj->colorPickerFavorite5 = $colorPickerFavorite5;
        null !== $colorPickerFavorite6 && $obj->colorPickerFavorite6 = $colorPickerFavorite6;
        null !== $dividerStyleSettings && $obj->dividerStyleSettings = $dividerStyleSettings;
        null !== $emailBodyPadding && $obj->emailBodyPadding = $emailBodyPadding;
        null !== $emailBodyWidth && $obj->emailBodyWidth = $emailBodyWidth;
        null !== $headingOneFont && $obj->headingOneFont = $headingOneFont;
        null !== $headingTwoFont && $obj->headingTwoFont = $headingTwoFont;
        null !== $linksFont && $obj->linksFont = $linksFont;
        null !== $primaryAccentColor && $obj->primaryAccentColor = $primaryAccentColor;
        null !== $primaryFont && $obj->primaryFont = $primaryFont;
        null !== $primaryFontColor && $obj->primaryFontColor = $primaryFontColor;
        null !== $primaryFontLineHeight && $obj->primaryFontLineHeight = $primaryFontLineHeight;
        null !== $primaryFontSize && $obj->primaryFontSize = $primaryFontSize;
        null !== $secondaryAccentColor && $obj->secondaryAccentColor = $secondaryAccentColor;
        null !== $secondaryFont && $obj->secondaryFont = $secondaryFont;
        null !== $secondaryFontColor && $obj->secondaryFontColor = $secondaryFontColor;
        null !== $secondaryFontLineHeight && $obj->secondaryFontLineHeight = $secondaryFontLineHeight;
        null !== $secondaryFontSize && $obj->secondaryFontSize = $secondaryFontSize;

        return $obj;
    }

    public function withBackgroundColor(string $backgroundColor): self
    {
        $obj = clone $this;
        $obj->backgroundColor = $backgroundColor;

        return $obj;
    }

    public function withBackgroundImage(string $backgroundImage): self
    {
        $obj = clone $this;
        $obj->backgroundImage = $backgroundImage;

        return $obj;
    }

    public function withBackgroundImageType(string $backgroundImageType): self
    {
        $obj = clone $this;
        $obj->backgroundImageType = $backgroundImageType;

        return $obj;
    }

    public function withBodyBorderColor(string $bodyBorderColor): self
    {
        $obj = clone $this;
        $obj->bodyBorderColor = $bodyBorderColor;

        return $obj;
    }

    public function withBodyBorderColorChoice(
        string $bodyBorderColorChoice
    ): self {
        $obj = clone $this;
        $obj->bodyBorderColorChoice = $bodyBorderColorChoice;

        return $obj;
    }

    public function withBodyBorderWidth(float $bodyBorderWidth): self
    {
        $obj = clone $this;
        $obj->bodyBorderWidth = $bodyBorderWidth;

        return $obj;
    }

    public function withBodyColor(string $bodyColor): self
    {
        $obj = clone $this;
        $obj->bodyColor = $bodyColor;

        return $obj;
    }

    public function withButtonStyleSettings(
        MarketingEmailsPublicButtonStyleSettings $buttonStyleSettings
    ): self {
        $obj = clone $this;
        $obj->buttonStyleSettings = $buttonStyleSettings;

        return $obj;
    }

    public function withColorPickerFavorite1(string $colorPickerFavorite1): self
    {
        $obj = clone $this;
        $obj->colorPickerFavorite1 = $colorPickerFavorite1;

        return $obj;
    }

    public function withColorPickerFavorite2(string $colorPickerFavorite2): self
    {
        $obj = clone $this;
        $obj->colorPickerFavorite2 = $colorPickerFavorite2;

        return $obj;
    }

    public function withColorPickerFavorite3(string $colorPickerFavorite3): self
    {
        $obj = clone $this;
        $obj->colorPickerFavorite3 = $colorPickerFavorite3;

        return $obj;
    }

    public function withColorPickerFavorite4(string $colorPickerFavorite4): self
    {
        $obj = clone $this;
        $obj->colorPickerFavorite4 = $colorPickerFavorite4;

        return $obj;
    }

    public function withColorPickerFavorite5(string $colorPickerFavorite5): self
    {
        $obj = clone $this;
        $obj->colorPickerFavorite5 = $colorPickerFavorite5;

        return $obj;
    }

    public function withColorPickerFavorite6(string $colorPickerFavorite6): self
    {
        $obj = clone $this;
        $obj->colorPickerFavorite6 = $colorPickerFavorite6;

        return $obj;
    }

    public function withDividerStyleSettings(
        MarketingEmailsPublicDividerStyleSettings $dividerStyleSettings
    ): self {
        $obj = clone $this;
        $obj->dividerStyleSettings = $dividerStyleSettings;

        return $obj;
    }

    public function withEmailBodyPadding(string $emailBodyPadding): self
    {
        $obj = clone $this;
        $obj->emailBodyPadding = $emailBodyPadding;

        return $obj;
    }

    public function withEmailBodyWidth(string $emailBodyWidth): self
    {
        $obj = clone $this;
        $obj->emailBodyWidth = $emailBodyWidth;

        return $obj;
    }

    public function withHeadingOneFont(
        MarketingEmailsPublicFontStyle $headingOneFont
    ): self {
        $obj = clone $this;
        $obj->headingOneFont = $headingOneFont;

        return $obj;
    }

    public function withHeadingTwoFont(
        MarketingEmailsPublicFontStyle $headingTwoFont
    ): self {
        $obj = clone $this;
        $obj->headingTwoFont = $headingTwoFont;

        return $obj;
    }

    public function withLinksFont(
        MarketingEmailsPublicFontStyle $linksFont
    ): self {
        $obj = clone $this;
        $obj->linksFont = $linksFont;

        return $obj;
    }

    public function withPrimaryAccentColor(string $primaryAccentColor): self
    {
        $obj = clone $this;
        $obj->primaryAccentColor = $primaryAccentColor;

        return $obj;
    }

    public function withPrimaryFont(string $primaryFont): self
    {
        $obj = clone $this;
        $obj->primaryFont = $primaryFont;

        return $obj;
    }

    public function withPrimaryFontColor(string $primaryFontColor): self
    {
        $obj = clone $this;
        $obj->primaryFontColor = $primaryFontColor;

        return $obj;
    }

    public function withPrimaryFontLineHeight(
        string $primaryFontLineHeight
    ): self {
        $obj = clone $this;
        $obj->primaryFontLineHeight = $primaryFontLineHeight;

        return $obj;
    }

    public function withPrimaryFontSize(float $primaryFontSize): self
    {
        $obj = clone $this;
        $obj->primaryFontSize = $primaryFontSize;

        return $obj;
    }

    public function withSecondaryAccentColor(string $secondaryAccentColor): self
    {
        $obj = clone $this;
        $obj->secondaryAccentColor = $secondaryAccentColor;

        return $obj;
    }

    public function withSecondaryFont(string $secondaryFont): self
    {
        $obj = clone $this;
        $obj->secondaryFont = $secondaryFont;

        return $obj;
    }

    public function withSecondaryFontColor(string $secondaryFontColor): self
    {
        $obj = clone $this;
        $obj->secondaryFontColor = $secondaryFontColor;

        return $obj;
    }

    public function withSecondaryFontLineHeight(
        string $secondaryFontLineHeight
    ): self {
        $obj = clone $this;
        $obj->secondaryFontLineHeight = $secondaryFontLineHeight;

        return $obj;
    }

    public function withSecondaryFontSize(float $secondaryFontSize): self
    {
        $obj = clone $this;
        $obj->secondaryFontSize = $secondaryFontSize;

        return $obj;
    }
}
