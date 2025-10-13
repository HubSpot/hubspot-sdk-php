<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TableUnpublishParams); // set properties as needed
 * $client->cms.hubdb.tables->unpublish(...$params->toArray());
 * ```
 * Unpublishes the table, meaning any website pages using data from the table will not render any data.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.tables->unpublish(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->unpublish
 *
 * @phpstan-type table_unpublish_params = array{includeForeignIDs?: bool}
 */
final class TableUnpublishParams implements BaseModel
{
    /** @use SdkModel<table_unpublish_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Set this to `true` to populate foreign ID values in the response.
     */
    #[Api(optional: true)]
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

        null !== $includeForeignIDs && $obj->includeForeignIDs = $includeForeignIDs;

        return $obj;
    }

    /**
     * Set this to `true` to populate foreign ID values in the response.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj->includeForeignIDs = $includeForeignIDs;

        return $obj;
    }
}
