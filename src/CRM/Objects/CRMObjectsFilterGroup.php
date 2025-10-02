<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_filter_group = array{filters: list<CRMObjectsFilter>}
 */
final class CRMObjectsFilterGroup implements BaseModel
{
    /** @use SdkModel<crm_objects_filter_group> */
    use SdkModel;

    /** @var list<CRMObjectsFilter> $filters */
    #[Api(list: CRMObjectsFilter::class)]
    public array $filters;

    /**
     * `new CRMObjectsFilterGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsFilterGroup::with(filters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsFilterGroup)->withFilters(...)
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
     * @param list<CRMObjectsFilter> $filters
     */
    public static function with(array $filters): self
    {
        $obj = new self;

        $obj->filters = $filters;

        return $obj;
    }

    /**
     * @param list<CRMObjectsFilter> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }
}
