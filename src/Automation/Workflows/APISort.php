<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APISort\Order;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APISortShape = array{
 *   order: value-of<Order>, property: string, missing?: string|null
 * }
 */
final class APISort implements BaseModel
{
    /** @use SdkModel<APISortShape> */
    use SdkModel;

    /** @var value-of<Order> $order */
    #[Required(enum: Order::class)]
    public string $order;

    #[Required]
    public string $property;

    #[Optional]
    public ?string $missing;

    /**
     * `new APISort()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APISort::with(order: ..., property: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APISort)->withOrder(...)->withProperty(...)
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
        $self = new self;

        $self['order'] = $order;
        $self['property'] = $property;

        null !== $missing && $self['missing'] = $missing;

        return $self;
    }

    /**
     * @param Order|value-of<Order> $order
     */
    public function withOrder(Order|string $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    public function withMissing(string $missing): self
    {
        $self = clone $this;
        $self['missing'] = $missing;

        return $self;
    }
}
