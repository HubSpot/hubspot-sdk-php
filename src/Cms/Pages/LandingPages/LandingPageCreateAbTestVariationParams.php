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
 * @see HubspotSDK\Cms\Pages\LandingPages->createAbTestVariation
 *
 * @phpstan-type landing_page_create_ab_test_variation_params = array{
 *   contentID: string, variationName: string
 * }
 */
final class LandingPageCreateAbTestVariationParams implements BaseModel
{
    /** @use SdkModel<landing_page_create_ab_test_variation_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to test.
     */
    #[Api('contentId')]
    public string $contentID;

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
     * LandingPageCreateAbTestVariationParams::with(contentID: ..., variationName: ...)
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
    public static function with(string $contentID, string $variationName): self
    {
        $obj = new self;

        $obj->contentID = $contentID;
        $obj->variationName = $variationName;

        return $obj;
    }

    /**
     * ID of the object to test.
     */
    public function withContentID(string $contentID): self
    {
        $obj = clone $this;
        $obj->contentID = $contentID;

        return $obj;
    }

    /**
     * Name of A/B test variation.
     */
    public function withVariationName(string $variationName): self
    {
        $obj = clone $this;
        $obj->variationName = $variationName;

        return $obj;
    }
}
