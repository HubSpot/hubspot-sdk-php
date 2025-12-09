<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A Business Unit's logo metadata.
 *
 * @phpstan-type PublicBusinessUnitLogoMetadataShape = array{
 *   logoAltText?: string|null, logoUrl?: string|null, resizedUrl?: string|null
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
    #[Optional]
    public ?string $logoUrl;

    /**
     * The logo's resized url.
     */
    #[Optional]
    public ?string $resizedUrl;

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
        ?string $logoUrl = null,
        ?string $resizedUrl = null,
    ): self {
        $obj = new self;

        null !== $logoAltText && $obj['logoAltText'] = $logoAltText;
        null !== $logoUrl && $obj['logoUrl'] = $logoUrl;
        null !== $resizedUrl && $obj['resizedUrl'] = $resizedUrl;

        return $obj;
    }

    /**
     * The logo's alt text.
     */
    public function withLogoAltText(string $logoAltText): self
    {
        $obj = clone $this;
        $obj['logoAltText'] = $logoAltText;

        return $obj;
    }

    /**
     * The logo's url.
     */
    public function withLogoURL(string $logoURL): self
    {
        $obj = clone $this;
        $obj['logoUrl'] = $logoURL;

        return $obj;
    }

    /**
     * The logo's resized url.
     */
    public function withResizedURL(string $resizedURL): self
    {
        $obj = clone $this;
        $obj['resizedUrl'] = $resizedURL;

        return $obj;
    }
}
