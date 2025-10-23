<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Rerun a previous A/B test.
 *
 * @see HubspotSDK\Cms\Pages\SitePages->rerunAbTest
 *
 * @phpstan-type site_page_rerun_ab_test_params = array{
 *   abTestID: string, variationID: string
 * }
 */
final class SitePageRerunAbTestParams implements BaseModel
{
    /** @use SdkModel<site_page_rerun_ab_test_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the test to rerun.
     */
    #[Api('abTestId')]
    public string $abTestID;

    /**
     * ID of the object to reactivate as a test variation.
     */
    #[Api('variationId')]
    public string $variationID;

    /**
     * `new SitePageRerunAbTestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageRerunAbTestParams::with(abTestID: ..., variationID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageRerunAbTestParams)->withAbTestID(...)->withVariationID(...)
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
    public static function with(string $abTestID, string $variationID): self
    {
        $obj = new self;

        $obj->abTestID = $abTestID;
        $obj->variationID = $variationID;

        return $obj;
    }

    /**
     * ID of the test to rerun.
     */
    public function withAbTestID(string $abTestID): self
    {
        $obj = clone $this;
        $obj->abTestID = $abTestID;

        return $obj;
    }

    /**
     * ID of the object to reactivate as a test variation.
     */
    public function withVariationID(string $variationID): self
    {
        $obj = clone $this;
        $obj->variationID = $variationID;

        return $obj;
    }
}
