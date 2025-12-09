<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Rerun a previous A/B test.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::rerunAbTest()
 *
 * @phpstan-type LandingPageRerunAbTestParamsShape = array{
 *   abTestId: string, variationId: string
 * }
 */
final class LandingPageRerunAbTestParams implements BaseModel
{
    /** @use SdkModel<LandingPageRerunAbTestParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the test to rerun.
     */
    #[Required]
    public string $abTestId;

    /**
     * ID of the object to reactivate as a test variation.
     */
    #[Required]
    public string $variationId;

    /**
     * `new LandingPageRerunAbTestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageRerunAbTestParams::with(abTestId: ..., variationId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageRerunAbTestParams)->withAbTestID(...)->withVariationID(...)
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
    public static function with(string $abTestId, string $variationId): self
    {
        $obj = new self;

        $obj['abTestId'] = $abTestId;
        $obj['variationId'] = $variationId;

        return $obj;
    }

    /**
     * ID of the test to rerun.
     */
    public function withAbTestID(string $abTestID): self
    {
        $obj = clone $this;
        $obj['abTestId'] = $abTestID;

        return $obj;
    }

    /**
     * ID of the object to reactivate as a test variation.
     */
    public function withVariationID(string $variationID): self
    {
        $obj = clone $this;
        $obj['variationId'] = $variationID;

        return $obj;
    }
}
