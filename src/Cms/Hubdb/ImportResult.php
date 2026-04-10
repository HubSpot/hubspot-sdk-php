<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Error;

/**
 * @phpstan-import-type ErrorShape from \HubSpotSDK\Error
 *
 * @phpstan-type ImportResultShape = array{
 *   duplicateRows: int,
 *   errors: list<Error|ErrorShape>,
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
    #[Required]
    public int $duplicateRows;

    /**
     * List of errors during import.
     *
     * @var list<Error> $errors
     */
    #[Required(list: Error::class)]
    public array $errors;

    /**
     * Specifies whether row limit exceeded during import.
     */
    #[Required]
    public bool $rowLimitExceeded;

    /**
     * Specifies number of rows imported.
     */
    #[Required]
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
     * @param list<Error|ErrorShape> $errors
     */
    public static function with(
        int $duplicateRows,
        array $errors,
        bool $rowLimitExceeded,
        int $rowsImported
    ): self {
        $self = new self;

        $self['duplicateRows'] = $duplicateRows;
        $self['errors'] = $errors;
        $self['rowLimitExceeded'] = $rowLimitExceeded;
        $self['rowsImported'] = $rowsImported;

        return $self;
    }

    /**
     * Specifies number of duplicate rows.
     */
    public function withDuplicateRows(int $duplicateRows): self
    {
        $self = clone $this;
        $self['duplicateRows'] = $duplicateRows;

        return $self;
    }

    /**
     * List of errors during import.
     *
     * @param list<Error|ErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * Specifies whether row limit exceeded during import.
     */
    public function withRowLimitExceeded(bool $rowLimitExceeded): self
    {
        $self = clone $this;
        $self['rowLimitExceeded'] = $rowLimitExceeded;

        return $self;
    }

    /**
     * Specifies number of rows imported.
     */
    public function withRowsImported(int $rowsImported): self
    {
        $self = clone $this;
        $self['rowsImported'] = $rowsImported;

        return $self;
    }
}
