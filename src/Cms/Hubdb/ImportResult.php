<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Error;

/**
 * @phpstan-type import_result = array{
 *   duplicateRows: int,
 *   errors: list<Error>,
 *   rowLimitExceeded: bool,
 *   rowsImported: int,
 * }
 */
final class ImportResult implements BaseModel
{
    /** @use SdkModel<import_result> */
    use SdkModel;

    /**
     * Specifies number of duplicate rows.
     */
    #[Api]
    public int $duplicateRows;

    /**
     * List of errors during import.
     *
     * @var list<Error> $errors
     */
    #[Api(list: Error::class)]
    public array $errors;

    /**
     * Specifies whether row limit exceeded during import.
     */
    #[Api]
    public bool $rowLimitExceeded;

    /**
     * Specifies number of rows imported.
     */
    #[Api]
    public int $rowsImported;

    /**
     * `new ImportResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImportResult::with(
     *   duplicateRows: ..., errors: ..., rowLimitExceeded: ..., rowsImported: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImportResult)
     *   ->withDuplicateRows(...)
     *   ->withErrors(...)
     *   ->withRowLimitExceeded(...)
     *   ->withRowsImported(...)
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
     * @param list<Error> $errors
     */
    public static function with(
        int $duplicateRows,
        array $errors,
        bool $rowLimitExceeded,
        int $rowsImported
    ): self {
        $obj = new self;

        $obj->duplicateRows = $duplicateRows;
        $obj->errors = $errors;
        $obj->rowLimitExceeded = $rowLimitExceeded;
        $obj->rowsImported = $rowsImported;

        return $obj;
    }

    /**
     * Specifies number of duplicate rows.
     */
    public function withDuplicateRows(int $duplicateRows): self
    {
        $obj = clone $this;
        $obj->duplicateRows = $duplicateRows;

        return $obj;
    }

    /**
     * List of errors during import.
     *
     * @param list<Error> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * Specifies whether row limit exceeded during import.
     */
    public function withRowLimitExceeded(bool $rowLimitExceeded): self
    {
        $obj = clone $this;
        $obj->rowLimitExceeded = $rowLimitExceeded;

        return $obj;
    }

    /**
     * Specifies number of rows imported.
     */
    public function withRowsImported(int $rowsImported): self
    {
        $obj = clone $this;
        $obj->rowsImported = $rowsImported;

        return $obj;
    }
}
