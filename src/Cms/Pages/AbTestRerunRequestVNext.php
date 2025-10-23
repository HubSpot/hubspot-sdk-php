<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for rerunning A/B tests.
 *
 * @phpstan-type ab_test_rerun_request_v_next = array{
 *   abTestID: string, variationID: string
 * }
 */
final class AbTestRerunRequestVNext implements BaseModel
{
    /** @use SdkModel<ab_test_rerun_request_v_next> */
    use SdkModel;

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
