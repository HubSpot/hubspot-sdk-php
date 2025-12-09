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
 * @phpstan-type HubDBTableV3Shape = array{
 *   id: string,
 *   allowChildTables: bool,
 *   allowPublicAPIAccess: bool,
 *   columnCount: int,
 *   columns: list<Column>,
 *   createdAt: \DateTimeInterface,
 *   deleted: bool,
 *   deletedAt: \DateTimeInterface,
 *   dynamicMetaTags: array<string,int>,
 *   enableChildTablePages: bool,
 *   label: string,
 *   name: string,
 *   published: bool,
 *   publishedAt: \DateTimeInterface,
 *   rowCount: int,
 *   updatedAt: \DateTimeInterface,
 *   useForPages: bool,
 *   createdBy?: SimpleUser|null,
 *   isOrderedManually?: bool|null,
 *   updatedBy?: SimpleUser|null,
 * }
 */
final class HubDBTableV3 implements BaseModel
{
    /** @use SdkModel<HubDBTableV3Shape> */
    use SdkModel;

    /**
     * Id of the table.
     */
    #[Required]
    public string $id;

    /**
     * Specifies whether child tables can be created.
     */
    #[Required]
    public bool $allowChildTables;

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    #[Required('allowPublicApiAccess')]
    public bool $allowPublicAPIAccess;

    /**
     * Number of columns including deleted.
     */
    #[Required]
    public int $columnCount;

    /**
     * List of columns in the table.
     *
     * @var list<Column> $columns
     */
    #[Required(list: Column::class)]
    public array $columns;

    /**
     * Timestamp at which the table is created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public bool $deleted;

    #[Required]
    public \DateTimeInterface $deletedAt;

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @var array<string,int> $dynamicMetaTags
     */
    #[Required(map: 'int')]
    public array $dynamicMetaTags;

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    #[Required]
    public bool $enableChildTablePages;

    /**
     * Label of the table.
     */
    #[Required]
    public string $label;

    /**
     * Name of the table.
     */
    #[Required]
    public string $name;

    #[Required]
    public bool $published;

    /**
     * Timestamp at which the table is published recently.
     */
    #[Required]
    public \DateTimeInterface $publishedAt;

    /**
     * Number of rows in the table.
     */
    #[Required]
    public int $rowCount;

    /**
     * Timestamp at which the table is updated recently.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    #[Required]
    public bool $useForPages;

    #[Optional]
    public ?SimpleUser $createdBy;

    #[Optional]
    public ?bool $isOrderedManually;

    #[Optional]
    public ?SimpleUser $updatedBy;

    /**
     * `new HubDBTableV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableV3::with(
     *   id: ...,
     *   allowChildTables: ...,
     *   allowPublicAPIAccess: ...,
     *   columnCount: ...,
     *   columns: ...,
     *   createdAt: ...,
     *   deleted: ...,
     *   deletedAt: ...,
     *   dynamicMetaTags: ...,
     *   enableChildTablePages: ...,
     *   label: ...,
     *   name: ...,
     *   published: ...,
     *   publishedAt: ...,
     *   rowCount: ...,
     *   updatedAt: ...,
     *   useForPages: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableV3)
     *   ->withID(...)
     *   ->withAllowChildTables(...)
     *   ->withAllowPublicAPIAccess(...)
     *   ->withColumnCount(...)
     *   ->withColumns(...)
     *   ->withCreatedAt(...)
     *   ->withDeleted(...)
     *   ->withDeletedAt(...)
     *   ->withDynamicMetaTags(...)
     *   ->withEnableChildTablePages(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withPublished(...)
     *   ->withPublishedAt(...)
     *   ->withRowCount(...)
     *   ->withUpdatedAt(...)
     *   ->withUseForPages(...)
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
     * @param list<Column|array{
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
     *   options?: list<Option>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedBy?: SimpleUser|null,
     *   updatedByUserID?: int|null,
     *   width?: int|null,
     * }> $columns
     * @param array<string,int> $dynamicMetaTags
     * @param SimpleUser|array{
     *   id: string, email: string, firstName: string, lastName: string
     * } $createdBy
     * @param SimpleUser|array{
     *   id: string, email: string, firstName: string, lastName: string
     * } $updatedBy
     */
    public static function with(
        string $id,
        bool $allowChildTables,
        bool $allowPublicAPIAccess,
        int $columnCount,
        array $columns,
        \DateTimeInterface $createdAt,
        bool $deleted,
        \DateTimeInterface $deletedAt,
        array $dynamicMetaTags,
        bool $enableChildTablePages,
        string $label,
        string $name,
        bool $published,
        \DateTimeInterface $publishedAt,
        int $rowCount,
        \DateTimeInterface $updatedAt,
        bool $useForPages,
        SimpleUser|array|null $createdBy = null,
        ?bool $isOrderedManually = null,
        SimpleUser|array|null $updatedBy = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['allowChildTables'] = $allowChildTables;
        $obj['allowPublicAPIAccess'] = $allowPublicAPIAccess;
        $obj['columnCount'] = $columnCount;
        $obj['columns'] = $columns;
        $obj['createdAt'] = $createdAt;
        $obj['deleted'] = $deleted;
        $obj['deletedAt'] = $deletedAt;
        $obj['dynamicMetaTags'] = $dynamicMetaTags;
        $obj['enableChildTablePages'] = $enableChildTablePages;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['published'] = $published;
        $obj['publishedAt'] = $publishedAt;
        $obj['rowCount'] = $rowCount;
        $obj['updatedAt'] = $updatedAt;
        $obj['useForPages'] = $useForPages;

        null !== $createdBy && $obj['createdBy'] = $createdBy;
        null !== $isOrderedManually && $obj['isOrderedManually'] = $isOrderedManually;
        null !== $updatedBy && $obj['updatedBy'] = $updatedBy;

        return $obj;
    }

