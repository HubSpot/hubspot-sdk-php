<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Spend;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new campaign spend item.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\SpendService::create()
 *
 * @phpstan-type SpendCreateParamsShape = array{
 *   amount: float, name: string, order: int, description?: string
 * }
 */
final class SpendCreateParams implements BaseModel
{
    /** @use SdkModel<SpendCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public float $amount;

    #[Required]
    public string $name;

    #[Required]
    public int $order;

    #[Optional]
    public ?string $description;

    /**
     * `new SpendCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendCreateParams::with(amount: ..., name: ..., order: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendCreateParams)->withAmount(...)->withName(...)->withOrder(...)
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
     */
    public static function with(
        float $amount,
        string $name,
        int $order,
        ?string $description = null
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['name'] = $name;
        $self['order'] = $order;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOrder(int $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
