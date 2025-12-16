<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicConstantFilter\FilterType;

/**
 * @phpstan-type PublicConstantFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   shouldAccept: bool,
 *   source?: string|null,
 * }
 */
final class PublicConstantFilter implements BaseModel
{
    /** @use SdkModel<PublicConstantFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public bool $shouldAccept;

    #[Optional]
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
        $self = new self;

        $self['filterType'] = $filterType;
        $self['shouldAccept'] = $shouldAccept;

        null !== $source && $self['source'] = $source;

        return $self;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    public function withShouldAccept(bool $shouldAccept): self
    {
        $self = clone $this;
        $self['shouldAccept'] = $shouldAccept;

        return $self;
    }

    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }
}
