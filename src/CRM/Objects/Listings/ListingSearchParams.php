<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Listings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\FilterGroup;

/**
 * @see HubspotSDK\CRM\Objects\Listings->search
 *
 * @phpstan-type listing_search_params = array{
 *   after?: string,
 *   filterGroups?: list<FilterGroup>,
 *   limit?: int,
 *   properties?: list<string>,
 *   query?: string,
 *   sorts?: list<string>,
 * }
 */
final class ListingSearchParams implements BaseModel
{
    /** @use SdkModel<listing_search_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Up to 6 groups of filters defining additional query criteria.
     *
     * @var list<FilterGroup>|null $filterGroups
     */
    #[Api(list: FilterGroup::class, optional: true)]
    public ?array $filterGroups;

    /**
     * The maximum results to return, up to 200 objects.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * A list of property names to include in the response.
     *
     * @var list<string>|null $properties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    /**
     * The search query string, up to 3000 characters.
     */
    #[Api(optional: true)]
    public ?string $query;

    /**
     * Specifies sorting order based on object properties.
     *
     * @var list<string>|null $sorts
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sorts;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<FilterGroup> $filterGroups
     * @param list<string> $properties
     * @param list<string> $sorts
     */
    public static function with(
        ?string $after = null,
        ?array $filterGroups = null,
        ?int $limit = null,
        ?array $properties = null,
        ?string $query = null,
        ?array $sorts = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $filterGroups && $obj->filterGroups = $filterGroups;
        null !== $limit && $obj->limit = $limit;
        null !== $properties && $obj->properties = $properties;
        null !== $query && $obj->query = $query;
        null !== $sorts && $obj->sorts = $sorts;

        return $obj;
    }

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Up to 6 groups of filters defining additional query criteria.
     *
     * @param list<FilterGroup> $filterGroups
     */
    public function withFilterGroups(array $filterGroups): self
    {
        $obj = clone $this;
        $obj->filterGroups = $filterGroups;

        return $obj;
    }

    /**
     * The maximum results to return, up to 200 objects.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

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
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * The search query string, up to 3000 characters.
     */
    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj->query = $query;

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
        $obj->sorts = $sorts;

        return $obj;
    }
}
