<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\CmsHubdbColumn\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMOption;

/**
 * @phpstan-type cms_hubdb_column = array{
 *   label: string,
 *   name: string,
 *   type: value-of<Type>,
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   createdBy?: CmsHubdbSimpleUser,
 *   createdByUserID?: int,
 *   deleted?: bool,
 *   foreignColumnID?: int,
 *   foreignIDs?: list<CmsHubdbForeignID>,
 *   foreignIDsByID?: array<string, CmsHubdbForeignID>,
 *   foreignIDsByName?: array<string, CmsHubdbForeignID>,
 *   foreignTableID?: int,
 *   optionCount?: int,
 *   options?: list<CRMOption>,
 *   updatedAt?: \DateTimeInterface,
 *   updatedBy?: CmsHubdbSimpleUser,
 *   updatedByUserID?: int,
 *   width?: int,
 * }
 */
final class CmsHubdbColumn implements BaseModel
{
    /** @use SdkModel<cms_hubdb_column> */
    use SdkModel;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?CmsHubdbSimpleUser $createdBy;

    #[Api('createdByUserId', optional: true)]
    public ?int $createdByUserID;

    #[Api(optional: true)]
    public ?bool $deleted;

    #[Api('foreignColumnId', optional: true)]
    public ?int $foreignColumnID;

    /** @var list<CmsHubdbForeignID>|null $foreignIDs */
    #[Api('foreignIds', list: CmsHubdbForeignID::class, optional: true)]
    public ?array $foreignIDs;

    /** @var array<string, CmsHubdbForeignID>|null $foreignIDsByID */
    #[Api('foreignIdsById', map: CmsHubdbForeignID::class, optional: true)]
    public ?array $foreignIDsByID;

    /** @var array<string, CmsHubdbForeignID>|null $foreignIDsByName */
    #[Api('foreignIdsByName', map: CmsHubdbForeignID::class, optional: true)]
    public ?array $foreignIDsByName;

    #[Api('foreignTableId', optional: true)]
    public ?int $foreignTableID;

    #[Api(optional: true)]
    public ?int $optionCount;

    /** @var list<CRMOption>|null $options */
    #[Api(list: CRMOption::class, optional: true)]
    public ?array $options;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?CmsHubdbSimpleUser $updatedBy;

    #[Api('updatedByUserId', optional: true)]
    public ?int $updatedByUserID;

    #[Api(optional: true)]
    public ?int $width;

    /**
     * `new CmsHubdbColumn()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbColumn::with(label: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbColumn)->withLabel(...)->withName(...)->withType(...)
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
     * @param list<CmsHubdbForeignID> $foreignIDs
     * @param array<string, CmsHubdbForeignID> $foreignIDsByID
     * @param array<string, CmsHubdbForeignID> $foreignIDsByName
     * @param list<CRMOption> $options
     */
    public static function with(
        string $label,
        string $name,
        Type|string $type,
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?CmsHubdbSimpleUser $createdBy = null,
        ?int $createdByUserID = null,
        ?bool $deleted = null,
        ?int $foreignColumnID = null,
        ?array $foreignIDs = null,
        ?array $foreignIDsByID = null,
        ?array $foreignIDsByName = null,
        ?int $foreignTableID = null,
        ?int $optionCount = null,
        ?array $options = null,
        ?\DateTimeInterface $updatedAt = null,
        ?CmsHubdbSimpleUser $updatedBy = null,
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

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

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

    public function withCreatedBy(CmsHubdbSimpleUser $createdBy): self
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

    public function withForeignColumnID(int $foreignColumnID): self
    {
        $obj = clone $this;
        $obj->foreignColumnID = $foreignColumnID;

        return $obj;
    }

    /**
     * @param list<CmsHubdbForeignID> $foreignIDs
     */
    public function withForeignIDs(array $foreignIDs): self
    {
        $obj = clone $this;
        $obj->foreignIDs = $foreignIDs;

        return $obj;
    }

    /**
     * @param array<string, CmsHubdbForeignID> $foreignIDsByID
     */
    public function withForeignIDsByID(array $foreignIDsByID): self
    {
        $obj = clone $this;
        $obj->foreignIDsByID = $foreignIDsByID;

        return $obj;
    }

    /**
     * @param array<string, CmsHubdbForeignID> $foreignIDsByName
     */
    public function withForeignIDsByName(array $foreignIDsByName): self
    {
        $obj = clone $this;
        $obj->foreignIDsByName = $foreignIDsByName;

        return $obj;
    }

    public function withForeignTableID(int $foreignTableID): self
    {
        $obj = clone $this;
        $obj->foreignTableID = $foreignTableID;

        return $obj;
    }

    public function withOptionCount(int $optionCount): self
    {
        $obj = clone $this;
        $obj->optionCount = $optionCount;

        return $obj;
    }

    /**
     * @param list<CRMOption> $options
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

    public function withUpdatedBy(CmsHubdbSimpleUser $updatedBy): self
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

    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }
}
