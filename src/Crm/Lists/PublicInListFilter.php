<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicInListFilter\FilterType;

/**
 * @phpstan-import-type PublicInListFilterMetadataShape from \HubspotSDK\Crm\Lists\PublicInListFilterMetadata
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

    /**
     * Indicates the type of filter being applied (IN_LIST).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * The ID of the list used in the association filter.
     */
    #[Required('listId')]
    public string $listID;

    /**
     * Specifies the operation to be performed by the filter (IN_LIST, NOT_IN_LIST).
     */
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
     * @param PublicInListFilterMetadata|PublicInListFilterMetadataShape|null $metadata
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
     * Indicates the type of filter being applied (IN_LIST).
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
     * The ID of the list used in the association filter.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * Specifies the operation to be performed by the filter (IN_LIST, NOT_IN_LIST).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * @param PublicInListFilterMetadata|PublicInListFilterMetadataShape $metadata
     */
    public function withMetadata(
        PublicInListFilterMetadata|array $metadata
    ): self {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
