<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\Column\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
 *   createdByUserID?: int|null,
 *   foreignColumnID?: int|null,
 *   foreignIDs?: list<ForeignID>|null,
 *   foreignIDsByID?: array<string,ForeignID>|null,
 *   foreignIDsByName?: array<string,ForeignID>|null,
 *   foreignTableID?: int|null,
 *   optionCount?: int|null,
 *   options?: list<\HubspotSDK\Option>|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedBy?: SimpleUser|null,
 *   updatedByUserID?: int|null,
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
    #[Required]
    public string $id;

    #[Required]
    public bool $deleted;

    #[Required]
    public string $description;

    /**
     * Label of the column.
     */
    #[Required]
    public string $label;

    /**
     * Name of the column.
     */
    #[Required]
    public string $name;

    /**
     * Type of the column.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?SimpleUser $createdBy;

    #[Optional('createdByUserId')]
    public ?int $createdByUserID;

    /**
     * Foreign Column id.
     */
    #[Optional('foreignColumnId')]
    public ?int $foreignColumnID;

    /**
     * Foreign Ids.
     *
     * @var list<ForeignID>|null $foreignIDs
     */
    #[Optional('foreignIds', list: ForeignID::class)]
    public ?array $foreignIDs;

    /**
     * Foreign ids.
     *
     * @var array<string,ForeignID>|null $foreignIDsByID
     */
    #[Optional('foreignIdsById', map: ForeignID::class)]
    public ?array $foreignIDsByID;

    /**
     * Foreign ids by name.
     *
     * @var array<string,ForeignID>|null $foreignIDsByName
     */
    #[Optional('foreignIdsByName', map: ForeignID::class)]
    public ?array $foreignIDsByName;

    /**
     * Foreign table id referenced.
     */
    #[Optional('foreignTableId')]
    public ?int $foreignTableID;

    /**
     * Number of options available.
     */
    #[Optional]
    public ?int $optionCount;

    /**
     * Options to choose for select and multi-select columns.
     *
     * @var list<Option>|null $options
     */
    #[Optional(list: Option::class)]
    public ?array $options;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional]
    public ?SimpleUser $updatedBy;

    #[Optional('updatedByUserId')]
    public ?int $updatedByUserID;

    /**
     * Column width for HubDB UI.
     */
    #[Optional]
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
     * @param SimpleUser|array{
     *   id: string, email: string, firstName: string, lastName: string
     * } $createdBy
     * @param list<ForeignID|array{id: string, name: string, type: string}> $foreignIDs
     * @param array<string,ForeignID|array{
     *   id: string, name: string, type: string
     * }> $foreignIDsByID
     * @param array<string,ForeignID|array{
     *   id: string, name: string, type: string
     * }> $foreignIDsByName
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     * @param SimpleUser|array{
     *   id: string, email: string, firstName: string, lastName: string
     * } $updatedBy
     */
    public static function with(
        string $id,
        bool $deleted,
        string $description,
        string $label,
        string $name,
        Type|string $type,
        ?\DateTimeInterface $createdAt = null,
        SimpleUser|array|null $createdBy = null,
        ?int $createdByUserID = null,
        ?int $foreignColumnID = null,
        ?array $foreignIDs = null,
        ?array $foreignIDsByID = null,
        ?array $foreignIDsByName = null,
        ?int $foreignTableID = null,
        ?int $optionCount = null,
        ?array $options = null,
        ?\DateTimeInterface $updatedAt = null,
        SimpleUser|array|null $updatedBy = null,
        ?int $updatedByUserID = null,
        ?int $width = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['deleted'] = $deleted;
        $obj['description'] = $description;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['type'] = $type;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $createdBy && $obj['createdBy'] = $createdBy;
        null !== $createdByUserID && $obj['createdByUserID'] = $createdByUserID;
        null !== $foreignColumnID && $obj['foreignColumnID'] = $foreignColumnID;
        null !== $foreignIDs && $obj['foreignIDs'] = $foreignIDs;
        null !== $foreignIDsByID && $obj['foreignIDsByID'] = $foreignIDsByID;
        null !== $foreignIDsByName && $obj['foreignIDsByName'] = $foreignIDsByName;
        null !== $foreignTableID && $obj['foreignTableID'] = $foreignTableID;
        null !== $optionCount && $obj['optionCount'] = $optionCount;
        null !== $options && $obj['options'] = $options;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $updatedBy && $obj['updatedBy'] = $updatedBy;
        null !== $updatedByUserID && $obj['updatedByUserID'] = $updatedByUserID;
        null !== $width && $obj['width'] = $width;

        return $obj;
    }

    /**
     * Column Id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj['deleted'] = $deleted;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Label of the column.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * Name of the column.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
        $obj['createdAt'] = $createdAt;

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

    public function withCreatedByUserID(int $createdByUserID): self
    {
        $obj = clone $this;
        $obj['createdByUserID'] = $createdByUserID;

        return $obj;
    }

    /**
     * Foreign Column id.
     */
    public function withForeignColumnID(int $foreignColumnID): self
    {
        $obj = clone $this;
        $obj['foreignColumnID'] = $foreignColumnID;

        return $obj;
    }

    /**
     * Foreign Ids.
     *
     * @param list<ForeignID|array{id: string, name: string, type: string}> $foreignIDs
     */
    public function withForeignIDs(array $foreignIDs): self
    {
        $obj = clone $this;
        $obj['foreignIDs'] = $foreignIDs;

        return $obj;
    }

    /**
     * Foreign ids.
     *
     * @param array<string,ForeignID|array{
     *   id: string, name: string, type: string
     * }> $foreignIDsByID
     */
    public function withForeignIDsByID(array $foreignIDsByID): self
    {
        $obj = clone $this;
        $obj['foreignIDsByID'] = $foreignIDsByID;

        return $obj;
    }

    /**
     * Foreign ids by name.
     *
     * @param array<string,ForeignID|array{
     *   id: string, name: string, type: string
     * }> $foreignIDsByName
     */
    public function withForeignIDsByName(array $foreignIDsByName): self
    {
        $obj = clone $this;
        $obj['foreignIDsByName'] = $foreignIDsByName;

        return $obj;
    }

    /**
     * Foreign table id referenced.
     */
    public function withForeignTableID(int $foreignTableID): self
    {
        $obj = clone $this;
        $obj['foreignTableID'] = $foreignTableID;

        return $obj;
    }

    /**
     * Number of options available.
     */
    public function withOptionCount(int $optionCount): self
    {
        $obj = clone $this;
        $obj['optionCount'] = $optionCount;

        return $obj;
    }

    /**
     * Options to choose for select and multi-select columns.
     *
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

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

    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj['updatedByUserID'] = $updatedByUserID;

        return $obj;
    }

    /**
     * Column width for HubDB UI.
     */
    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj['width'] = $width;

        return $obj;
    }
}
