<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A Business Unit's logo metadata.
 *
 * @phpstan-type PublicBusinessUnitLogoMetadataShape = array{
 *   logoAltText?: string, logoURL?: string, resizedURL?: string
 * }
 */
final class PublicBusinessUnitLogoMetadata implements BaseModel
{
    /** @use SdkModel<PublicBusinessUnitLogoMetadataShape> */
    use SdkModel;

    /**
     * The logo's alt text.
     */
    #[Api(optional: true)]
    public ?string $logoAltText;

    /**
     * The logo's url.
     */
    #[Api('logoUrl', optional: true)]
    public ?string $logoURL;

    /**
     * The logo's resized url.
     */
    #[Api('resizedUrl', optional: true)]
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
        $obj = new self;

        null !== $logoAltText && $obj->logoAltText = $logoAltText;
        null !== $logoURL && $obj->logoURL = $logoURL;
        null !== $resizedURL && $obj->resizedURL = $resizedURL;

        return $obj;
    }

    /**
     * The logo's alt text.
     */
    public function withLogoAltText(string $logoAltText): self
    {
        $obj = clone $this;
        $obj->logoAltText = $logoAltText;

        return $obj;
    }

    /**
     * The logo's url.
     */
    public function withLogoURL(string $logoURL): self
    {
        $obj = clone $this;
        $obj->logoURL = $logoURL;

        return $obj;
    }

    /**
     * The logo's resized url.
     */
    public function withResizedURL(string $resizedURL): self
    {
        $obj = clone $this;
        $obj->resizedURL = $resizedURL;

        return $obj;
    }
}
