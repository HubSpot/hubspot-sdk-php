<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicInListFilter\FilterType;

/**
 * @phpstan-import-type PublicInListFilterMetadataShape from \HubspotSDK\PublicInListFilterMetadata
 *
 * @phpstan-type PublicInListFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   listID: string,
 *   operator: string,
 *   metadata?: null|PublicInListFilterMetadata|PublicInListFilterMetadataShape,
 * }
 */
final class PublicInListFilter implements BaseModel
{
    /** @use SdkModel<PublicInListFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required('listId')]
    public string $listID;

    #[Required]
    public string $operator;

    #[Optional]
    public ?PublicInListFilterMetadata $metadata;

    /**
     * `new PublicInListFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicInListFilter::with(filterType: ..., listID: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicInListFilter)
     *   ->withFilterType(...)
     *   ->withListID(...)
     *   ->withOperator(...)
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
     * @param PublicInListFilterMetadataShape $metadata
     */
    public static function with(
        string $listID,
        string $operator,
        FilterType|string $filterType = 'IN_LIST',
        PublicInListFilterMetadata|array|null $metadata = null,
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['listID'] = $listID;
        $self['operator'] = $operator;

        null !== $metadata && $self['metadata'] = $metadata;

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

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * @param PublicInListFilterMetadataShape $metadata
     */
    public function withMetadata(
        PublicInListFilterMetadata|array $metadata
    ): self {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
