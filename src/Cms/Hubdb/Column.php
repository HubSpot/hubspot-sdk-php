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
 * @phpstan-import-type SimpleUserShape from \HubspotSDK\Cms\Hubdb\SimpleUser
 * @phpstan-import-type ForeignIDShape from \HubspotSDK\Cms\Hubdb\ForeignID
 * @phpstan-import-type OptionShape from \HubspotSDK\Option
 *
 * @phpstan-type ColumnShape = array{
 *   id: string,
 *   deleted: bool,
 *   description: string,
 *   label: string,
 *   name: string,
 *   type: Type|value-of<Type>,
 *   createdAt?: \DateTimeInterface|null,
 *   createdBy?: null|SimpleUser|SimpleUserShape,
 *   createdByUserID?: int|null,
 *   foreignColumnID?: int|null,
 *   foreignIDs?: list<ForeignIDShape>|null,
 *   foreignIDsByID?: array<string,ForeignIDShape>|null,
 *   foreignIDsByName?: array<string,ForeignIDShape>|null,
 *   foreignTableID?: int|null,
 *   optionCount?: int|null,
 *   options?: list<OptionShape>|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedBy?: null|SimpleUser|SimpleUserShape,
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
     * @param SimpleUserShape $createdBy
     * @param list<ForeignIDShape> $foreignIDs
     * @param array<string,ForeignIDShape> $foreignIDsByID
     * @param array<string,ForeignIDShape> $foreignIDsByName
     * @param list<OptionShape> $options
     * @param SimpleUserShape $updatedBy
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
        $self = new self;

        $self['id'] = $id;
        $self['deleted'] = $deleted;
        $self['description'] = $description;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['type'] = $type;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdBy && $self['createdBy'] = $createdBy;
        null !== $createdByUserID && $self['createdByUserID'] = $createdByUserID;
        null !== $foreignColumnID && $self['foreignColumnID'] = $foreignColumnID;
        null !== $foreignIDs && $self['foreignIDs'] = $foreignIDs;
        null !== $foreignIDsByID && $self['foreignIDsByID'] = $foreignIDsByID;
        null !== $foreignIDsByName && $self['foreignIDsByName'] = $foreignIDsByName;
        null !== $foreignTableID && $self['foreignTableID'] = $foreignTableID;
        null !== $optionCount && $self['optionCount'] = $optionCount;
        null !== $options && $self['options'] = $options;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedBy && $self['updatedBy'] = $updatedBy;
        null !== $updatedByUserID && $self['updatedByUserID'] = $updatedByUserID;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    /**
     * Column Id.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDeleted(bool $deleted): self
    {
        $self = clone $this;
        $self['deleted'] = $deleted;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Label of the column.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Name of the column.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Type of the column.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param SimpleUserShape $createdBy
     */
    public function withCreatedBy(SimpleUser|array $createdBy): self
    {
        $self = clone $this;
        $self['createdBy'] = $createdBy;

        return $self;
    }

    public function withCreatedByUserID(int $createdByUserID): self
    {
        $self = clone $this;
        $self['createdByUserID'] = $createdByUserID;

        return $self;
    }

    /**
     * Foreign Column id.
     */
    public function withForeignColumnID(int $foreignColumnID): self
    {
        $self = clone $this;
        $self['foreignColumnID'] = $foreignColumnID;

        return $self;
    }

    /**
     * Foreign Ids.
     *
     * @param list<ForeignIDShape> $foreignIDs
     */
    public function withForeignIDs(array $foreignIDs): self
    {
        $self = clone $this;
        $self['foreignIDs'] = $foreignIDs;

        return $self;
    }

    /**
     * Foreign ids.
     *
     * @param array<string,ForeignIDShape> $foreignIDsByID
     */
    public function withForeignIDsByID(array $foreignIDsByID): self
    {
        $self = clone $this;
        $self['foreignIDsByID'] = $foreignIDsByID;

        return $self;
    }

    /**
     * Foreign ids by name.
     *
     * @param array<string,ForeignIDShape> $foreignIDsByName
     */
    public function withForeignIDsByName(array $foreignIDsByName): self
    {
        $self = clone $this;
        $self['foreignIDsByName'] = $foreignIDsByName;

        return $self;
    }

    /**
     * Foreign table id referenced.
     */
    public function withForeignTableID(int $foreignTableID): self
    {
        $self = clone $this;
        $self['foreignTableID'] = $foreignTableID;

        return $self;
    }

    /**
     * Number of options available.
     */
    public function withOptionCount(int $optionCount): self
    {
        $self = clone $this;
        $self['optionCount'] = $optionCount;

        return $self;
    }

    /**
     * Options to choose for select and multi-select columns.
     *
     * @param list<OptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param SimpleUserShape $updatedBy
     */
    public function withUpdatedBy(SimpleUser|array $updatedBy): self
    {
        $self = clone $this;
        $self['updatedBy'] = $updatedBy;

        return $self;
    }

    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $self = clone $this;
        $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }

    /**
     * Column width for HubDB UI.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
