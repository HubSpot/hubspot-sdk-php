<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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

    #[Required]
    public string $logoAltText;

    #[Required]
    public bool $showMarketingAd;

    #[Required]
    public bool $showSalesAd;

    #[Optional]
    public ?string $accent2Color;

    #[Optional]
    public ?string $accentColor;

    #[Optional]
    public ?string $companyAddressLine1;

    #[Optional]
    public ?string $companyAddressLine2;

    #[Optional]
    public ?string $companyAvatar;

    #[Optional]
    public ?string $companyCity;

    #[Optional]
    public ?string $companyCountry;

    #[Optional]
    public ?string $companyDomain;

    #[Optional]
    public ?string $companyName;

    #[Optional]
    public ?string $companyState;

    #[Optional]
    public ?string $companyZip;

    #[Optional]
    public ?int $logoHeight;

    #[Optional('logoUrl')]
    public ?string $logoURL;

    #[Optional]
    public ?int $logoWidth;

    #[Optional]
    public ?string $primaryColor;

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

    public function withLogoAltText(string $logoAltText): self
    {
        $self = clone $this;
        $self['logoAltText'] = $logoAltText;

        return $self;
    }

    public function withShowMarketingAd(bool $showMarketingAd): self
    {
        $self = clone $this;
        $self['showMarketingAd'] = $showMarketingAd;

        return $self;
    }

    public function withShowSalesAd(bool $showSalesAd): self
    {
        $self = clone $this;
        $self['showSalesAd'] = $showSalesAd;

        return $self;
    }

    public function withAccent2Color(string $accent2Color): self
    {
        $self = clone $this;
        $self['accent2Color'] = $accent2Color;

        return $self;
    }

    public function withAccentColor(string $accentColor): self
    {
        $self = clone $this;
        $self['accentColor'] = $accentColor;

        return $self;
    }

    public function withCompanyAddressLine1(string $companyAddressLine1): self
    {
        $self = clone $this;
        $self['companyAddressLine1'] = $companyAddressLine1;

        return $self;
    }

    public function withCompanyAddressLine2(string $companyAddressLine2): self
    {
        $self = clone $this;
        $self['companyAddressLine2'] = $companyAddressLine2;

        return $self;
    }

    public function withCompanyAvatar(string $companyAvatar): self
    {
        $self = clone $this;
        $self['companyAvatar'] = $companyAvatar;

        return $self;
    }

    public function withCompanyCity(string $companyCity): self
    {
        $self = clone $this;
        $self['companyCity'] = $companyCity;

        return $self;
    }

    public function withCompanyCountry(string $companyCountry): self
    {
        $self = clone $this;
        $self['companyCountry'] = $companyCountry;

        return $self;
    }

    public function withCompanyDomain(string $companyDomain): self
    {
        $self = clone $this;
        $self['companyDomain'] = $companyDomain;

        return $self;
    }

    public function withCompanyName(string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    public function withCompanyState(string $companyState): self
    {
        $self = clone $this;
        $self['companyState'] = $companyState;

        return $self;
    }

    public function withCompanyZip(string $companyZip): self
    {
        $self = clone $this;
        $self['companyZip'] = $companyZip;

        return $self;
    }

    public function withLogoHeight(int $logoHeight): self
    {
        $self = clone $this;
        $self['logoHeight'] = $logoHeight;

        return $self;
    }

    public function withLogoURL(string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }

    public function withLogoWidth(int $logoWidth): self
    {
        $self = clone $this;
        $self['logoWidth'] = $logoWidth;

        return $self;
    }

    public function withPrimaryColor(string $primaryColor): self
    {
        $self = clone $this;
        $self['primaryColor'] = $primaryColor;

        return $self;
    }

    public function withSecondaryColor(string $secondaryColor): self
    {
        $self = clone $this;
        $self['secondaryColor'] = $secondaryColor;

        return $self;
    }
}
