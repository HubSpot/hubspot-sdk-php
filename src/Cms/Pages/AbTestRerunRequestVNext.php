<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for rerunning A/B tests.
 *
 * @phpstan-type AbTestRerunRequestVNextShape = array{
 *   abTestId: string, variationId: string
 * }
 */
final class AbTestRerunRequestVNext implements BaseModel
{
    /** @use SdkModel<AbTestRerunRequestVNextShape> */
    use SdkModel;

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
     * `new AbTestRerunRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestRerunRequestVNext::with(abTestId: ..., variationId: ...)
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
