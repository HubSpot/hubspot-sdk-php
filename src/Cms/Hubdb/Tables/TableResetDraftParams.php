<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replaces the data in the draft version of the table with values from the published version. Any unpublished changes in the draft will be lost after this call is made.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::resetDraft()
 *
 * @phpstan-type TableResetDraftParamsShape = array{includeForeignIDs?: bool}
 */
final class TableResetDraftParams implements BaseModel
{
    /** @use SdkModel<TableResetDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set this to `true` to populate foreign ID values in the response.
     */
    #[Optional]
    public ?bool $includeForeignIDs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeForeignIDs = null): self
    {
        $obj = new self;

        null !== $includeForeignIDs && $obj['includeForeignIDs'] = $includeForeignIDs;

        return $obj;
    }

    /**
     * Set this to `true` to populate foreign ID values in the response.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj['includeForeignIDs'] = $includeForeignIDs;

        return $obj;
    }
}
