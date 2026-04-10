<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\CommercePayments;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\FilterGroup;

/**
 * Execute a search for commerce payments based on the provided filter groups, properties, and sorting options. This endpoint allows for complex queries to retrieve specific payment records from the CRM.
 *
 * @see HubSpotSDK\Services\Crm\Objects\CommercePaymentsService::search()
 *
 * @phpstan-import-type FilterGroupShape from \HubSpotSDK\Crm\FilterGroup
 *
 * @phpstan-type CommercePaymentSearchParamsShape = array{
 *   after: string,
 *   filterGroups: list<FilterGroup|FilterGroupShape>,
 *   limit: int,
 *   properties: list<string>,
 *   sorts: list<string>,
 *   query?: string|null,
 * }
 */
final class CommercePaymentSearchParams implements BaseModel
{
    /** @use SdkModel<CommercePaymentSearchParamsShape> */
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
     * `new CommercePaymentSearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommercePaymentSearchParams::with(
     *   after: ..., filterGroups: ..., limit: ..., properties: ..., sorts: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommercePaymentSearchParams)
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
     * @param list<FilterGroup|FilterGroupShape> $filterGroups
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
        $self = new self;

        $self['after'] = $after;
        $self['filterGroups'] = $filterGroups;
        $self['limit'] = $limit;
        $self['properties'] = $properties;
        $self['sorts'] = $sorts;

        null !== $query && $self['query'] = $query;

        return $self;
    }

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Up to 6 groups of filters defining additional query criteria.
     *
     * @param list<FilterGroup|FilterGroupShape> $filterGroups
     */
    public function withFilterGroups(array $filterGroups): self
    {
        $self = clone $this;
        $self['filterGroups'] = $filterGroups;

        return $self;
    }

    /**
     * The maximum results to return, up to 200 objects.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * A list of property names to include in the response.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Specifies sorting order based on object properties.
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
     * The search query string, up to 3000 characters.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
