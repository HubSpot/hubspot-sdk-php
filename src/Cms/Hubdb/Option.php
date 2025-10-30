<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A HubSpot property option.
 *
 * @phpstan-type OptionShape = array{
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
final class Option implements BaseModel
{
    /** @use SdkModel<OptionShape> */
    use SdkModel;

    /**
     * The unique ID of the option.
     */
    #[Api]
    public string $id;

    /**
     * The timestamp when the option was created, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * An internal name assigned to the option, distinct from the label.
     */
    #[Api]
    public string $name;

    #[Api]
    public int $order;

    /**
     * Indicates the category or data type of the option (e.g., string, number).
     */
    #[Api]
    public string $type;

    /**
     * The timestamp when the option was last updated, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?SimpleUser $createdBy;

    /**
     * The ID of the user who created the option.
     */
    #[Api('createdByUserId', optional: true)]
    public ?int $createdByUserID;

    /**
     * A user-friendly label that identifies the option.
     */
    #[Api(optional: true)]
    public ?string $label;

    #[Api(optional: true)]
    public ?SimpleUser $updatedBy;

    /**
     * The ID of the user who last updated the option.
     */
    #[Api('updatedByUserId', optional: true)]
    public ?int $updatedByUserID;

    /**
     * `new Option()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Option::with(
     *   id: ..., createdAt: ..., name: ..., order: ..., type: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Option)
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

    /**
     * The unique ID of the option.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The timestamp when the option was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * An internal name assigned to the option, distinct from the label.
     */
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

    /**
     * Indicates the category or data type of the option (e.g., string, number).
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * The timestamp when the option was last updated, in ISO 8601 format.
     */
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

    /**
     * The ID of the user who created the option.
     */
    public function withCreatedByUserID(int $createdByUserID): self
    {
        $obj = clone $this;
        $obj->createdByUserID = $createdByUserID;

        return $obj;
    }

    /**
     * A user-friendly label that identifies the option.
     */
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

    /**
     * The ID of the user who last updated the option.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj->updatedByUserID = $updatedByUserID;

        return $obj;
    }
}
