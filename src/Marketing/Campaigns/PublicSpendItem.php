<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSpendItemShape = array{
 *   id: string,
 *   amount: float,
 *   createdAt: int,
 *   name: string,
 *   order: int,
 *   updatedAt: int,
 *   description?: string|null,
 * }
 */
final class PublicSpendItem implements BaseModel
{
    /** @use SdkModel<PublicSpendItemShape> */
    use SdkModel;

    /**
     * Unique identifier for the spend item.
     */
    #[Required]
    public string $id;

    /**
     * The monetary value associated with the spend item.
     */
    #[Required]
    public float $amount;

    /**
     * The timestamp indicating when the spend item was created.
     */
    #[Required]
    public int $createdAt;

    /**
     * The name assigned to the spend item.
     */
    #[Required]
    public string $name;

    /**
     * The sequence order of the spend item, where 0 is the oldest.
     */
    #[Required]
    public int $order;

    /**
     * The timestamp indicating when the spend item was last updated.
     */
    #[Required]
    public int $updatedAt;

    /**
     * A detailed explanation or notes about the spend item.
     */
    #[Optional]
    public ?string $description;

    /**
     * `new PublicSpendItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSpendItem::with(
     *   id: ..., amount: ..., createdAt: ..., name: ..., order: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSpendItem)
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
     * Unique identifier for the spend item.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The monetary value associated with the spend item.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The timestamp indicating when the spend item was created.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The name assigned to the spend item.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The sequence order of the spend item, where 0 is the oldest.
     */
    public function withOrder(int $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    /**
     * The timestamp indicating when the spend item was last updated.
     */
    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A detailed explanation or notes about the spend item.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
