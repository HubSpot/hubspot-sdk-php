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
 * @see HubspotSDK\Cms\Hubdb\Rows->getDraft
 *
 * @phpstan-type RowGetDraftParamsShape = array{
 *   tableIDOrName: string, archived?: bool
 * }
 */
final class RowGetDraftParams implements BaseModel
{
    /** @use SdkModel<RowGetDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * `new RowGetDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowGetDraftParams::with(tableIDOrName: ...)
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
        string $tableIDOrName,
        ?bool $archived = null
    ): self {
        $obj = new self;

        $obj->tableIDOrName = $tableIDOrName;

        null !== $archived && $obj->archived = $archived;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj->tableIDOrName = $tableIDOrName;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
