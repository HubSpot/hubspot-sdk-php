<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalBrandingMetadataShape = array{
 *   logoAltText: string,
 *   showMarketingAd: bool,
 *   showSalesAd: bool,
 *   accent2Color?: string|null,
 *   accentColor?: string|null,
 *   companyAddressLine1?: string|null,
 *   companyAddressLine2?: string|null,
 *   companyAvatar?: string|null,
 *   companyCity?: string|null,
 *   companyCountry?: string|null,
 *   companyDomain?: string|null,
 *   companyName?: string|null,
 *   companyState?: string|null,
 *   companyZip?: string|null,
 *   logoHeight?: int|null,
 *   logoURL?: string|null,
 *   logoWidth?: int|null,
 *   primaryColor?: string|null,
 *   secondaryColor?: string|null,
 * }
 */
final class ExternalBrandingMetadata implements BaseModel
{
    /** @use SdkModel<ExternalBrandingMetadataShape> */
    use SdkModel;

    /**
     * The alternative text for the current logo.
     */
    #[Required]
    public string $logoAltText;

    /**
     * Whether Hubspot Marketing ads are shown.
     */
    #[Required]
    public bool $showMarketingAd;

    /**
     * Whether Hubspot Sales ads are shown.
     */
    #[Required]
    public bool $showSalesAd;

    /**
     * The secondary accent color used in branding.
     */
    #[Optional]
    public ?string $accent2Color;

    /**
     * The primary accent color used in branding.
     */
    #[Optional]
    public ?string $accentColor;

    /**
     * The first line of the company's address.
     */
    #[Optional]
    public ?string $companyAddressLine1;

    /**
     * The second line of the company's address.
     */
    #[Optional]
    public ?string $companyAddressLine2;

    /**
     * The URL of the company's avatar image.
     */
    #[Optional]
    public ?string $companyAvatar;

    /**
     * The city where the company is located.
     */
    #[Optional]
    public ?string $companyCity;

    /**
     * The country where the company is located.
     */
    #[Optional]
    public ?string $companyCountry;

    /**
     * The domain of the company's website.
     */
    #[Optional]
    public ?string $companyDomain;

    /**
     * The name of the company.
     */
    #[Optional]
    public ?string $companyName;

    /**
     * The state where the company is located.
     */
    #[Optional]
    public ?string $companyState;

    /**
     * The ZIP code of the company's location.
     */
    #[Optional]
    public ?string $companyZip;

    /**
     * The height of the logo in pixels.
     */
    #[Optional]
    public ?int $logoHeight;

    /**
     * The URL of a custom logo image.
     */
    #[Optional('logoUrl')]
    public ?string $logoURL;

    /**
     * The width of the logo in pixels.
     */
    #[Optional]
    public ?int $logoWidth;

    /**
     * The primary color used in branding.
     */
    #[Optional]
    public ?string $primaryColor;

    /**
     * The secondary color used in branding.
     */
    #[Optional]
    public ?string $secondaryColor;

    /**
     * `new ExternalBrandingMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalBrandingMetadata::with(
     *   logoAltText: ..., showMarketingAd: ..., showSalesAd: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalBrandingMetadata)
     *   ->withLogoAltText(...)
     *   ->withShowMarketingAd(...)
     *   ->withShowSalesAd(...)
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
     */
    public static function with(
        string $logoAltText,
        bool $showMarketingAd,
        bool $showSalesAd,
        ?string $accent2Color = null,
        ?string $accentColor = null,
        ?string $companyAddressLine1 = null,
        ?string $companyAddressLine2 = null,
        ?string $companyAvatar = null,
        ?string $companyCity = null,
        ?string $companyCountry = null,
        ?string $companyDomain = null,
        ?string $companyName = null,
        ?string $companyState = null,
        ?string $companyZip = null,
        ?int $logoHeight = null,
        ?string $logoURL = null,
        ?int $logoWidth = null,
        ?string $primaryColor = null,
        ?string $secondaryColor = null,
    ): self {
        $self = new self;

        $self['logoAltText'] = $logoAltText;
        $self['showMarketingAd'] = $showMarketingAd;
        $self['showSalesAd'] = $showSalesAd;

        null !== $accent2Color && $self['accent2Color'] = $accent2Color;
        null !== $accentColor && $self['accentColor'] = $accentColor;
        null !== $companyAddressLine1 && $self['companyAddressLine1'] = $companyAddressLine1;
        null !== $companyAddressLine2 && $self['companyAddressLine2'] = $companyAddressLine2;
        null !== $companyAvatar && $self['companyAvatar'] = $companyAvatar;
        null !== $companyCity && $self['companyCity'] = $companyCity;
        null !== $companyCountry && $self['companyCountry'] = $companyCountry;
        null !== $companyDomain && $self['companyDomain'] = $companyDomain;
        null !== $companyName && $self['companyName'] = $companyName;
        null !== $companyState && $self['companyState'] = $companyState;
        null !== $companyZip && $self['companyZip'] = $companyZip;
        null !== $logoHeight && $self['logoHeight'] = $logoHeight;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $logoWidth && $self['logoWidth'] = $logoWidth;
        null !== $primaryColor && $self['primaryColor'] = $primaryColor;
        null !== $secondaryColor && $self['secondaryColor'] = $secondaryColor;

        return $self;
    }

