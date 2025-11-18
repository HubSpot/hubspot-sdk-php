<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableRowV3Shape = array{
 *   id: string,
 *   childTableId: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   path: string,
 *   publishedAt: \DateTimeInterface,
 *   updatedAt: \DateTimeInterface,
 *   values: array<string,mixed>,
 * }
 */
final class HubDBTableRowV3 implements BaseModel
{
    /** @use SdkModel<HubDBTableRowV3Shape> */
    use SdkModel;

    /**
     * The id of the table row.
     */
    #[Api]
    public string $id;

    /**
     * Specifies the value for the column child table id.
     */
    #[Api]
    public string $childTableId;

    /**
     * Timestamp at which the row is created.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    #[Api]
    public string $name;

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    #[Api]
    public string $path;

    #[Api]
    public \DateTimeInterface $publishedAt;

    /**
     * Timestamp at which the row is updated last time.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * List of key value pairs with the column name and column value.
     *
     * @var array<string,mixed> $values
     */
    #[Api(map: 'mixed')]
    public array $values;

    /**
     * `new HubDBTableRowV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableRowV3::with(
     *   id: ...,
     *   childTableId: ...,
     *   createdAt: ...,
     *   name: ...,
     *   path: ...,
     *   publishedAt: ...,
     *   updatedAt: ...,
     *   values: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableRowV3)
     *   ->withID(...)
     *   ->withChildTableID(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withPath(...)
     *   ->withPublishedAt(...)
     *   ->withUpdatedAt(...)
     *   ->withValues(...)
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
        string $id,
        string $childTableId,
        \DateTimeInterface $createdAt,
        string $name,
        string $path,
        \DateTimeInterface $publishedAt,
        \DateTimeInterface $updatedAt,
        array $values,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->childTableId = $childTableId;
        $obj->createdAt = $createdAt;
        $obj->name = $name;
        $obj->path = $path;
        $obj->publishedAt = $publishedAt;
        $obj->updatedAt = $updatedAt;
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
}
