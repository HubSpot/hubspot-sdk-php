<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for creating A/B tests.
 *
 * @phpstan-type AbTestCreateRequestVNextShape = array{
 *   contentId: string, variationName: string
 * }
 */
final class AbTestCreateRequestVNext implements BaseModel
{
    /** @use SdkModel<AbTestCreateRequestVNextShape> */
    use SdkModel;

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
     * `new AbTestCreateRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestCreateRequestVNext::with(contentId: ..., variationName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbTestCreateRequestVNext)->withContentID(...)->withVariationName(...)
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
