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

    /**
     * The timestamp indicating when the row was last published, in date-time format.
     */
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
        $self = new self;

        $self['id'] = $id;
        $self['childTableID'] = $childTableID;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['path'] = $path;
        $self['publishedAt'] = $publishedAt;
        $self['updatedAt'] = $updatedAt;
        $self['values'] = $values;

        return $self;
    }

    /**
     * The id of the table row.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Specifies the value for the column child table id.
     */
    public function withChildTableID(string $childTableID): self
    {
        $self = clone $this;
        $self['childTableID'] = $childTableID;

        return $self;
    }

    /**
     * Timestamp at which the row is created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }

    /**
     * The timestamp indicating when the row was last published, in date-time format.
     */
    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $self = clone $this;
        $self['publishedAt'] = $publishedAt;

        return $self;
    }

    /**
     * Timestamp at which the row is updated last time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * List of key value pairs with the column name and column value.
     *
     * @param array<string,mixed> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }
}
