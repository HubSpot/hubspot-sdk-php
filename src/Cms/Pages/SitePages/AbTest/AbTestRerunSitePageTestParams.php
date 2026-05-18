<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\SitePages\AbTest;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Rerun a previous A/B test.
 *
 * @see HubSpotSDK\Services\Cms\Pages\SitePages\AbTestService::rerunSitePageTest()
 *
 * @phpstan-type AbTestRerunSitePageTestParamsShape = array{
 *   abTestID: string, variationID: string
 * }
 */
final class AbTestRerunSitePageTestParams implements BaseModel
{
    /** @use SdkModel<AbTestRerunSitePageTestParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the test to rerun.
     */
    #[Required('abTestId')]
    public string $abTestID;

    /**
     * ID of the object to reactivate as a test variation.
     */
    #[Required('variationId')]
    public string $variationID;

    /**
     * `new AbTestRerunSitePageTestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestRerunSitePageTestParams::with(abTestID: ..., variationID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbTestRerunSitePageTestParams)->withAbTestID(...)->withVariationID(...)
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
        $self = new self;

        $self['abTestID'] = $abTestID;
        $self['variationID'] = $variationID;

        return $self;
    }

    /**
     * ID of the test to rerun.
     */
    public function withAbTestID(string $abTestID): self
    {
        $self = clone $this;
        $self['abTestID'] = $abTestID;

        return $self;
    }

    /**
     * ID of the object to reactivate as a test variation.
     */
    public function withVariationID(string $variationID): self
    {
        $self = clone $this;
        $self['variationID'] = $variationID;

        return $self;
    }
}
