<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicInListFilter\FilterType;

/**
 * @phpstan-type PublicInListFilterShape = array{
 *   filterType: value-of<FilterType>,
 *   listId: string,
 *   operator: string,
 *   metadata?: PublicInListFilterMetadata|null,
 * }
 */
final class PublicInListFilter implements BaseModel
{
    /** @use SdkModel<PublicInListFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $listId;

    #[Api]
    public string $operator;

    #[Api(optional: true)]
    public ?PublicInListFilterMetadata $metadata;

    /**
     * `new PublicInListFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicInListFilter::with(filterType: ..., listId: ..., operator: ...)
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
        string $listId,
        string $operator,
        FilterType|string $filterType = 'IN_LIST',
        PublicInListFilterMetadata|array|null $metadata = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj['listId'] = $listId;
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
        $obj['listId'] = $listID;

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
