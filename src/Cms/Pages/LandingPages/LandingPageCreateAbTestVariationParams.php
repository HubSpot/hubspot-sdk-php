<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new A/B test variation based on the information provided in the request body.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::createAbTestVariation()
 *
 * @phpstan-type LandingPageCreateAbTestVariationParamsShape = array{
 *   contentId: string, variationName: string
 * }
 */
final class LandingPageCreateAbTestVariationParams implements BaseModel
{
    /** @use SdkModel<LandingPageCreateAbTestVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to test.
     */
    #[Api]
    public string $contentId;

    /**
     * Name of A/B test variation.
     */
    #[Api]
    public string $variationName;

    /**
     * `new LandingPageCreateAbTestVariationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageCreateAbTestVariationParams::with(contentId: ..., variationName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageCreateAbTestVariationParams)
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
    public static function with(string $contentId, string $variationName): self
    {
        $obj = new self;

        $obj['contentId'] = $contentId;
        $obj['variationName'] = $variationName;

        return $obj;
    }

    /**
     * ID of the object to test.
     */
    public function withContentID(string $contentID): self
    {
        $obj = clone $this;
        $obj['contentId'] = $contentID;

        return $obj;
    }

    /**
     * Name of A/B test variation.
     */
    public function withVariationName(string $variationName): self
    {
        $obj = clone $this;
        $obj['variationName'] = $variationName;

        return $obj;
    }
}
