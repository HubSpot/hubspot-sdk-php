<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ColumnShape from \HubspotSDK\Cms\Hubdb\Column
 * @phpstan-import-type SimpleUserShape from \HubspotSDK\Cms\Hubdb\SimpleUser
 *
 * @phpstan-type HubDBTableV3Shape = array{
 *   id: string,
 *   allowChildTables: bool,
 *   allowPublicAPIAccess: bool,
 *   columnCount: int,
 *   columns: list<Column|ColumnShape>,
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
 *   createdBy?: null|SimpleUser|SimpleUserShape,
 *   isOrderedManually?: bool|null,
 *   updatedBy?: null|SimpleUser|SimpleUserShape,
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
     * @param list<Column|ColumnShape> $columns
     * @param array<string,int> $dynamicMetaTags
     * @param SimpleUser|SimpleUserShape|null $createdBy
     * @param SimpleUser|SimpleUserShape|null $updatedBy
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
        $self = new self;

        $self['id'] = $id;
        $self['allowChildTables'] = $allowChildTables;
        $self['allowPublicAPIAccess'] = $allowPublicAPIAccess;
        $self['columnCount'] = $columnCount;
        $self['columns'] = $columns;
        $self['createdAt'] = $createdAt;
        $self['deleted'] = $deleted;
        $self['deletedAt'] = $deletedAt;
        $self['dynamicMetaTags'] = $dynamicMetaTags;
        $self['enableChildTablePages'] = $enableChildTablePages;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['published'] = $published;
        $self['publishedAt'] = $publishedAt;
        $self['rowCount'] = $rowCount;
        $self['updatedAt'] = $updatedAt;
        $self['useForPages'] = $useForPages;

        null !== $createdBy && $self['createdBy'] = $createdBy;
        null !== $isOrderedManually && $self['isOrderedManually'] = $isOrderedManually;
        null !== $updatedBy && $self['updatedBy'] = $updatedBy;

        return $self;
    }

    /**
     * Id of the table.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Specifies whether child tables can be created.
     */
    public function withAllowChildTables(bool $allowChildTables): self
    {
        $self = clone $this;
        $self['allowChildTables'] = $allowChildTables;

        return $self;
    }

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    public function withAllowPublicAPIAccess(bool $allowPublicAPIAccess): self
    {
        $self = clone $this;
        $self['allowPublicAPIAccess'] = $allowPublicAPIAccess;

        return $self;
    }

    /**
     * Number of columns including deleted.
     */
    public function withColumnCount(int $columnCount): self
    {
        $self = clone $this;
        $self['columnCount'] = $columnCount;

        return $self;
    }

    /**
     * List of columns in the table.
     *
     * @param list<Column|ColumnShape> $columns
     */
    public function withColumns(array $columns): self
    {
        $self = clone $this;
        $self['columns'] = $columns;

        return $self;
    }

    /**
     * Timestamp at which the table is created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDeleted(bool $deleted): self
    {
        $self = clone $this;
        $self['deleted'] = $deleted;

        return $self;
    }

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @param array<string,int> $dynamicMetaTags
     */
    public function withDynamicMetaTags(array $dynamicMetaTags): self
    {
        $self = clone $this;
        $self['dynamicMetaTags'] = $dynamicMetaTags;

        return $self;
    }

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    public function withEnableChildTablePages(bool $enableChildTablePages): self
    {
        $self = clone $this;
        $self['enableChildTablePages'] = $enableChildTablePages;

        return $self;
    }

    /**
     * Label of the table.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Name of the table.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * Timestamp at which the table is published recently.
     */
    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $self = clone $this;
        $self['publishedAt'] = $publishedAt;

        return $self;
    }

    /**
     * Number of rows in the table.
     */
    public function withRowCount(int $rowCount): self
    {
        $self = clone $this;
        $self['rowCount'] = $rowCount;

        return $self;
    }

    /**
     * Timestamp at which the table is updated recently.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    public function withUseForPages(bool $useForPages): self
    {
        $self = clone $this;
        $self['useForPages'] = $useForPages;

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

    public function withIsOrderedManually(bool $isOrderedManually): self
    {
        $self = clone $this;
        $self['isOrderedManually'] = $isOrderedManually;

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
}
