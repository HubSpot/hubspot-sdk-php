<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\LandingPages\AbTest;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new A/B test variation based on the information provided in the request body.
 *
 * @see HubSpotSDK\Services\Cms\Pages\LandingPages\AbTestService::createLandingPageVariation()
 *
 * @phpstan-type AbTestCreateLandingPageVariationParamsShape = array{
 *   contentID: string, variationName: string
 * }
 */
final class AbTestCreateLandingPageVariationParams implements BaseModel
{
    /** @use SdkModel<AbTestCreateLandingPageVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to test.
     */
    #[Required('contentId')]
    public string $contentID;

    /**
     * Name of A/B test variation.
     */
    #[Required]
    public string $variationName;

    /**
     * `new AbTestCreateLandingPageVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestCreateLandingPageVariationParams::with(contentID: ..., variationName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbTestCreateLandingPageVariationParams)
     *   ->withContentID(...)
     *   ->withVariationName(...)
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
    public static function with(string $contentID, string $variationName): self
    {
        $self = new self;

        $self['contentID'] = $contentID;
        $self['variationName'] = $variationName;

        return $self;
    }

    /**
     * ID of the object to test.
     */
    public function withContentID(string $contentID): self
    {
        $self = clone $this;
        $self['contentID'] = $contentID;

        return $self;
    }

    /**
     * Name of A/B test variation.
     */
    public function withVariationName(string $variationName): self
    {
        $self = clone $this;
        $self['variationName'] = $variationName;

        return $self;
    }
}
