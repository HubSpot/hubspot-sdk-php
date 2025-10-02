<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type cms_hubdb_hub_db_table_row_v3_request = array{
 *   values: array<string, mixed>,
 *   childTableID?: int,
 *   displayIndex?: int,
 *   name?: string,
 *   path?: string,
 * }
 */
final class CmsHubdbHubDBTableRowV3Request implements BaseModel
{
    /** @use SdkModel<cms_hubdb_hub_db_table_row_v3_request> */
    use SdkModel;

    /** @var array<string, mixed> $values */
    #[Api(map: 'mixed')]
    public array $values;

    #[Api('childTableId', optional: true)]
    public ?int $childTableID;

    #[Api(optional: true)]
    public ?int $displayIndex;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $path;

    /**
     * `new CmsHubdbHubDBTableRowV3Request()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbHubDBTableRowV3Request::with(values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbHubDBTableRowV3Request)->withValues(...)
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
        ?int $childTableID = null,
        ?int $displayIndex = null,
        ?string $name = null,
        ?string $path = null,
    ): self {
        $obj = new self;

        $obj->values = $values;

        null !== $childTableID && $obj->childTableID = $childTableID;
        null !== $displayIndex && $obj->displayIndex = $displayIndex;
        null !== $name && $obj->name = $name;
        null !== $path && $obj->path = $path;

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

    public function withChildTableID(int $childTableID): self
    {
        $obj = clone $this;
        $obj->childTableID = $childTableID;

        return $obj;
    }

    public function withDisplayIndex(int $displayIndex): self
    {
        $obj = clone $this;
        $obj->displayIndex = $displayIndex;

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
}
