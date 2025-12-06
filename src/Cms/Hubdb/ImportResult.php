<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\APIError;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ErrorDetail;

/**
 * @phpstan-type ImportResultShape = array{
 *   duplicateRows: int,
 *   errors: list<APIError>,
 *   rowLimitExceeded: bool,
 *   rowsImported: int,
 * }
 */
final class ImportResult implements BaseModel
{
    /** @use SdkModel<ImportResultShape> */
    use SdkModel;

    /**
     * Specifies number of duplicate rows.
     */
    #[Api]
    public int $duplicateRows;

    /**
     * List of errors during import.
     *
     * @var list<APIError> $errors
     */
    #[Api(list: APIError::class)]
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
     * @param list<APIError|array{
     *   category: string,
     *   correlationId: string,
     *   message: string,
     *   context?: array<string,list<string>>|null,
     *   errors?: list<ErrorDetail>|null,
     *   links?: array<string,string>|null,
     *   subCategory?: string|null,
     * }> $errors
     */
    public static function with(
        int $duplicateRows,
        array $errors,
        bool $rowLimitExceeded,
        int $rowsImported
    ): self {
        $obj = new self;

        $obj['duplicateRows'] = $duplicateRows;
        $obj['errors'] = $errors;
        $obj['rowLimitExceeded'] = $rowLimitExceeded;
        $obj['rowsImported'] = $rowsImported;

        return $obj;
    }

    /**
     * Specifies number of duplicate rows.
     */
    public function withDuplicateRows(int $duplicateRows): self
    {
        $obj = clone $this;
        $obj['duplicateRows'] = $duplicateRows;

        return $obj;
    }

    /**
     * List of errors during import.
     *
     * @param list<APIError|array{
     *   category: string,
     *   correlationId: string,
     *   message: string,
     *   context?: array<string,list<string>>|null,
     *   errors?: list<ErrorDetail>|null,
     *   links?: array<string,string>|null,
     *   subCategory?: string|null,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
    }

    /**
     * Specifies whether row limit exceeded during import.
     */
    public function withRowLimitExceeded(bool $rowLimitExceeded): self
    {
        $obj = clone $this;
        $obj['rowLimitExceeded'] = $rowLimitExceeded;

        return $obj;
    }

    /**
     * Specifies number of rows imported.
     */
    public function withRowsImported(int $rowsImported): self
    {
        $obj = clone $this;
        $obj['rowsImported'] = $rowsImported;

        return $obj;
    }
}
