<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Clones a single row in the draft version of a table.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::cloneDraft()
 *
 * @phpstan-type RowCloneDraftParamsShape = array{
 *   tableIdOrName: string, name?: string
 * }
 */
final class RowCloneDraftParams implements BaseModel
{
    /** @use SdkModel<RowCloneDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIdOrName;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new RowCloneDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowCloneDraftParams::with(tableIdOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowCloneDraftParams)->withTableIDOrName(...)
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
     */
    public static function with(
        string $tableIdOrName,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj->tableIdOrName = $tableIdOrName;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj->tableIdOrName = $tableIDOrName;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
