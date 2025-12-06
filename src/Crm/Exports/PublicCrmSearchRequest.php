<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Filter;
use HubspotSDK\Crm\Filter\Operator;
use HubspotSDK\Crm\FilterGroup;

/**
 * @phpstan-type PublicCrmSearchRequestShape = array{
 *   filterGroups: list<FilterGroup>,
 *   filters: list<Filter>,
 *   sorts: list<string>,
 *   query?: string|null,
 * }
 */
final class PublicCrmSearchRequest implements BaseModel
{
    /** @use SdkModel<PublicCrmSearchRequestShape> */
    use SdkModel;

    /** @var list<FilterGroup> $filterGroups */
    #[Api(list: FilterGroup::class)]
    public array $filterGroups;

    /** @var list<Filter> $filters */
    #[Api(list: Filter::class)]
    public array $filters;

    /**
     * Defines the order in which the CRM records should be returned.
     *
     * @var list<string> $sorts
     */
    #[Api(list: 'string')]
    public array $sorts;

    /**
     * The search query string, to filter CRM records.
     */
    #[Api(optional: true)]
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
     * @param list<FilterGroup|array{filters: list<Filter>}> $filterGroups
     * @param list<Filter|array{
     *   operator: value-of<Operator>,
     *   propertyName: string,
     *   highValue?: string|null,
     *   value?: string|null,
     *   values?: list<string>|null,
     * }> $filters
     * @param list<string> $sorts
     */
    public static function with(
        array $filterGroups,
        array $filters,
        array $sorts,
        ?string $query = null
    ): self {
        $obj = new self;

        $obj['filterGroups'] = $filterGroups;
        $obj['filters'] = $filters;
        $obj['sorts'] = $sorts;

        null !== $query && $obj['query'] = $query;

        return $obj;
    }

    /**
     * @param list<FilterGroup|array{filters: list<Filter>}> $filterGroups
     */
    public function withFilterGroups(array $filterGroups): self
    {
        $obj = clone $this;
        $obj['filterGroups'] = $filterGroups;

        return $obj;
    }

    /**
     * @param list<Filter|array{
     *   operator: value-of<Operator>,
     *   propertyName: string,
     *   highValue?: string|null,
     *   value?: string|null,
     *   values?: list<string>|null,
     * }> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj['filters'] = $filters;

        return $obj;
    }

    /**
     * Defines the order in which the CRM records should be returned.
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
     * The search query string, to filter CRM records.
     */
    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj['query'] = $query;

        return $obj;
    }
}
