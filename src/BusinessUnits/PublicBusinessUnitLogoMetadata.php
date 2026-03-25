<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicBusinessUnitLogoMetadataShape = array{
 *   logoAltText?: string|null, logoURL?: string|null, resizedURL?: string|null
 * }
 */
final class PublicBusinessUnitLogoMetadata implements BaseModel
{
    /** @use SdkModel<PublicBusinessUnitLogoMetadataShape> */
    use SdkModel;

    /**
     * The logo's alt text.
     */
    #[Optional]
    public ?string $logoAltText;

    /**
     * The logo's url.
     */
    #[Optional('logoUrl')]
    public ?string $logoURL;

    /**
     * The logo's resized url.
     */
    #[Optional('resizedUrl')]
    public ?string $resizedURL;

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
        ?string $logoAltText = null,
        ?string $logoURL = null,
        ?string $resizedURL = null,
    ): self {
        $self = new self;

        null !== $logoAltText && $self['logoAltText'] = $logoAltText;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $resizedURL && $self['resizedURL'] = $resizedURL;

        return $self;
    }

    /**
     * The logo's alt text.
     */
    public function withLogoAltText(string $logoAltText): self
    {
        $self = clone $this;
        $self['logoAltText'] = $logoAltText;

        return $self;
    }

    /**
     * The logo's url.
     */
    public function withLogoURL(string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }

    /**
     * The logo's resized url.
     */
    public function withResizedURL(string $resizedURL): self
    {
        $self = clone $this;
        $self['resizedURL'] = $resizedURL;

        return $self;
    }
}
