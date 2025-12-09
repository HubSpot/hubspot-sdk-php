<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Unpublishes the table, meaning any website pages using data from the table will not render any data.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::unpublish()
 *
 * @phpstan-type TableUnpublishParamsShape = array{includeForeignIDs?: bool}
 */
final class TableUnpublishParams implements BaseModel
{
    /** @use SdkModel<TableUnpublishParamsShape> */
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
        $self = new self;

        null !== $includeForeignIDs && $self['includeForeignIDs'] = $includeForeignIDs;

        return $self;
    }

    /**
     * Set this to `true` to populate foreign ID values in the response.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $self = clone $this;
        $self['includeForeignIDs'] = $includeForeignIDs;

        return $self;
    }
}