    /**
     * Id of the table.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Specifies whether child tables can be created.
     */
    public function withAllowChildTables(bool $allowChildTables): self
    {
        $obj = clone $this;
        $obj['allowChildTables'] = $allowChildTables;

        return $obj;
    }

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    public function withAllowPublicAPIAccess(bool $allowPublicAPIAccess): self
    {
        $obj = clone $this;
        $obj['allowPublicAPIAccess'] = $allowPublicAPIAccess;

        return $obj;
    }

    /**
     * Number of columns including deleted.
     */
    public function withColumnCount(int $columnCount): self
    {
        $obj = clone $this;
        $obj['columnCount'] = $columnCount;

        return $obj;
    }

    /**
     * List of columns in the table.
     *
     * @param list<Column|array{
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
     *   options?: list<Option>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedBy?: SimpleUser|null,
     *   updatedByUserID?: int|null,
     *   width?: int|null,
     * }> $columns
     */
    public function withColumns(array $columns): self
    {
        $obj = clone $this;
        $obj['columns'] = $columns;

        return $obj;
    }

    /**
     * Timestamp at which the table is created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj['deleted'] = $deleted;

        return $obj;
    }

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj['deletedAt'] = $deletedAt;

        return $obj;
    }

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @param array<string,int> $dynamicMetaTags
     */
    public function withDynamicMetaTags(array $dynamicMetaTags): self
    {
        $obj = clone $this;
        $obj['dynamicMetaTags'] = $dynamicMetaTags;

        return $obj;
    }

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    public function withEnableChildTablePages(bool $enableChildTablePages): self
    {
        $obj = clone $this;
        $obj['enableChildTablePages'] = $enableChildTablePages;

        return $obj;
    }

    /**
     * Label of the table.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * Name of the table.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPublished(bool $published): self
    {
        $obj = clone $this;
        $obj['published'] = $published;

        return $obj;
    }

    /**
     * Timestamp at which the table is published recently.
     */
    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $obj = clone $this;
        $obj['publishedAt'] = $publishedAt;

        return $obj;
    }

    /**
     * Number of rows in the table.
     */
    public function withRowCount(int $rowCount): self
    {
        $obj = clone $this;
        $obj['rowCount'] = $rowCount;

        return $obj;
    }

    /**
     * Timestamp at which the table is updated recently.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    public function withUseForPages(bool $useForPages): self
    {
        $obj = clone $this;
        $obj['useForPages'] = $useForPages;

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

    public function withIsOrderedManually(bool $isOrderedManually): self
    {
        $obj = clone $this;
        $obj['isOrderedManually'] = $isOrderedManually;

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
}
