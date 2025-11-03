<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Begins importing data from the specified file resources. This uploads the corresponding file and uses the import request object to convert rows in the files to objects.
 *
 * @see HubspotSDK\Crm\Imports->create
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

    #[Api(optional: true)]
    public ?string $files;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $files && $obj->files = $files;
        null !== $importRequest && $obj->importRequest = $importRequest;

        return $obj;
    }

    public function withFiles(string $files): self
    {
        $obj = clone $this;
        $obj->files = $files;

        return $obj;
    }

    public function withImportRequest(string $importRequest): self
    {
        $obj = clone $this;
        $obj->importRequest = $importRequest;

        return $obj;
    }
}
