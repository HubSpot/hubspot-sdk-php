<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\Budget;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Add a new budget item to the campaign.
 *
 * @see HubSpotSDK\Services\Marketing\Campaigns\BudgetService::create()
 *
 * @phpstan-type BudgetCreateParamsShape = array{
 *   amount: float, name: string, order: int, description?: string|null
 * }
 */
final class BudgetCreateParams implements BaseModel
{
    /** @use SdkModel<BudgetCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The monetary value assigned to the budget item.
     */
    #[Required]
    public float $amount;

    /**
     * The name of the budget item.
     */
    #[Required]
    public string $name;

    /**
     * The sequence number indicating the order of the budget item.
     */
    #[Required]
    public int $order;

    /**
     * A detailed explanation or notes about the budget item.
     */
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
        $self = new self;

        $self['amount'] = $amount;
        $self['name'] = $name;
        $self['order'] = $order;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * The monetary value assigned to the budget item.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The name of the budget item.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The sequence number indicating the order of the budget item.
     */
    public function withOrder(int $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    /**
     * A detailed explanation or notes about the budget item.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
