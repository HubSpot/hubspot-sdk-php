<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Exports the draft version of a table to CSV / EXCEL format.
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->exportDraft
 *
 * @phpstan-type TableExportDraftParamsShape = array{format?: string}
 */
final class TableExportDraftParams implements BaseModel
{
    /** @use SdkModel<TableExportDraftParamsShape> */
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
