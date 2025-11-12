<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableV3Shape = array{
 *   deletedAt: \DateTimeInterface,
 *   label: string,
 *   name: string,
 *   id?: string|null,
 *   allowChildTables?: bool|null,
 *   allowPublicApiAccess?: bool|null,
 *   columnCount?: int|null,
 *   columns?: list<Column>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdBy?: SimpleUser|null,
 *   deleted?: bool|null,
 *   dynamicMetaTags?: array<string,int>|null,
 *   enableChildTablePages?: bool|null,
 *   isOrderedManually?: bool|null,
 *   published?: bool|null,
 *   publishedAt?: \DateTimeInterface|null,
 *   rowCount?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedBy?: SimpleUser|null,
 *   useForPages?: bool|null,
 * }
 */
final class HubDBTableV3 implements BaseModel
{
    /** @use SdkModel<HubDBTableV3Shape> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $deletedAt;

    /**
     * Label of the table.
     */
    #[Api]
    public string $label;

    /**
     * Name of the table.
     */
    #[Api]
    public string $name;

    /**
     * Id of the table.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies whether child tables can be created.
     */
    #[Api(optional: true)]
    public ?bool $allowChildTables;

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    #[Api(optional: true)]
    public ?bool $allowPublicApiAccess;

    /**
     * Number of columns including deleted.
     */
    #[Api(optional: true)]
    public ?int $columnCount;

    /**
     * List of columns in the table.
     *
     * @var list<Column>|null $columns
     */
    #[Api(list: Column::class, optional: true)]
    public ?array $columns;

    /**
     * Timestamp at which the table is created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?SimpleUser $createdBy;

    #[Api(optional: true)]
    public ?bool $deleted;

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @var array<string,int>|null $dynamicMetaTags
     */
    #[Api(map: 'int', optional: true)]
    public ?array $dynamicMetaTags;

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    #[Api(optional: true)]
    public ?bool $enableChildTablePages;

    #[Api(optional: true)]
    public ?bool $isOrderedManually;

    #[Api(optional: true)]
    public ?bool $published;

    /**
     * Timestamp at which the table is published recently.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $publishedAt;

    /**
     * Number of rows in the table.
     */
    #[Api(optional: true)]
    public ?int $rowCount;

    /**
     * Timestamp at which the table is updated recently.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?SimpleUser $updatedBy;

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    #[Api(optional: true)]
    public ?bool $useForPages;

    /**
     * `new HubDBTableV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableV3::with(deletedAt: ..., label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableV3)->withDeletedAt(...)->withLabel(...)->withName(...)
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
     * @param list<Column> $columns
     * @param array<string,int> $dynamicMetaTags
     */
    public static function with(
        \DateTimeInterface $deletedAt,
        string $label,
        string $name,
        ?string $id = null,
        ?bool $allowChildTables = null,
        ?bool $allowPublicApiAccess = null,
        ?int $columnCount = null,
        ?array $columns = null,
        ?\DateTimeInterface $createdAt = null,
        ?SimpleUser $createdBy = null,
        ?bool $deleted = null,
        ?array $dynamicMetaTags = null,
        ?bool $enableChildTablePages = null,
        ?bool $isOrderedManually = null,
        ?bool $published = null,
        ?\DateTimeInterface $publishedAt = null,
        ?int $rowCount = null,
        ?\DateTimeInterface $updatedAt = null,
        ?SimpleUser $updatedBy = null,
        ?bool $useForPages = null,
    ): self {
        $obj = new self;

        $obj->deletedAt = $deletedAt;
        $obj->label = $label;
        $obj->name = $name;

        null !== $id && $obj->id = $id;
        null !== $allowChildTables && $obj->allowChildTables = $allowChildTables;
        null !== $allowPublicApiAccess && $obj->allowPublicApiAccess = $allowPublicApiAccess;
        null !== $columnCount && $obj->columnCount = $columnCount;
        null !== $columns && $obj->columns = $columns;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdBy && $obj->createdBy = $createdBy;
        null !== $deleted && $obj->deleted = $deleted;
        null !== $dynamicMetaTags && $obj->dynamicMetaTags = $dynamicMetaTags;
        null !== $enableChildTablePages && $obj->enableChildTablePages = $enableChildTablePages;
        null !== $isOrderedManually && $obj->isOrderedManually = $isOrderedManually;
        null !== $published && $obj->published = $published;
        null !== $publishedAt && $obj->publishedAt = $publishedAt;
        null !== $rowCount && $obj->rowCount = $rowCount;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedBy && $obj->updatedBy = $updatedBy;
        null !== $useForPages && $obj->useForPages = $useForPages;

        return $obj;
    }

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    /**
     * Label of the table.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * Name of the table.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Id of the table.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Specifies whether child tables can be created.
     */
    public function withAllowChildTables(bool $allowChildTables): self
    {
        $obj = clone $this;
        $obj->allowChildTables = $allowChildTables;

        return $obj;
    }

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    public function withAllowPublicAPIAccess(bool $allowPublicAPIAccess): self
    {
        $obj = clone $this;
        $obj->allowPublicApiAccess = $allowPublicAPIAccess;

        return $obj;
    }

    /**
     * Number of columns including deleted.
     */
    public function withColumnCount(int $columnCount): self
    {
        $obj = clone $this;
        $obj->columnCount = $columnCount;

        return $obj;
    }

    /**
     * List of columns in the table.
     *
     * @param list<Column> $columns
     */
    public function withColumns(array $columns): self
    {
        $obj = clone $this;
        $obj->columns = $columns;

        return $obj;
    }

    /**
     * Timestamp at which the table is created.
     */
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

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj->deleted = $deleted;

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
        $obj->dynamicMetaTags = $dynamicMetaTags;

        return $obj;
    }

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    public function withEnableChildTablePages(bool $enableChildTablePages): self
    {
        $obj = clone $this;
        $obj->enableChildTablePages = $enableChildTablePages;

        return $obj;
    }

    public function withIsOrderedManually(bool $isOrderedManually): self
    {
        $obj = clone $this;
        $obj->isOrderedManually = $isOrderedManually;

        return $obj;
    }

    public function withPublished(bool $published): self
    {
        $obj = clone $this;
        $obj->published = $published;

        return $obj;
    }

    /**
     * Timestamp at which the table is published recently.
     */
    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $obj = clone $this;
        $obj->publishedAt = $publishedAt;

        return $obj;
    }

    /**
     * Number of rows in the table.
     */
    public function withRowCount(int $rowCount): self
    {
        $obj = clone $this;
        $obj->rowCount = $rowCount;

        return $obj;
    }

    /**
     * Timestamp at which the table is updated recently.
     */
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

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    public function withUseForPages(bool $useForPages): self
    {
        $obj = clone $this;
        $obj->useForPages = $useForPages;

        return $obj;
    }
}
