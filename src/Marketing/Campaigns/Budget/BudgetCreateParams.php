<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Budget;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Add a new budget item to the campaign.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\BudgetService::create()
 *
 * @phpstan-type BudgetCreateParamsShape = array{
 *   amount: float, name: string, order: int, description?: string
 * }
 */
final class BudgetCreateParams implements BaseModel
{
    /** @use SdkModel<BudgetCreateParamsShape> */
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
     * `new BudgetCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BudgetCreateParams::with(amount: ..., name: ..., order: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BudgetCreateParams)->withAmount(...)->withName(...)->withOrder(...)
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

        $obj['amount'] = $amount;
        $obj['name'] = $name;
        $obj['order'] = $order;

        null !== $description && $obj['description'] = $description;

        return $obj;
    }

    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withOrder(int $order): self
    {
        $obj = clone $this;
        $obj['order'] = $order;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }
}
