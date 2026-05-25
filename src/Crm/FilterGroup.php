<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CrmFilterShape from \HubSpotSDK\Crm\CrmFilter
 *
 * @phpstan-type FilterGroupShape = array{filters: list<CrmFilter|CrmFilterShape>}
 */
final class FilterGroup implements BaseModel
{
    /** @use SdkModel<FilterGroupShape> */
    use SdkModel;

    /** @var list<CrmFilter> $filters */
    #[Required(list: CrmFilter::class)]
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
     * @param list<CrmFilter|CrmFilterShape> $filters
     */
    public static function with(array $filters): self
    {
        $self = new self;

        $self['filters'] = $filters;

        return $self;
    }

    /**
     * @param list<CrmFilter|CrmFilterShape> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }
}