    /**
     * The alternative text for the current logo.
     */
    public function withLogoAltText(string $logoAltText): self
    {
        $self = clone $this;
        $self['logoAltText'] = $logoAltText;

        return $self;
    }

    /**
     * Whether Hubspot Marketing ads are shown.
     */
    public function withShowMarketingAd(bool $showMarketingAd): self
    {
        $self = clone $this;
        $self['showMarketingAd'] = $showMarketingAd;

        return $self;
    }

    /**
     * Whether Hubspot Sales ads are shown.
     */
    public function withShowSalesAd(bool $showSalesAd): self
    {
        $self = clone $this;
        $self['showSalesAd'] = $showSalesAd;

        return $self;
    }

    /**
     * The secondary accent color used in branding.
     */
    public function withAccent2Color(string $accent2Color): self
    {
        $self = clone $this;
        $self['accent2Color'] = $accent2Color;

        return $self;
    }

    /**
     * The primary accent color used in branding.
     */
    public function withAccentColor(string $accentColor): self
    {
        $self = clone $this;
        $self['accentColor'] = $accentColor;

        return $self;
    }

    /**
     * The first line of the company's address.
     */
    public function withCompanyAddressLine1(string $companyAddressLine1): self
    {
        $self = clone $this;
        $self['companyAddressLine1'] = $companyAddressLine1;

        return $self;
    }

    /**
     * The second line of the company's address.
     */
    public function withCompanyAddressLine2(string $companyAddressLine2): self
    {
        $self = clone $this;
        $self['companyAddressLine2'] = $companyAddressLine2;

        return $self;
    }

    /**
     * The URL of the company's avatar image.
     */
    public function withCompanyAvatar(string $companyAvatar): self
    {
        $self = clone $this;
        $self['companyAvatar'] = $companyAvatar;

        return $self;
    }

    /**
     * The city where the company is located.
     */
    public function withCompanyCity(string $companyCity): self
    {
        $self = clone $this;
        $self['companyCity'] = $companyCity;

        return $self;
    }

    /**
     * The country where the company is located.
     */
    public function withCompanyCountry(string $companyCountry): self
    {
        $self = clone $this;
        $self['companyCountry'] = $companyCountry;

        return $self;
    }

    /**
     * The domain of the company's website.
     */
    public function withCompanyDomain(string $companyDomain): self
    {
        $self = clone $this;
        $self['companyDomain'] = $companyDomain;

        return $self;
    }

    /**
     * The name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    /**
     * The state where the company is located.
     */
    public function withCompanyState(string $companyState): self
    {
        $self = clone $this;
        $self['companyState'] = $companyState;

        return $self;
    }

    /**
     * The ZIP code of the company's location.
     */
    public function withCompanyZip(string $companyZip): self
    {
        $self = clone $this;
        $self['companyZip'] = $companyZip;

        return $self;
    }

    /**
     * The height of the logo in pixels.
     */
    public function withLogoHeight(int $logoHeight): self
    {
        $self = clone $this;
        $self['logoHeight'] = $logoHeight;

        return $self;
    }

    /**
     * The URL of a custom logo image.
     */
    public function withLogoURL(string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }

    /**
     * The width of the logo in pixels.
     */
    public function withLogoWidth(int $logoWidth): self
    {
        $self = clone $this;
        $self['logoWidth'] = $logoWidth;

        return $self;
    }

    /**
     * The primary color used in branding.
     */
    public function withPrimaryColor(string $primaryColor): self
    {
        $self = clone $this;
        $self['primaryColor'] = $primaryColor;

        return $self;
    }

    /**
     * The secondary color used in branding.
     */
    public function withSecondaryColor(string $secondaryColor): self
    {
        $self = clone $this;
        $self['secondaryColor'] = $secondaryColor;

        return $self;
    }
}
