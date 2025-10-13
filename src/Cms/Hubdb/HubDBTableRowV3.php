<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type hub_db_table_row_v3 = array{
 *   values: array<string, mixed>,
 *   id?: string,
 *   childTableID?: string,
 *   createdAt?: \DateTimeInterface,
 *   name?: string,
 *   path?: string,
 *   publishedAt?: \DateTimeInterface,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class HubDBTableRowV3 implements BaseModel, ResponseConverter
{
    /** @use SdkModel<hub_db_table_row_v3> */
    use SdkModel;

    use SdkResponse;

    /** @var array<string, mixed> $values */
    #[Api(map: 'mixed')]
    public array $values;

    #[Api(optional: true)]
    public ?string $id;

    #[Api('childTableId', optional: true)]
    public ?string $childTableID;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $path;

    #[Api(optional: true)]
    public ?\DateTimeInterface $publishedAt;

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
     * @param array<string, mixed> $values
     */
    public static function with(
        array $values,
        ?string $id = null,
        ?string $childTableID = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $path = null,
        ?\DateTimeInterface $publishedAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->values = $values;

        null !== $id && $obj->id = $id;
        null !== $childTableID && $obj->childTableID = $childTableID;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $name && $obj->name = $name;
        null !== $path && $obj->path = $path;
        null !== $publishedAt && $obj->publishedAt = $publishedAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * @param array<string, mixed> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withChildTableID(string $childTableID): self
    {
        $obj = clone $this;
        $obj->childTableID = $childTableID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
