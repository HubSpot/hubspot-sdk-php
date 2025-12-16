<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FilterShape from \HubspotSDK\Crm\Filter
 *
 * @phpstan-type FilterGroupShape = array{filters: list<FilterShape>}
 */
final class FilterGroup implements BaseModel
{
    /** @use SdkModel<FilterGroupShape> */
    use SdkModel;

    /** @var list<Filter> $filters */
    #[Required(list: Filter::class)]
    public array $filters;

    /**
     * `new FilterGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilterGroup::with(filters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilterGroup)->withFilters(...)
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
     * @param list<FilterShape> $filters
     */
    public static function with(array $filters): self
    {
        $self = new self;

        $self['filters'] = $filters;

        return $self;
    }

    /**
     * @param list<FilterShape> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }
}
