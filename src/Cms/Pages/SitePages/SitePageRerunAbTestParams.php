<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Rerun a previous A/B test.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::rerunAbTest()
 *
 * @phpstan-type SitePageRerunAbTestParamsShape = array{
 *   abTestID: string, variationID: string
 * }
 */
final class SitePageRerunAbTestParams implements BaseModel
{
    /** @use SdkModel<SitePageRerunAbTestParamsShape> */
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
