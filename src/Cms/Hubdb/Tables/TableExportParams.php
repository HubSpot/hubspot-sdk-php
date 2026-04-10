<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Tables;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Exports the published version of a table in a specified format.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\TablesService::export()
 *
 * @phpstan-type TableExportParamsShape = array{format?: string|null}
 */
final class TableExportParams implements BaseModel
{
    /** @use SdkModel<TableExportParamsShape> */
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
