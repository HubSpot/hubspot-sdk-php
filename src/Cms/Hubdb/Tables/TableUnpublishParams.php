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
 * @phpstan-type TableUnpublishParamsShape = array{includeForeignIds?: bool}
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
    public ?bool $includeForeignIds;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeForeignIds = null): self
    {
        $obj = new self;

        null !== $includeForeignIds && $obj['includeForeignIds'] = $includeForeignIds;

        return $obj;
    }

    /**
     * Set this to `true` to populate foreign ID values in the response.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj['includeForeignIds'] = $includeForeignIDs;

        return $obj;
    }
}
