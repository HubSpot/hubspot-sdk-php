<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPISort\Order;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_sort = array{
 *   order: value-of<Order>, property: string, missing?: string
 * }
 */
final class AutomationAPISort implements BaseModel
{
    /** @use SdkModel<automation_api_sort> */
    use SdkModel;

    /** @var value-of<Order> $order */
    #[Api(enum: Order::class)]
    public string $order;

    #[Api]
    public string $property;

    #[Api(optional: true)]
    public ?string $missing;

    /**
     * `new AutomationAPISort()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPISort::with(order: ..., property: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPISort)->withOrder(...)->withProperty(...)
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
     * @param Order|value-of<Order> $order
     */
    public static function with(
        Order|string $order,
        string $property,
        ?string $missing = null
    ): self {
        $obj = new self;

        $obj['order'] = $order;
        $obj->property = $property;

        null !== $missing && $obj->missing = $missing;

        return $obj;
    }

    /**
     * @param Order|value-of<Order> $order
     */
    public function withOrder(Order|string $order): self
    {
        $obj = clone $this;
        $obj['order'] = $order;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }

    public function withMissing(string $missing): self
    {
        $obj = clone $this;
        $obj->missing = $missing;

        return $obj;
    }
}
