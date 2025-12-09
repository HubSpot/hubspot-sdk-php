<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableRowV3Shape = array{
 *   id: string,
 *   childTableID: string,
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
    #[Required]
    public string $id;

    /**
     * Specifies the value for the column child table id.
     */
    #[Required('childTableId')]
    public string $childTableID;

    /**
     * Timestamp at which the row is created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    #[Required]
    public string $name;

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    #[Required]
    public string $path;

    #[Required]
    public \DateTimeInterface $publishedAt;

    /**
     * Timestamp at which the row is updated last time.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * List of key value pairs with the column name and column value.
     *
     * @var array<string,mixed> $values
     */
    #[Required(map: 'mixed')]
    public array $values;

    /**
     * `new HubDBTableRowV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableRowV3::with(
     *   id: ...,
     *   childTableID: ...,
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
        string $childTableID,
        \DateTimeInterface $createdAt,
        string $name,
        string $path,
        \DateTimeInterface $publishedAt,
        \DateTimeInterface $updatedAt,
        array $values,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['childTableID'] = $childTableID;
        $obj['createdAt'] = $createdAt;
        $obj['name'] = $name;
        $obj['path'] = $path;
        $obj['publishedAt'] = $publishedAt;
        $obj['updatedAt'] = $updatedAt;
        $obj['values'] = $values;

        return $obj;
    }

    /**
     * The id of the table row.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Specifies the value for the column child table id.
     */
    public function withChildTableID(string $childTableID): self
    {
        $obj = clone $this;
        $obj['childTableID'] = $childTableID;

        return $obj;
    }

    /**
     * Timestamp at which the row is created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj['path'] = $path;

        return $obj;
    }

    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $obj = clone $this;
        $obj['publishedAt'] = $publishedAt;

        return $obj;
    }

    /**
     * Timestamp at which the row is updated last time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

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
        $obj['values'] = $values;

        return $obj;
    }
}
