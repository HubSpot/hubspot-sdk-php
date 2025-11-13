<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a single row by ID from the published version of a table.
 * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::get()
 *
 * @phpstan-type RowGetParamsShape = array{tableIdOrName: string, archived?: bool}
 */
final class RowGetParams implements BaseModel
{
    /** @use SdkModel<RowGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIdOrName;

    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * `new RowGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowGetParams::with(tableIdOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowGetParams)->withTableIDOrName(...)
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

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
