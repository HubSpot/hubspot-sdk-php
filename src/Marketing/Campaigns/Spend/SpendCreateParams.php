<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Spend;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public float $amount;

    #[Api]
    public string $name;

    #[Api]
    public int $order;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->amount = $amount;
        $obj->name = $name;
        $obj->order = $order;

        null !== $description && $obj->description = $description;

        return $obj;
    }

    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withOrder(int $order): self
    {
        $obj = clone $this;
        $obj->order = $order;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
