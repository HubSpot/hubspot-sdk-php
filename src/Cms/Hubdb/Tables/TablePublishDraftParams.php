<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Tables;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\TablesService::publishDraft()
 *
 * @phpstan-type TablePublishDraftParamsShape = array{
 *   includeForeignIDs?: bool|null
 * }
 */
final class TablePublishDraftParams implements BaseModel
{
    /** @use SdkModel<TablePublishDraftParamsShape> */
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
