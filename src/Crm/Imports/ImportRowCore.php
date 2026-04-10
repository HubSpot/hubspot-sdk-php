<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ImportRowCoreShape = array{
 *   additionalRowData: list<string>,
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

    /** @var list<string> $additionalRowData */
    #[Required(list: 'string')]
    public array $additionalRowData;

    /**
     * Indicates whether this row contains values that were encrypted.
     */
    #[Required]
    public bool $containsEncryptedProperties;

    /**
     * The unique identifier of the uploaded file containing this row.
     */
    #[Required('fileId')]
    public int $fileID;

    /**
     * The 1-indexed line number of this row in the source file. Line number 0 is reserved for file-wide errors that don't correspond to a specific row.
     */
    #[Required]
    public int $lineNumber;

    /** @var list<string> $rowData */
    #[Required(list: 'string')]
    public array $rowData;

    /**
     * The name of the spreadsheet sheet/page containing this row.
     */
    #[Optional]
    public ?string $pageName;

    /**
     * `new ImportRowCore()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImportRowCore::with(
     *   additionalRowData: ...,
     *   containsEncryptedProperties: ...,
     *   fileID: ...,
     *   lineNumber: ...,
     *   rowData: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImportRowCore)
     *   ->withAdditionalRowData(...)
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
     * @param list<string> $additionalRowData
     * @param list<string> $rowData
     */
    public static function with(
        array $additionalRowData,
        bool $containsEncryptedProperties,
        int $fileID,
        int $lineNumber,
        array $rowData,
        ?string $pageName = null,
    ): self {
        $self = new self;

        $self['additionalRowData'] = $additionalRowData;
        $self['containsEncryptedProperties'] = $containsEncryptedProperties;
        $self['fileID'] = $fileID;
        $self['lineNumber'] = $lineNumber;
        $self['rowData'] = $rowData;

        null !== $pageName && $self['pageName'] = $pageName;

        return $self;
    }

    /**
     * @param list<string> $additionalRowData
     */
    public function withAdditionalRowData(array $additionalRowData): self
    {
        $self = clone $this;
        $self['additionalRowData'] = $additionalRowData;

        return $self;
    }

    /**
     * Indicates whether this row contains values that were encrypted.
     */
    public function withContainsEncryptedProperties(
        bool $containsEncryptedProperties
    ): self {
        $self = clone $this;
        $self['containsEncryptedProperties'] = $containsEncryptedProperties;

        return $self;
    }

    /**
     * The unique identifier of the uploaded file containing this row.
     */
    public function withFileID(int $fileID): self
    {
        $self = clone $this;
        $self['fileID'] = $fileID;

        return $self;
    }

    /**
     * The 1-indexed line number of this row in the source file. Line number 0 is reserved for file-wide errors that don't correspond to a specific row.
     */
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

    /**
     * The name of the spreadsheet sheet/page containing this row.
     */
    public function withPageName(string $pageName): self
    {
        $self = clone $this;
        $self['pageName'] = $pageName;

        return $self;
    }
}
