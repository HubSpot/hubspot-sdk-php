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
 *   abTestID: string, variationID: string
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
    #[Required('abTestId')]
    public string $abTestID;

    /**
     * ID of the object to reactivate as a test variation.
     */
    #[Required('variationId')]
    public string $variationID;

    /**
     * `new LandingPageRerunAbTestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageRerunAbTestParams::with(abTestID: ..., variationID: ...)
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
