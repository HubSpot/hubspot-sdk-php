<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Exports the published version of a table in a specified format.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::export()
 *
 * @phpstan-type TableExportParamsShape = array{format?: string}
 */
final class TableExportParams implements BaseModel
{
    /** @use SdkModel<TableExportParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
     */
    #[Optional]
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
        $self = new self;

        null !== $format && $self['format'] = $format;

        return $self;
    }

    /**
     * The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
     */
    public function withFormat(string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }
}
