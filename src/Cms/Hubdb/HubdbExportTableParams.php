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
 * $params = (new HubdbExportTableParams); // set properties as needed
 * $client->cms.hubdb->exportTable(...$params->toArray());
 * ```
 * Export a published version of a table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->exportTable(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->exportTable
 *
 * @phpstan-type hubdb_export_table_params = array{format?: string}
 */
final class HubdbExportTableParams implements BaseModel
{
    /** @use SdkModel<hubdb_export_table_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $format;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $format = null): self
    {
        $obj = new self;

        null !== $format && $obj->format = $format;

        return $obj;
    }

    public function withFormat(string $format): self
    {
        $obj = clone $this;
        $obj->format = $format;

        return $obj;
    }
}
