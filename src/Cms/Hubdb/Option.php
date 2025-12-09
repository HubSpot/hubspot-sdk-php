<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A HubSpot property option.
 *
 * @phpstan-type OptionShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   label: string,
 *   name: string,
 *   order: int,
 *   type: string,
 *   updatedAt: \DateTimeInterface,
 *   createdBy?: SimpleUser|null,
 *   createdByUserID?: int|null,
 *   updatedBy?: SimpleUser|null,
 *   updatedByUserID?: int|null,
 * }
 */
final class Option implements BaseModel
{
    /** @use SdkModel<OptionShape> */
    use SdkModel;

    /**
     * The unique ID of the option.
     */
    #[Required]
    public string $id;

    /**
     * The timestamp when the option was created, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * A user-friendly label that identifies the option.
     */
    #[Required]
    public string $label;

    /**
     * An internal name assigned to the option, distinct from the label.
     */
    #[Required]
    public string $name;

    #[Required]
    public int $order;

    /**
     * Indicates the category or data type of the option (e.g., string, number).
     */
    #[Required]
    public string $type;

    /**
     * The timestamp when the option was last updated, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?SimpleUser $createdBy;

    /**
     * The ID of the user who created the option.
     */
    #[Optional('createdByUserId')]
    public ?int $createdByUserID;

    #[Optional]
    public ?SimpleUser $updatedBy;

    /**
     * The ID of the user who last updated the option.
     */
    #[Optional('updatedByUserId')]
    public ?int $updatedByUserID;

    /**
     * `new Option()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Option::with(
     *   id: ...,
     *   createdAt: ...,
     *   label: ...,
     *   name: ...,
     *   order: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Option)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withLabel(...)
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
     *
     * @param SimpleUser|array{
     *   id: string, email: string, firstName: string, lastName: string
     * } $createdBy
     * @param SimpleUser|array{
     *   id: string, email: string, firstName: string, lastName: string
     * } $updatedBy
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $label,
        string $name,
        int $order,
        string $type,
        \DateTimeInterface $updatedAt,
        SimpleUser|array|null $createdBy = null,
        ?int $createdByUserID = null,
        SimpleUser|array|null $updatedBy = null,
        ?int $updatedByUserID = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['order'] = $order;
        $obj['type'] = $type;
        $obj['updatedAt'] = $updatedAt;

        null !== $createdBy && $obj['createdBy'] = $createdBy;
        null !== $createdByUserID && $obj['createdByUserID'] = $createdByUserID;
        null !== $updatedBy && $obj['updatedBy'] = $updatedBy;
        null !== $updatedByUserID && $obj['updatedByUserID'] = $updatedByUserID;

        return $obj;
    }

    /**
     * The unique ID of the option.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The timestamp when the option was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * A user-friendly label that identifies the option.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * An internal name assigned to the option, distinct from the label.
     */
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

    /**
     * Indicates the category or data type of the option (e.g., string, number).
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The timestamp when the option was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * @param SimpleUser|array{
     *   id: string, email: string, firstName: string, lastName: string
     * } $createdBy
     */
    public function withCreatedBy(SimpleUser|array $createdBy): self
    {
        $obj = clone $this;
        $obj['createdBy'] = $createdBy;

        return $obj;
    }

    /**
     * The ID of the user who created the option.
     */
    public function withCreatedByUserID(int $createdByUserID): self
    {
        $obj = clone $this;
        $obj['createdByUserID'] = $createdByUserID;

        return $obj;
    }

    /**
     * @param SimpleUser|array{
     *   id: string, email: string, firstName: string, lastName: string
     * } $updatedBy
     */
    public function withUpdatedBy(SimpleUser|array $updatedBy): self
    {
        $obj = clone $this;
        $obj['updatedBy'] = $updatedBy;

        return $obj;
    }

    /**
     * The ID of the user who last updated the option.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj['updatedByUserID'] = $updatedByUserID;

        return $obj;
    }
}
