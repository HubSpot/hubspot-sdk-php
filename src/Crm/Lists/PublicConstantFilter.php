<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicConstantFilter\FilterType;

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

    /**
     * Specifies the type of filter, which is (CONSTANT).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Indicates whether the filter should accept the condition.
     */
    #[Required]
    public bool $shouldAccept;

    /**
     * Defines the source of the constant filter.
     */
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
     * Specifies the type of filter, which is (CONSTANT).
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Indicates whether the filter should accept the condition.
     */
    public function withShouldAccept(bool $shouldAccept): self
    {
        $self = clone $this;
        $self['shouldAccept'] = $shouldAccept;

        return $self;
    }

    /**
     * Defines the source of the constant filter.
     */
    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }
}
