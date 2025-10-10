<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type hub_db_option = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   order: int,
 *   type: string,
 *   updatedAt: \DateTimeInterface,
 *   createdBy?: SimpleUser,
 *   createdByUserID?: int,
 *   label?: string,
 *   updatedBy?: SimpleUser,
 *   updatedByUserID?: int,
 * }
 */
final class HubDBOption implements BaseModel
{
    /** @use SdkModel<hub_db_option> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $name;

    #[Api]
    public int $order;

    #[Api]
    public string $type;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?SimpleUser $createdBy;

    #[Api('createdByUserId', optional: true)]
    public ?int $createdByUserID;

    #[Api(optional: true)]
    public ?string $label;

    #[Api(optional: true)]
    public ?SimpleUser $updatedBy;

    #[Api('updatedByUserId', optional: true)]
    public ?int $updatedByUserID;

    /**
     * `new HubDBOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBOption::with(
     *   id: ..., createdAt: ..., name: ..., order: ..., type: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBOption)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withOrder(...)
     *   ->withType(...)
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
        \DateTimeInterface $createdAt,
        string $name,
        int $order,
        string $type,
        \DateTimeInterface $updatedAt,
        ?SimpleUser $createdBy = null,
        ?int $createdByUserID = null,
        ?string $label = null,
        ?SimpleUser $updatedBy = null,
        ?int $updatedByUserID = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->name = $name;
        $obj->order = $order;
        $obj->type = $type;
        $obj->updatedAt = $updatedAt;

        null !== $createdBy && $obj->createdBy = $createdBy;
        null !== $createdByUserID && $obj->createdByUserID = $createdByUserID;
        null !== $label && $obj->label = $label;
        null !== $updatedBy && $obj->updatedBy = $updatedBy;
        null !== $updatedByUserID && $obj->updatedByUserID = $updatedByUserID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
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

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withCreatedBy(SimpleUser $createdBy): self
    {
        $obj = clone $this;
        $obj->createdBy = $createdBy;

        return $obj;
    }

    public function withCreatedByUserID(int $createdByUserID): self
    {
        $obj = clone $this;
        $obj->createdByUserID = $createdByUserID;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withUpdatedBy(SimpleUser $updatedBy): self
    {
        $obj = clone $this;
        $obj->updatedBy = $updatedBy;

        return $obj;
    }

    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj->updatedByUserID = $updatedByUserID;

        return $obj;
    }
}
