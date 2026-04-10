<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Tables;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Replaces the data in the draft version of the table with values from the published version. Any unpublished changes in the draft will be lost after this call is made.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\TablesService::resetDraft()
 *
 * @phpstan-type TableResetDraftParamsShape = array{includeForeignIDs?: bool|null}
 */
final class TableResetDraftParams implements BaseModel
{
    /** @use SdkModel<TableResetDraftParamsShape> */
    use SdkModel;
    use SdkParams;

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
        $self = new self;

        null !== $includeForeignIDs && $self['includeForeignIDs'] = $includeForeignIDs;

        return $self;
    }

    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $self = clone $this;
        $self['includeForeignIDs'] = $includeForeignIDs;

        return $self;
    }
}
