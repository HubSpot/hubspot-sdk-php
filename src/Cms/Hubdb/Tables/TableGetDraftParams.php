<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for the draft version of a specific HubDB table. This will include the definitions for the columns in the table and the number of rows in the table.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::getDraft()
 *
 * @phpstan-type TableGetDraftParamsShape = array{
 *   archived?: bool, includeForeignIds?: bool, isGetLocalizedSchema?: bool
 * }
 */
final class TableGetDraftParams implements BaseModel
{
    /** @use SdkModel<TableGetDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set this to `true` to return an archived table. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    #[Api(optional: true)]
    public ?bool $includeForeignIds;

    #[Api(optional: true)]
    public ?bool $isGetLocalizedSchema;

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
        ?bool $archived = null,
        ?bool $includeForeignIds = null,
        ?bool $isGetLocalizedSchema = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $includeForeignIds && $obj->includeForeignIds = $includeForeignIds;
        null !== $isGetLocalizedSchema && $obj->isGetLocalizedSchema = $isGetLocalizedSchema;

        return $obj;
    }

    /**
     * Set this to `true` to return an archived table. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj->includeForeignIds = $includeForeignIDs;

        return $obj;
    }

    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $obj = clone $this;
        $obj->isGetLocalizedSchema = $isGetLocalizedSchema;

        return $obj;
    }
}
