<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Filter;
use HubspotSDK\Crm\FilterGroup;

/**
 * @see HubspotSDK\Services\Crm\Objects\MeetingsService::search()
 *
 * @phpstan-type MeetingSearchParamsShape = array{
 *   after: string,
 *   filterGroups: list<FilterGroup|array{filters: list<Filter>}>,
 *   limit: int,
 *   properties: list<string>,
 *   sorts: list<string>,
 *   query?: string,
 * }
 */
final class MeetingSearchParams implements BaseModel
{
    /** @use SdkModel<MeetingSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    #[Api]
    public string $after;

    /**
     * Up to 6 groups of filters defining additional query criteria.
     *
     * @var list<FilterGroup> $filterGroups
     */
    #[Api(list: FilterGroup::class)]
    public array $filterGroups;

    /**
     * The maximum results to return, up to 200 objects.
     */
    #[Api]
    public int $limit;

    /**
     * A list of property names to include in the response.
     *
     * @var list<string> $properties
     */
    #[Api(list: 'string')]
    public array $properties;

    /**
     * Specifies sorting order based on object properties.
     *
     * @var list<string> $sorts
     */
    #[Api(list: 'string')]
    public array $sorts;

    /**
     * The search query string, up to 3000 characters.
     */
    #[Api(optional: true)]
    public ?string $query;

    /**
     * `new MeetingSearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSearchParams::with(
     *   after: ..., filterGroups: ..., limit: ..., properties: ..., sorts: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSearchParams)
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
