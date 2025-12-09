<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Begins importing data from the specified file resources. This uploads the corresponding file and uses the import request object to convert rows in the files to objects.
 *
 * @see HubspotSDK\Services\Crm\ImportsService::create()
 *
 * @phpstan-type ImportCreateParamsShape = array{
 *   files?: string, importRequest?: string
 * }
 */
final class ImportCreateParams implements BaseModel
{
    /** @use SdkModel<ImportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $files;

    #[Optional]
    public ?string $importRequest;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $files = null,
        ?string $importRequest = null
    ): self {
        $self = new self;

        null !== $files && $self['files'] = $files;
        null !== $importRequest && $self['importRequest'] = $importRequest;

        return $self;
    }

    public function withFiles(string $files): self
    {
        $self = clone $this;
        $self['files'] = $files;

        return $self;
    }

    public function withImportRequest(string $importRequest): self
    {
        $self = clone $this;
        $self['importRequest'] = $importRequest;

        return $self;
    }
}
