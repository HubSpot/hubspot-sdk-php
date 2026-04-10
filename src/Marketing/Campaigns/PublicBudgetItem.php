<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicBudgetItemShape = array{
 *   id: string,
 *   amount: float,
 *   createdAt: int,
 *   name: string,
 *   order: int,
 *   updatedAt: int,
 *   description?: string|null,
 * }
 */
final class PublicBudgetItem implements BaseModel
{
    /** @use SdkModel<PublicBudgetItemShape> */
    use SdkModel;

    /**
     * The unique identifier for the budget item.
     */
    #[Required]
    public string $id;

    /**
     * The monetary amount allocated for the budget item.
     */
    #[Required]
    public float $amount;

    /**
     * The timestamp when the budget item was created.
     */
    #[Required]
    public int $createdAt;

    /**
     * The name of the budget item.
     */
    #[Required]
    public string $name;

    /**
     * The order of the budget item, indicating its sequence based on creation date.
     */
    #[Required]
    public int $order;

    /**
     * The timestamp when the budget item was last updated.
     */
    #[Required]
    public int $updatedAt;

    /**
     * A description of the budget item.
     */
    #[Optional]
    public ?string $description;

    /**
     * `new PublicBudgetItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicBudgetItem::with(
     *   id: ..., amount: ..., createdAt: ..., name: ..., order: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicBudgetItem)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withOrder(...)
     *   ->withUpdatedAt(...)
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
        string $id,
        float $amount,
        int $createdAt,
        string $name,
        int $order,
        int $updatedAt,
        ?string $description = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['amount'] = $amount;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['order'] = $order;
        $self['updatedAt'] = $updatedAt;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * The unique identifier for the budget item.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The monetary amount allocated for the budget item.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The timestamp when the budget item was created.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * The order of the budget item, indicating its sequence based on creation date.
     */
    public function withOrder(int $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    /**
     * The timestamp when the budget item was last updated.
     */
    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A description of the budget item.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
