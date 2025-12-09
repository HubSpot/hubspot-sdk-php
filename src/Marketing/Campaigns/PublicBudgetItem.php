<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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

    #[Required]
    public string $id;

    #[Required]
    public float $amount;

    #[Required]
    public int $createdAt;

    #[Required]
    public string $name;

    #[Required]
    public int $order;

    #[Required]
    public int $updatedAt;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
