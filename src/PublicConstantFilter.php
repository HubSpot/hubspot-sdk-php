<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicConstantFilter\FilterType;

/**
 * @phpstan-type PublicConstantFilterShape = array{
 *   filterType: value-of<FilterType>, shouldAccept: bool, source?: string|null
 * }
 */
final class PublicConstantFilter implements BaseModel
{
    /** @use SdkModel<PublicConstantFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public bool $shouldAccept;

    #[Api(optional: true)]
    public ?string $source;

    /**
     * `new PublicConstantFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicConstantFilter::with(filterType: ..., shouldAccept: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicConstantFilter)->withFilterType(...)->withShouldAccept(...)
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
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        bool $shouldAccept,
        FilterType|string $filterType = 'CONSTANT',
        ?string $source = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj['shouldAccept'] = $shouldAccept;

        null !== $source && $obj['source'] = $source;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withShouldAccept(bool $shouldAccept): self
    {
        $obj = clone $this;
        $obj['shouldAccept'] = $shouldAccept;

        return $obj;
    }

    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }
}
