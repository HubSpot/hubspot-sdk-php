<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableRowV3Shape = array{
 *   values: array<string,mixed>,
 *   id?: string|null,
 *   childTableId?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   path?: string|null,
 *   publishedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class HubDBTableRowV3 implements BaseModel
{
    /** @use SdkModel<HubDBTableRowV3Shape> */
    use SdkModel;

    /**
     * List of key value pairs with the column name and column value.
     *
     * @var array<string,mixed> $values
     */
    #[Api(map: 'mixed')]
    public array $values;

    /**
     * The id of the table row.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies the value for the column child table id.
     */
    #[Api(optional: true)]
    public ?string $childTableId;

    /**
     * Timestamp at which the row is created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    #[Api(optional: true)]
    public ?string $path;

    #[Api(optional: true)]
    public ?\DateTimeInterface $publishedAt;

    /**
     * Timestamp at which the row is updated last time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new HubDBTableRowV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableRowV3::with(values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableRowV3)->withValues(...)
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
     * @param array<string,mixed> $values
     */
    public static function with(
        array $values,
        ?string $id = null,
        ?string $childTableId = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $path = null,
        ?\DateTimeInterface $publishedAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->values = $values;

        null !== $id && $obj->id = $id;
        null !== $childTableId && $obj->childTableId = $childTableId;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $name && $obj->name = $name;
        null !== $path && $obj->path = $path;
        null !== $publishedAt && $obj->publishedAt = $publishedAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * List of key value pairs with the column name and column value.
     *
     * @param array<string,mixed> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }

    /**
     * The id of the table row.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Specifies the value for the column child table id.
     */
    public function withChildTableID(string $childTableID): self
    {
        $obj = clone $this;
        $obj->childTableId = $childTableID;

        return $obj;
    }

    /**
     * Timestamp at which the row is created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }

    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $obj = clone $this;
        $obj->publishedAt = $publishedAt;

        return $obj;
    }

    /**
     * Timestamp at which the row is updated last time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
