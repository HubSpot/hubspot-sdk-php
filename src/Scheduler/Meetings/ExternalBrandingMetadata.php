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
        $obj = new self;

        $obj['logoAltText'] = $logoAltText;
        $obj['showMarketingAd'] = $showMarketingAd;
        $obj['showSalesAd'] = $showSalesAd;

        null !== $accent2Color && $obj['accent2Color'] = $accent2Color;
        null !== $accentColor && $obj['accentColor'] = $accentColor;
        null !== $companyAddressLine1 && $obj['companyAddressLine1'] = $companyAddressLine1;
        null !== $companyAddressLine2 && $obj['companyAddressLine2'] = $companyAddressLine2;
        null !== $companyAvatar && $obj['companyAvatar'] = $companyAvatar;
        null !== $companyCity && $obj['companyCity'] = $companyCity;
        null !== $companyCountry && $obj['companyCountry'] = $companyCountry;
        null !== $companyDomain && $obj['companyDomain'] = $companyDomain;
        null !== $companyName && $obj['companyName'] = $companyName;
        null !== $companyState && $obj['companyState'] = $companyState;
        null !== $companyZip && $obj['companyZip'] = $companyZip;
        null !== $logoHeight && $obj['logoHeight'] = $logoHeight;
        null !== $logoURL && $obj['logoURL'] = $logoURL;
        null !== $logoWidth && $obj['logoWidth'] = $logoWidth;
        null !== $primaryColor && $obj['primaryColor'] = $primaryColor;
        null !== $secondaryColor && $obj['secondaryColor'] = $secondaryColor;

        return $obj;
    }

    public function withLogoAltText(string $logoAltText): self
    {
        $obj = clone $this;
        $obj['logoAltText'] = $logoAltText;

        return $obj;
    }

    public function withShowMarketingAd(bool $showMarketingAd): self
    {
        $obj = clone $this;
        $obj['showMarketingAd'] = $showMarketingAd;

        return $obj;
    }

    public function withShowSalesAd(bool $showSalesAd): self
    {
        $obj = clone $this;
        $obj['showSalesAd'] = $showSalesAd;

        return $obj;
    }

    public function withAccent2Color(string $accent2Color): self
    {
        $obj = clone $this;
        $obj['accent2Color'] = $accent2Color;

        return $obj;
    }

    public function withAccentColor(string $accentColor): self
    {
        $obj = clone $this;
        $obj['accentColor'] = $accentColor;

        return $obj;
    }

    public function withCompanyAddressLine1(string $companyAddressLine1): self
    {
        $obj = clone $this;
        $obj['companyAddressLine1'] = $companyAddressLine1;

        return $obj;
    }

    public function withCompanyAddressLine2(string $companyAddressLine2): self
    {
        $obj = clone $this;
        $obj['companyAddressLine2'] = $companyAddressLine2;

        return $obj;
    }

    public function withCompanyAvatar(string $companyAvatar): self
    {
        $obj = clone $this;
        $obj['companyAvatar'] = $companyAvatar;

        return $obj;
    }

    public function withCompanyCity(string $companyCity): self
    {
        $obj = clone $this;
        $obj['companyCity'] = $companyCity;

        return $obj;
    }

    public function withCompanyCountry(string $companyCountry): self
    {
        $obj = clone $this;
        $obj['companyCountry'] = $companyCountry;

        return $obj;
    }

    public function withCompanyDomain(string $companyDomain): self
    {
        $obj = clone $this;
        $obj['companyDomain'] = $companyDomain;

        return $obj;
    }

    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj['companyName'] = $companyName;

        return $obj;
    }

    public function withCompanyState(string $companyState): self
    {
        $obj = clone $this;
        $obj['companyState'] = $companyState;

        return $obj;
    }

    public function withCompanyZip(string $companyZip): self
    {
        $obj = clone $this;
        $obj['companyZip'] = $companyZip;

        return $obj;
    }

    public function withLogoHeight(int $logoHeight): self
    {
        $obj = clone $this;
        $obj['logoHeight'] = $logoHeight;

        return $obj;
    }

    public function withLogoURL(string $logoURL): self
    {
        $obj = clone $this;
        $obj['logoURL'] = $logoURL;

        return $obj;
    }

    public function withLogoWidth(int $logoWidth): self
    {
        $obj = clone $this;
        $obj['logoWidth'] = $logoWidth;

        return $obj;
    }

    public function withPrimaryColor(string $primaryColor): self
    {
        $obj = clone $this;
        $obj['primaryColor'] = $primaryColor;

        return $obj;
    }

    public function withSecondaryColor(string $secondaryColor): self
    {
        $obj = clone $this;
        $obj['secondaryColor'] = $secondaryColor;

        return $obj;
    }
}
