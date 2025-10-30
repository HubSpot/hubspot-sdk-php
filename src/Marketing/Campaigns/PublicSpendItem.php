<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
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
 *   description?: string,
 * }
 */
final class PublicSpendItem implements BaseModel
{
    /** @use SdkModel<PublicSpendItemShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public float $amount;

    #[Api]
    public int $createdAt;

    #[Api]
    public string $name;

    #[Api]
    public int $order;

    #[Api]
    public int $updatedAt;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->amount = $amount;
        $obj->createdAt = $createdAt;
        $obj->name = $name;
        $obj->order = $order;
        $obj->updatedAt = $updatedAt;

        null !== $description && $obj->description = $description;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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

    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
