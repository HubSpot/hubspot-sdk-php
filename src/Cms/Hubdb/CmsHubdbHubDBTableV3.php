<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type cms_hubdb_hub_db_table_v3 = array{
 *   deletedAt: \DateTimeInterface,
 *   label: string,
 *   name: string,
 *   id?: string,
 *   allowChildTables?: bool,
 *   allowPublicAPIAccess?: bool,
 *   columnCount?: int,
 *   columns?: list<CmsHubdbColumn>,
 *   createdAt?: \DateTimeInterface,
 *   createdBy?: CmsHubdbSimpleUser,
 *   deleted?: bool,
 *   dynamicMetaTags?: array<string, int>,
 *   enableChildTablePages?: bool,
 *   isOrderedManually?: bool,
 *   published?: bool,
 *   publishedAt?: \DateTimeInterface,
 *   rowCount?: int,
 *   updatedAt?: \DateTimeInterface,
 *   updatedBy?: CmsHubdbSimpleUser,
 *   useForPages?: bool,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CmsHubdbHubDBTableV3 implements BaseModel
{
    /** @use SdkModel<cms_hubdb_hub_db_table_v3> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $deletedAt;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?bool $allowChildTables;

    #[Api('allowPublicApiAccess', optional: true)]
    public ?bool $allowPublicAPIAccess;

    #[Api(optional: true)]
    public ?int $columnCount;

    /** @var list<CmsHubdbColumn>|null $columns */
    #[Api(list: CmsHubdbColumn::class, optional: true)]
    public ?array $columns;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?CmsHubdbSimpleUser $createdBy;

    #[Api(optional: true)]
    public ?bool $deleted;

    /** @var array<string, int>|null $dynamicMetaTags */
    #[Api(map: 'int', optional: true)]
    public ?array $dynamicMetaTags;

    #[Api(optional: true)]
    public ?bool $enableChildTablePages;

    #[Api(optional: true)]
    public ?bool $isOrderedManually;

    #[Api(optional: true)]
    public ?bool $published;

    #[Api(optional: true)]
    public ?\DateTimeInterface $publishedAt;

    #[Api(optional: true)]
    public ?int $rowCount;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?CmsHubdbSimpleUser $updatedBy;

    #[Api(optional: true)]
    public ?bool $useForPages;

    /**
     * `new CmsHubdbHubDBTableV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbHubDBTableV3::with(deletedAt: ..., label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbHubDBTableV3)->withDeletedAt(...)->withLabel(...)->withName(...)
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
     * @param list<CmsHubdbColumn> $columns
     * @param array<string, int> $dynamicMetaTags
     */
    public static function with(
        \DateTimeInterface $deletedAt,
        string $label,
        string $name,
        ?string $id = null,
        ?bool $allowChildTables = null,
        ?bool $allowPublicAPIAccess = null,
        ?int $columnCount = null,
        ?array $columns = null,
        ?\DateTimeInterface $createdAt = null,
        ?CmsHubdbSimpleUser $createdBy = null,
        ?bool $deleted = null,
        ?array $dynamicMetaTags = null,
        ?bool $enableChildTablePages = null,
        ?bool $isOrderedManually = null,
        ?bool $published = null,
        ?\DateTimeInterface $publishedAt = null,
        ?int $rowCount = null,
        ?\DateTimeInterface $updatedAt = null,
        ?CmsHubdbSimpleUser $updatedBy = null,
        ?bool $useForPages = null,
    ): self {
        $obj = new self;

        $obj->deletedAt = $deletedAt;
        $obj->label = $label;
        $obj->name = $name;

        null !== $id && $obj->id = $id;
        null !== $allowChildTables && $obj->allowChildTables = $allowChildTables;
        null !== $allowPublicAPIAccess && $obj->allowPublicAPIAccess = $allowPublicAPIAccess;
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

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAllowChildTables(bool $allowChildTables): self
    {
        $obj = clone $this;
        $obj->allowChildTables = $allowChildTables;

        return $obj;
    }

    public function withAllowPublicAPIAccess(bool $allowPublicAPIAccess): self
    {
        $obj = clone $this;
        $obj->allowPublicAPIAccess = $allowPublicAPIAccess;

        return $obj;
    }

    public function withColumnCount(int $columnCount): self
    {
        $obj = clone $this;
        $obj->columnCount = $columnCount;

        return $obj;
    }

    /**
     * @param list<CmsHubdbColumn> $columns
     */
    public function withColumns(array $columns): self
    {
        $obj = clone $this;
        $obj->columns = $columns;

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

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj->deleted = $deleted;

        return $obj;
    }

    /**
     * @param array<string, int> $dynamicMetaTags
     */
    public function withDynamicMetaTags(array $dynamicMetaTags): self
    {
        $obj = clone $this;
        $obj->dynamicMetaTags = $dynamicMetaTags;

        return $obj;
    }

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

    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $obj = clone $this;
        $obj->publishedAt = $publishedAt;

        return $obj;
    }

    public function withRowCount(int $rowCount): self
    {
        $obj = clone $this;
        $obj->rowCount = $rowCount;

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

    public function withUseForPages(bool $useForPages): self
    {
        $obj = clone $this;
        $obj->useForPages = $useForPages;

        return $obj;
    }
}
