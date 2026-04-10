<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Filter;
use HubSpotSDK\Crm\FilterGroup;

/**
 * @phpstan-import-type FilterGroupShape from \HubSpotSDK\Crm\FilterGroup
 * @phpstan-import-type FilterShape from \HubSpotSDK\Crm\Filter
 *
 * @phpstan-type PublicCrmSearchRequestShape = array{
 *   filterGroups: list<FilterGroup|FilterGroupShape>,
 *   filters: list<Filter|FilterShape>,
 *   sorts: list<string>,
 *   query?: string|null,
 * }
 */
final class PublicCrmSearchRequest implements BaseModel
{
    /** @use SdkModel<PublicCrmSearchRequestShape> */
    use SdkModel;

    /** @var list<FilterGroup> $filterGroups */
    #[Required(list: FilterGroup::class)]
    public array $filterGroups;

    /** @var list<Filter> $filters */
    #[Required(list: Filter::class)]
    public array $filters;

    /**
     * Defines the order in which the CRM records should be returned.
     *
     * @var list<string> $sorts
     */
    #[Required(list: 'string')]
    public array $sorts;

    /**
     * The search query string, to filter CRM records.
     */
    #[Optional]
    public ?string $query;

    /**
     * `new PublicCrmSearchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCrmSearchRequest::with(filterGroups: ..., filters: ..., sorts: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCrmSearchRequest)
     *   ->withFilterGroups(...)
     *   ->withFilters(...)
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
     * @param list<FilterGroup|FilterGroupShape> $filterGroups
     * @param list<Filter|FilterShape> $filters
     * @param list<string> $sorts
     */
    public static function with(
        array $filterGroups,
        array $filters,
        array $sorts,
        ?string $query = null
    ): self {
        $self = new self;

        $self['filterGroups'] = $filterGroups;
        $self['filters'] = $filters;
        $self['sorts'] = $sorts;

        null !== $query && $self['query'] = $query;

        return $self;
    }

    /**
     * @param list<FilterGroup|FilterGroupShape> $filterGroups
     */
    public function withFilterGroups(array $filterGroups): self
    {
        $self = clone $this;
        $self['filterGroups'] = $filterGroups;

        return $self;
    }

    /**
     * @param list<Filter|FilterShape> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    /**
     * Defines the order in which the CRM records should be returned.
     *
     * @param list<string> $sorts
     */
    public function withSorts(array $sorts): self
    {
        $self = clone $this;
        $self['sorts'] = $sorts;

        return $self;
    }

    /**
     * The search query string, to filter CRM records.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
