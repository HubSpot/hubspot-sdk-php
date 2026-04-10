<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * A HubSpot property option.
 *
 * @phpstan-import-type SimpleUserShape from \HubSpotSDK\Cms\Hubdb\SimpleUser
 *
 * @phpstan-type OptionShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   label: string,
 *   name: string,
 *   order: int,
 *   type: string,
 *   updatedAt: \DateTimeInterface,
 *   createdBy?: null|SimpleUser|SimpleUserShape,
 *   createdByUserID?: int|null,
 *   updatedBy?: null|SimpleUser|SimpleUserShape,
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

    /**
     * The order in which the option appears, represented as an integer.
     */
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
     * @param SimpleUser|SimpleUserShape|null $createdBy
     * @param SimpleUser|SimpleUserShape|null $updatedBy
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
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['order'] = $order;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        null !== $createdBy && $self['createdBy'] = $createdBy;
        null !== $createdByUserID && $self['createdByUserID'] = $createdByUserID;
        null !== $updatedBy && $self['updatedBy'] = $updatedBy;
        null !== $updatedByUserID && $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }

    /**
     * The unique ID of the option.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The timestamp when the option was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A user-friendly label that identifies the option.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * An internal name assigned to the option, distinct from the label.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The order in which the option appears, represented as an integer.
     */
    public function withOrder(int $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    /**
     * Indicates the category or data type of the option (e.g., string, number).
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The timestamp when the option was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param SimpleUser|SimpleUserShape $createdBy
     */
    public function withCreatedBy(SimpleUser|array $createdBy): self
    {
        $self = clone $this;
        $self['createdBy'] = $createdBy;

        return $self;
    }

    /**
     * The ID of the user who created the option.
     */
    public function withCreatedByUserID(int $createdByUserID): self
    {
        $self = clone $this;
        $self['createdByUserID'] = $createdByUserID;

        return $self;
    }

    /**
     * @param SimpleUser|SimpleUserShape $updatedBy
     */
    public function withUpdatedBy(SimpleUser|array $updatedBy): self
    {
        $self = clone $this;
        $self['updatedBy'] = $updatedBy;

        return $self;
    }

    /**
     * The ID of the user who last updated the option.
     */
    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $self = clone $this;
        $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }
}
