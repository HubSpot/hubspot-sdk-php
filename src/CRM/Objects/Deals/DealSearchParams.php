<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Deals;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\CRMObjectsFilterGroup;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DealSearchParams); // set properties as needed
 * $client->crm.objects.deals->search(...$params->toArray());
 * ```.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.deals->search(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Deals->search
 *
 * @phpstan-type deal_search_params = array{
 *   after?: string,
 *   filterGroups?: list<CRMObjectsFilterGroup>,
 *   limit?: int,
 *   properties?: list<string>,
 *   query?: string,
 *   sorts?: list<string>,
 * }
 */
final class DealSearchParams implements BaseModel
{
    /** @use SdkModel<deal_search_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    /** @var list<CRMObjectsFilterGroup>|null $filterGroups */
    #[Api(list: CRMObjectsFilterGroup::class, optional: true)]
    public ?array $filterGroups;

    #[Api(optional: true)]
    public ?int $limit;

    /** @var list<string>|null $properties */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    #[Api(optional: true)]
    public ?string $query;

    /** @var list<string>|null $sorts */
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
     * @param list<CRMObjectsFilterGroup> $filterGroups
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

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * @param list<CRMObjectsFilterGroup> $filterGroups
     */
    public function withFilterGroups(array $filterGroups): self
    {
        $obj = clone $this;
        $obj->filterGroups = $filterGroups;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj->query = $query;

        return $obj;
    }

    /**
     * @param list<string> $sorts
     */
    public function withSorts(array $sorts): self
    {
        $obj = clone $this;
        $obj->sorts = $sorts;

        return $obj;
    }
}
