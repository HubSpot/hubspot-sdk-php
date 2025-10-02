<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new HubdbUnpublishTableParams); // set properties as needed
 * $client->cms.hubdb->unpublishTable(...$params->toArray());
 * ```
 * Unpublish a table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->unpublishTable(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->unpublishTable
 *
 * @phpstan-type hubdb_unpublish_table_params = array{includeForeignIDs?: bool}
 */
final class HubdbUnpublishTableParams implements BaseModel
{
    /** @use SdkModel<hubdb_unpublish_table_params> */
    use SdkModel;
    use SdkParams;

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

    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj->includeForeignIDs = $includeForeignIDs;

        return $obj;
    }
}
