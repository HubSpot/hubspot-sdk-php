<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a single row by ID from a table's draft version.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::getDraft()
 *
 * @phpstan-type RowGetDraftParamsShape = array{
 *   tableIdOrName: string, archived?: bool
 * }
 */
final class RowGetDraftParams implements BaseModel
{
    /** @use SdkModel<RowGetDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIdOrName;

    /**
     * Set this to `true` to return an archived row. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * `new RowGetDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowGetDraftParams::with(tableIdOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowGetDraftParams)->withTableIDOrName(...)
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
        ?bool $archived = null
    ): self {
        $obj = new self;

        $obj->tableIdOrName = $tableIdOrName;

        null !== $archived && $obj->archived = $archived;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj->tableIdOrName = $tableIDOrName;

        return $obj;
    }

    /**
     * Set this to `true` to return an archived row. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
