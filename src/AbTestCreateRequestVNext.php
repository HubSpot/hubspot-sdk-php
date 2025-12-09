<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for creating A/B tests.
 *
 * @phpstan-type AbTestCreateRequestVNextShape = array{
 *   contentID: string, variationName: string
 * }
 */
final class AbTestCreateRequestVNext implements BaseModel
{
    /** @use SdkModel<AbTestCreateRequestVNextShape> */
    use SdkModel;

    /**
     * ID of the object to test.
     */
    #[Required('contentId')]
    public string $contentID;

    /**
     * Name of A/B test variation.
     */
    #[Required]
    public string $variationName;

    /**
     * `new AbTestCreateRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestCreateRequestVNext::with(contentID: ..., variationName: ...)
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
    public static function with(string $contentID, string $variationName): self
    {
        $self = new self;

        $self['contentID'] = $contentID;
        $self['variationName'] = $variationName;

        return $self;
    }

    /**
     * ID of the object to test.
     */
    public function withContentID(string $contentID): self
    {
        $self = clone $this;
        $self['contentID'] = $contentID;

        return $self;
    }

    /**
     * Name of A/B test variation.
     */
    public function withVariationName(string $variationName): self
    {
        $self = clone $this;
        $self['variationName'] = $variationName;

        return $self;
    }
}
