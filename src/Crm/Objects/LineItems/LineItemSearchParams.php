<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\LineItems;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Filter;
use HubspotSDK\Crm\FilterGroup;

/**
 * @see HubspotSDK\Services\Crm\Objects\LineItemsService::search()
 *
 * @phpstan-type LineItemSearchParamsShape = array{
 *   after: string,
 *   filterGroups: list<FilterGroup|array{filters: list<Filter>}>,
 *   limit: int,
 *   properties: list<string>,
 *   sorts: list<string>,
 *   query?: string,
 * }
 */
final class LineItemSearchParams implements BaseModel
{
    /** @use SdkModel<LineItemSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    #[Required]
    public string $after;

    /**
     * Up to 6 groups of filters defining additional query criteria.
     *
     * @var list<FilterGroup> $filterGroups
     */
    #[Required(list: FilterGroup::class)]
    public array $filterGroups;

    /**
     * The maximum results to return, up to 200 objects.
     */
    #[Required]
    public int $limit;

    /**
     * A list of property names to include in the response.
     *
     * @var list<string> $properties
     */
    #[Required(list: 'string')]
    public array $properties;

    /**
     * Specifies sorting order based on object properties.
     *
     * @var list<string> $sorts
     */
    #[Required(list: 'string')]
    public array $sorts;

    /**
     * The search query string, up to 3000 characters.
     */
    #[Optional]
    public ?string $query;

    /**
     * `new LineItemSearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LineItemSearchParams::with(
     *   after: ..., filterGroups: ..., limit: ..., properties: ..., sorts: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LineItemSearchParams)
     *   ->withAfter(...)
     *   ->withFilterGroups(...)
     *   ->withLimit(...)
     *   ->withProperties(...)
     *   ->withSorts(...)
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
     * @param list<FilterGroup|array{filters: list<Filter>}> $filterGroups
     * @param list<string> $properties
     * @param list<string> $sorts
     */
    public static function with(
        string $after,
        array $filterGroups,
        int $limit,
        array $properties,
        array $sorts,
        ?string $query = null,
    ): self {
        $obj = new self;

        $obj['after'] = $after;
        $obj['filterGroups'] = $filterGroups;
        $obj['limit'] = $limit;
        $obj['properties'] = $properties;
        $obj['sorts'] = $sorts;

        null !== $query && $obj['query'] = $query;

        return $obj;
    }

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * Up to 6 groups of filters defining additional query criteria.
     *
     * @param list<FilterGroup|array{filters: list<Filter>}> $filterGroups
     */
    public function withFilterGroups(array $filterGroups): self
    {
        $obj = clone $this;
        $obj['filterGroups'] = $filterGroups;

        return $obj;
    }

    /**
     * The maximum results to return, up to 200 objects.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * A list of property names to include in the response.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * Specifies sorting order based on object properties.
     *
     * @param list<string> $sorts
     */
    public function withSorts(array $sorts): self
    {
        $obj = clone $this;
        $obj['sorts'] = $sorts;

        return $obj;
    }

    /**
     * The search query string, up to 3000 characters.
     */
    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj['query'] = $query;

        return $obj;
    }
}
