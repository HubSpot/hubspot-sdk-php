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
 * $params = (new TableExportParams); // set properties as needed
 * $client->cms.hubdb.tables->export(...$params->toArray());
 * ```
 * Exports the published version of a table in a specified format.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.tables->export(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->export
 *
 * @phpstan-type table_export_params = array{format?: string}
 */
final class TableExportParams implements BaseModel
{
    /** @use SdkModel<table_export_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
     */
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

    /**
     * The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
     */
    public function withFormat(string $format): self
    {
        $obj = clone $this;
        $obj->format = $format;

        return $obj;
    }
}
