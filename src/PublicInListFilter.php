<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicInListFilter\FilterType;

/**
 * @phpstan-type PublicInListFilterShape = array{
 *   filterType: value-of<FilterType>,
 *   listID: string,
 *   operator: string,
 *   metadata?: PublicInListFilterMetadata|null,
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
     * @param PublicInListFilterMetadata|array{
     *   id: string, inListType: string
     * } $metadata
     */
    public static function with(
        string $listID,
        string $operator,
        FilterType|string $filterType = 'IN_LIST',
        PublicInListFilterMetadata|array|null $metadata = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj['listID'] = $listID;
        $obj['operator'] = $operator;

        null !== $metadata && $obj['metadata'] = $metadata;

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

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listID'] = $listID;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    /**
     * @param PublicInListFilterMetadata|array{
     *   id: string, inListType: string
     * } $metadata
     */
    public function withMetadata(
        PublicInListFilterMetadata|array $metadata
    ): self {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }
}
