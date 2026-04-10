<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FilterShape from \HubSpotSDK\Webhooks\Filter
 *
 * @phpstan-type FilterCreateRequestShape = array{
 *   filter: Filter|FilterShape, subscriptionID: int
 * }
 */
final class FilterCreateRequest implements BaseModel
{
    /** @use SdkModel<FilterCreateRequestShape> */
    use SdkModel;

    /**
     * Defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against.
     */
    #[Required]
    public Filter $filter;

    #[Required('subscriptionId')]
    public int $subscriptionID;

    /**
     * `new FilterCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilterCreateRequest::with(filter: ..., subscriptionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilterCreateRequest)->withFilter(...)->withSubscriptionID(...)
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
    public static function with(Filter|array $filter, int $subscriptionID): self
    {
        $self = new self;

        $self['filter'] = $filter;
        $self['subscriptionID'] = $subscriptionID;

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

    public function withSubscriptionID(int $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }
}
