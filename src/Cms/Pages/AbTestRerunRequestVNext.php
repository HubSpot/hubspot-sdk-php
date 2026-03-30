<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AbTestRerunRequestVNextShape = array{
 *   abTestID: string, variationID: string
 * }
 */
final class AbTestRerunRequestVNext implements BaseModel
{
    /** @use SdkModel<AbTestRerunRequestVNextShape> */
    use SdkModel;

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
     * `new AbTestRerunRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestRerunRequestVNext::with(abTestID: ..., variationID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbTestRerunRequestVNext)->withAbTestID(...)->withVariationID(...)
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
