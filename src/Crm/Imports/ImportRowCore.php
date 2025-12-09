<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ImportRowCoreShape = array{
 *   containsEncryptedProperties: bool,
 *   fileID: int,
 *   lineNumber: int,
 *   rowData: list<string>,
 *   pageName?: string|null,
 * }
 */
final class ImportRowCore implements BaseModel
{
    /** @use SdkModel<ImportRowCoreShape> */
    use SdkModel;

    #[Required]
    public bool $containsEncryptedProperties;

    #[Required('fileId')]
    public int $fileID;

    #[Required]
    public int $lineNumber;

    /** @var list<string> $rowData */
    #[Required(list: 'string')]
    public array $rowData;

    #[Optional]
    public ?string $pageName;

    /**
     * `new ImportRowCore()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImportRowCore::with(
     *   containsEncryptedProperties: ..., fileID: ..., lineNumber: ..., rowData: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImportRowCore)
     *   ->withContainsEncryptedProperties(...)
     *   ->withFileID(...)
     *   ->withLineNumber(...)
     *   ->withRowData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $rowData
     */
    public static function with(
        bool $containsEncryptedProperties,
        int $fileID,
        int $lineNumber,
        array $rowData,
        ?string $pageName = null,
    ): self {
        $self = new self;

        $self['containsEncryptedProperties'] = $containsEncryptedProperties;
        $self['fileID'] = $fileID;
        $self['lineNumber'] = $lineNumber;
        $self['rowData'] = $rowData;

        null !== $pageName && $self['pageName'] = $pageName;

        return $self;
    }

    public function withContainsEncryptedProperties(
        bool $containsEncryptedProperties
    ): self {
        $self = clone $this;
        $self['containsEncryptedProperties'] = $containsEncryptedProperties;

        return $self;
    }

    public function withFileID(int $fileID): self
    {
        $self = clone $this;
        $self['fileID'] = $fileID;

        return $self;
    }

    public function withLineNumber(int $lineNumber): self
    {
        $self = clone $this;
        $self['lineNumber'] = $lineNumber;

        return $self;
    }

    /**
     * @param list<string> $rowData
     */
    public function withRowData(array $rowData): self
    {
        $self = clone $this;
        $self['rowData'] = $rowData;

        return $self;
    }

    public function withPageName(string $pageName): self
    {
        $self = clone $this;
        $self['pageName'] = $pageName;

        return $self;
    }
}
