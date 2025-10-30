<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Clone an existing HubDB table. The `newName` and `newLabel` of the new table can be sent as JSON in the request body. This will create the cloned table as a draft.
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->cloneDraft
 *
 * @phpstan-type TableCloneDraftParamsShape = array{
 *   copyRows: bool, isHubspotDefined: bool, newLabel?: string, newName?: string
 * }
 */
final class TableCloneDraftParams implements BaseModel
{
    /** @use SdkModel<TableCloneDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies whether to copy the rows during clone.
     */
    #[Api]
    public bool $copyRows;

    #[Api]
    public bool $isHubspotDefined;

    /**
     * The new label for the cloned table.
     */
    #[Api(optional: true)]
    public ?string $newLabel;

    /**
     * The new name for the cloned table.
     */
    #[Api(optional: true)]
    public ?string $newName;

    /**
     * `new TableCloneDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TableCloneDraftParams::with(copyRows: ..., isHubspotDefined: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TableCloneDraftParams)->withCopyRows(...)->withIsHubspotDefined(...)
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
        bool $copyRows,
        bool $isHubspotDefined,
        ?string $newLabel = null,
        ?string $newName = null,
    ): self {
        $obj = new self;

        $obj->copyRows = $copyRows;
        $obj->isHubspotDefined = $isHubspotDefined;

        null !== $newLabel && $obj->newLabel = $newLabel;
        null !== $newName && $obj->newName = $newName;

        return $obj;
    }

    /**
     * Specifies whether to copy the rows during clone.
     */
    public function withCopyRows(bool $copyRows): self
    {
        $obj = clone $this;
        $obj->copyRows = $copyRows;

        return $obj;
    }

    public function withIsHubspotDefined(bool $isHubspotDefined): self
    {
        $obj = clone $this;
        $obj->isHubspotDefined = $isHubspotDefined;

        return $obj;
    }

    /**
     * The new label for the cloned table.
     */
    public function withNewLabel(string $newLabel): self
    {
        $obj = clone $this;
        $obj->newLabel = $newLabel;

        return $obj;
    }

    /**
     * The new name for the cloned table.
     */
    public function withNewName(string $newName): self
    {
        $obj = clone $this;
        $obj->newName = $newName;

        return $obj;
    }
}
