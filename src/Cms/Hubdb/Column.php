<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\Column\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Option;

/**
 * @phpstan-type column_alias = array{
 *   label: string,
 *   name: string,
 *   type: value-of<Type>,
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   createdBy?: SimpleUser,
 *   createdByUserID?: int,
 *   deleted?: bool,
 *   description?: string,
 *   foreignColumnID?: int,
 *   foreignIDs?: list<ForeignID>,
 *   foreignIDsByID?: array<string, ForeignID>,
 *   foreignIDsByName?: array<string, ForeignID>,
 *   foreignTableID?: int,
 *   optionCount?: int,
 *   options?: list<Option>,
 *   updatedAt?: \DateTimeInterface,
 *   updatedBy?: SimpleUser,
 *   updatedByUserID?: int,
 *   width?: int,
 * }
 */
final class Column implements BaseModel
{
    /** @use SdkModel<column_alias> */
    use SdkModel;

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

    /**
     * Column Id.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?SimpleUser $createdBy;

    #[Api('createdByUserId', optional: true)]
    public ?int $createdByUserID;

    #[Api(optional: true)]
    public ?bool $deleted;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * Foreign Column id.
     */
    #[Api('foreignColumnId', optional: true)]
    public ?int $foreignColumnID;

    /**
     * Foreign Ids.
     *
     * @var list<ForeignID>|null $foreignIDs
     */
    #[Api('foreignIds', list: ForeignID::class, optional: true)]
    public ?array $foreignIDs;

    /**
     * Foreign ids.
     *
     * @var array<string, ForeignID>|null $foreignIDsByID
     */
    #[Api('foreignIdsById', map: ForeignID::class, optional: true)]
    public ?array $foreignIDsByID;

    /**
     * Foreign ids by name.
     *
     * @var array<string, ForeignID>|null $foreignIDsByName
     */
    #[Api('foreignIdsByName', map: ForeignID::class, optional: true)]
    public ?array $foreignIDsByName;

    /**
     * Foreign table id referenced.
     */
    #[Api('foreignTableId', optional: true)]
    public ?int $foreignTableID;

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

    #[Api('updatedByUserId', optional: true)]
    public ?int $updatedByUserID;

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
     * Column::with(label: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Column)->withLabel(...)->withName(...)->withType(...)
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
     * @param list<ForeignID> $foreignIDs
     * @param array<string, ForeignID> $foreignIDsByID
     * @param array<string, ForeignID> $foreignIDsByName
     * @param list<Option> $options
     */
    public static function with(
        string $label,
        string $name,
        Type|string $type,
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?SimpleUser $createdBy = null,
        ?int $createdByUserID = null,
        ?bool $deleted = null,
        ?string $description = null,
        ?int $foreignColumnID = null,
        ?array $foreignIDs = null,
        ?array $foreignIDsByID = null,
        ?array $foreignIDsByName = null,
        ?int $foreignTableID = null,
        ?int $optionCount = null,
        ?array $options = null,
        ?\DateTimeInterface $updatedAt = null,
        ?SimpleUser $updatedBy = null,
        ?int $updatedByUserID = null,
        ?int $width = null,
    ): self {
        $obj = new self;

        $obj->label = $label;
        $obj->name = $name;
        $obj['type'] = $type;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdBy && $obj->createdBy = $createdBy;
        null !== $createdByUserID && $obj->createdByUserID = $createdByUserID;
        null !== $deleted && $obj->deleted = $deleted;
        null !== $description && $obj->description = $description;
        null !== $foreignColumnID && $obj->foreignColumnID = $foreignColumnID;
        null !== $foreignIDs && $obj->foreignIDs = $foreignIDs;
        null !== $foreignIDsByID && $obj->foreignIDsByID = $foreignIDsByID;
        null !== $foreignIDsByName && $obj->foreignIDsByName = $foreignIDsByName;
        null !== $foreignTableID && $obj->foreignTableID = $foreignTableID;
        null !== $optionCount && $obj->optionCount = $optionCount;
        null !== $options && $obj->options = $options;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedBy && $obj->updatedBy = $updatedBy;
        null !== $updatedByUserID && $obj->updatedByUserID = $updatedByUserID;
        null !== $width && $obj->width = $width;

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

    /**
     * Column Id.
     */
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
     * Foreign Column id.
     */
    public function withForeignColumnID(int $foreignColumnID): self
    {
        $obj = clone $this;
        $obj->foreignColumnID = $foreignColumnID;

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
        $obj->foreignIDs = $foreignIDs;

        return $obj;
    }

    /**
     * Foreign ids.
     *
     * @param array<string, ForeignID> $foreignIDsByID
     */
    public function withForeignIDsByID(array $foreignIDsByID): self
    {
        $obj = clone $this;
        $obj->foreignIDsByID = $foreignIDsByID;

        return $obj;
    }

    /**
     * Foreign ids by name.
     *
     * @param array<string, ForeignID> $foreignIDsByName
     */
    public function withForeignIDsByName(array $foreignIDsByName): self
    {
        $obj = clone $this;
        $obj->foreignIDsByName = $foreignIDsByName;

        return $obj;
    }

    /**
     * Foreign table id referenced.
     */
    public function withForeignTableID(int $foreignTableID): self
    {
        $obj = clone $this;
        $obj->foreignTableID = $foreignTableID;

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
        $obj->updatedByUserID = $updatedByUserID;

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
