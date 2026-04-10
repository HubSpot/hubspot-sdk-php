<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Tables;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Unpublishes the table, meaning any website pages using data from the table will not render any data.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\TablesService::unpublish()
 *
 * @phpstan-type TableUnpublishParamsShape = array{includeForeignIDs?: bool|null}
 */
final class TableUnpublishParams implements BaseModel
{
    /** @use SdkModel<TableUnpublishParamsShape> */
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
