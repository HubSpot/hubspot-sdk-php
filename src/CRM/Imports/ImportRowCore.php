<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Imports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ImportRowCoreShape = array{
 *   containsEncryptedProperties: bool,
 *   fileID: int,
 *   lineNumber: int,
 *   rowData: list<string>,
 *   pageName?: string,
 * }
 */
final class ImportRowCore implements BaseModel
{
    /** @use SdkModel<ImportRowCoreShape> */
    use SdkModel;

    #[Api]
    public bool $containsEncryptedProperties;

    #[Api('fileId')]
    public int $fileID;

    #[Api]
    public int $lineNumber;

    /** @var list<string> $rowData */
    #[Api(list: 'string')]
    public array $rowData;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->containsEncryptedProperties = $containsEncryptedProperties;
        $obj->fileID = $fileID;
        $obj->lineNumber = $lineNumber;
        $obj->rowData = $rowData;

        null !== $pageName && $obj->pageName = $pageName;

        return $obj;
    }

    public function withContainsEncryptedProperties(
        bool $containsEncryptedProperties
    ): self {
        $obj = clone $this;
        $obj->containsEncryptedProperties = $containsEncryptedProperties;

        return $obj;
    }

    public function withFileID(int $fileID): self
    {
        $obj = clone $this;
        $obj->fileID = $fileID;

        return $obj;
    }

    public function withLineNumber(int $lineNumber): self
    {
        $obj = clone $this;
        $obj->lineNumber = $lineNumber;

        return $obj;
    }

    /**
     * @param list<string> $rowData
     */
    public function withRowData(array $rowData): self
    {
        $obj = clone $this;
        $obj->rowData = $rowData;

        return $obj;
    }

    public function withPageName(string $pageName): self
    {
        $obj = clone $this;
        $obj->pageName = $pageName;

        return $obj;
    }
}
