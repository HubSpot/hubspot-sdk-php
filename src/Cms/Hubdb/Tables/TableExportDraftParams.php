<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Exports the draft version of a table to CSV / EXCEL format.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::exportDraft()
 *
 * @phpstan-type TableExportDraftParamsShape = array{format?: string|null}
 */
final class TableExportDraftParams implements BaseModel
{
    /** @use SdkModel<TableExportDraftParamsShape> */
    use SdkModel;
    use SdkParams;

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

    public function withFormat(string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }
}
