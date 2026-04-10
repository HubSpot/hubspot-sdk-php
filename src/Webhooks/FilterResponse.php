<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FilterShape from \HubSpotSDK\Webhooks\Filter
 *
 * @phpstan-type FilterResponseShape = array{
 *   id: int, createdAt: int, filter: Filter|FilterShape
 * }
 */
final class FilterResponse implements BaseModel
{
    /** @use SdkModel<FilterResponseShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public int $createdAt;

    /**
     * Defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against.
     */
    #[Required]
    public Filter $filter;

    /**
     * `new FilterResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilterResponse::with(id: ..., createdAt: ..., filter: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilterResponse)->withID(...)->withCreatedAt(...)->withFilter(...)
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
     * @param Filter|FilterShape $filter
     */
    public static function with(
        int $id,
        int $createdAt,
        Filter|array $filter
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['filter'] = $filter;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against.
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
