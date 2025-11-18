<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\Column\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;

/**
 * @phpstan-type ColumnShape = array{
 *   id: string,
 *   deleted: bool,
 *   description: string,
 *   label: string,
 *   name: string,
 *   type: value-of<Type>,
 *   createdAt?: \DateTimeInterface|null,
 *   createdBy?: SimpleUser|null,
 *   createdByUserId?: int|null,
 *   foreignColumnId?: int|null,
 *   foreignIds?: list<ForeignID>|null,
 *   foreignIdsById?: array<string,ForeignID>|null,
 *   foreignIdsByName?: array<string,ForeignID>|null,
 *   foreignTableId?: int|null,
 *   optionCount?: int|null,
 *   options?: list<Option>|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedBy?: SimpleUser|null,
 *   updatedByUserId?: int|null,
 *   width?: int|null,
 * }
 */
final class Column implements BaseModel
{
    /** @use SdkModel<ColumnShape> */
    use SdkModel;

    /**
     * Column Id.
     */
    #[Api]
    public string $id;

    #[Api]
    public bool $deleted;

    #[Api]
    public string $description;

    /**
     * Label of the column.
     */
    #[Api]
    public string $label;

    /**
     * Name of the column.
     */
    #[Api]
    public string $name;

    /**
     * Type of the column.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?SimpleUser $createdBy;

    #[Api(optional: true)]
    public ?int $createdByUserId;

    /**
     * Foreign Column id.
     */
    #[Api(optional: true)]
    public ?int $foreignColumnId;

    /**
     * Foreign Ids.
     *
     * @var list<ForeignID>|null $foreignIds
     */
    #[Api(list: ForeignID::class, optional: true)]
    public ?array $foreignIds;

    /**
     * Foreign ids.
     *
     * @var array<string,ForeignID>|null $foreignIdsById
     */
    #[Api(map: ForeignID::class, optional: true)]
    public ?array $foreignIdsById;

    /**
     * Foreign ids by name.
     *
     * @var array<string,ForeignID>|null $foreignIdsByName
     */
    #[Api(map: ForeignID::class, optional: true)]
    public ?array $foreignIdsByName;

    /**
     * Foreign table id referenced.
     */
    #[Api(optional: true)]
    public ?int $foreignTableId;

    /**
     * Number of options available.
     */
    #[Api(optional: true)]
    public ?int $optionCount;

    /**
     * Options to choose for select and multi-select columns.
     *
     * @var list<Option>|null $options
     */
    #[Api(list: Option::class, optional: true)]
    public ?array $options;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?SimpleUser $updatedBy;

    #[Api(optional: true)]
    public ?int $updatedByUserId;

    /**
     * Column width for HubDB UI.
     */
    #[Api(optional: true)]
    public ?int $width;

    /**
     * `new Column()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Column::with(
     *   id: ..., deleted: ..., description: ..., label: ..., name: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Column)
     *   ->withID(...)
     *   ->withDeleted(...)
     *   ->withDescription(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param list<ForeignID> $foreignIds
     * @param array<string,ForeignID> $foreignIdsById
     * @param array<string,ForeignID> $foreignIdsByName
     * @param list<Option> $options
     */
    public static function with(
        string $id,
        bool $deleted,
        string $description,
        string $label,
        string $name,
        Type|string $type,
        ?\DateTimeInterface $createdAt = null,
        ?SimpleUser $createdBy = null,
        ?int $createdByUserId = null,
        ?int $foreignColumnId = null,
        ?array $foreignIds = null,
        ?array $foreignIdsById = null,
        ?array $foreignIdsByName = null,
        ?int $foreignTableId = null,
        ?int $optionCount = null,
        ?array $options = null,
        ?\DateTimeInterface $updatedAt = null,
        ?SimpleUser $updatedBy = null,
        ?int $updatedByUserId = null,
        ?int $width = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->deleted = $deleted;
        $obj->description = $description;
        $obj->label = $label;
        $obj->name = $name;
        $obj['type'] = $type;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdBy && $obj->createdBy = $createdBy;
        null !== $createdByUserId && $obj->createdByUserId = $createdByUserId;
        null !== $foreignColumnId && $obj->foreignColumnId = $foreignColumnId;
        null !== $foreignIds && $obj->foreignIds = $foreignIds;
        null !== $foreignIdsById && $obj->foreignIdsById = $foreignIdsById;
        null !== $foreignIdsByName && $obj->foreignIdsByName = $foreignIdsByName;
        null !== $foreignTableId && $obj->foreignTableId = $foreignTableId;
        null !== $optionCount && $obj->optionCount = $optionCount;
        null !== $options && $obj->options = $options;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedBy && $obj->updatedBy = $updatedBy;
        null !== $updatedByUserId && $obj->updatedByUserId = $updatedByUserId;
        null !== $width && $obj->width = $width;

        return $obj;
    }

    /**
     * Column Id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj->deleted = $deleted;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Label of the column.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * Name of the column.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Type of the column.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj->createdByUserId = $createdByUserID;

        return $obj;
    }

    /**
     * Foreign Column id.
     */
    public function withForeignColumnID(int $foreignColumnID): self
    {
        $obj = clone $this;
        $obj->foreignColumnId = $foreignColumnID;

        return $obj;
    }

    /**
     * Foreign Ids.
     *
     * @param list<ForeignID> $foreignIDs
     */
    public function withForeignIDs(array $foreignIDs): self
    {
        $obj = clone $this;
        $obj->foreignIds = $foreignIDs;

        return $obj;
    }

    /**
     * Foreign ids.
     *
     * @param array<string,ForeignID> $foreignIDsByID
     */
    public function withForeignIDsByID(array $foreignIDsByID): self
    {
        $obj = clone $this;
        $obj->foreignIdsById = $foreignIDsByID;

        return $obj;
    }

    /**
     * Foreign ids by name.
     *
     * @param array<string,ForeignID> $foreignIDsByName
     */
    public function withForeignIDsByName(array $foreignIDsByName): self
    {
        $obj = clone $this;
        $obj->foreignIdsByName = $foreignIDsByName;

        return $obj;
    }

    /**
     * Foreign table id referenced.
     */
    public function withForeignTableID(int $foreignTableID): self
    {
        $obj = clone $this;
        $obj->foreignTableId = $foreignTableID;

        return $obj;
    }

    /**
     * Number of options available.
     */
    public function withOptionCount(int $optionCount): self
    {
        $obj = clone $this;
        $obj->optionCount = $optionCount;

        return $obj;
    }

    /**
     * Options to choose for select and multi-select columns.
     *
     * @param list<Option> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

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
        $obj->updatedByUserId = $updatedByUserID;

        return $obj;
    }

    /**
     * Column width for HubDB UI.
     */
    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }
}
