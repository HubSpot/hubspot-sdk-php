<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FilterShape from \HubSpotSDK\Crm\Filter
 *
 * @phpstan-type FilterGroupShape = array{filters: list<Filter|FilterShape>}
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
     * @param list<Filter|FilterShape> $filters
     */
    public static function with(array $filters): self
    {
        $self = new self;

        $self['filters'] = $filters;

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
}
