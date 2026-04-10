<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\ImportsService::create()
 *
 * @phpstan-type ImportCreateParamsShape = array{
 *   files?: string|null, importRequest?: string|null
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
