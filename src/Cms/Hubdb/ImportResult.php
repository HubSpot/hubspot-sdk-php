<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Error;

/**
 * @phpstan-type import_result = array{
 *   duplicateRows: int,
 *   errors: list<Error>,
 *   rowLimitExceeded: bool,
 *   rowsImported: int,
 * }
 */
final class ImportResult implements BaseModel, ResponseConverter
{
    /** @use SdkModel<import_result> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public int $duplicateRows;

    /** @var list<Error> $errors */
    #[Api(list: Error::class)]
    public array $errors;

    #[Api]
    public bool $rowLimitExceeded;

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

    public function withDuplicateRows(int $duplicateRows): self
    {
        $obj = clone $this;
        $obj->duplicateRows = $duplicateRows;

        return $obj;
    }

    /**
     * @param list<Error> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    public function withRowLimitExceeded(bool $rowLimitExceeded): self
    {
        $obj = clone $this;
        $obj->rowLimitExceeded = $rowLimitExceeded;

        return $obj;
    }

    public function withRowsImported(int $rowsImported): self
    {
        $obj = clone $this;
        $obj->rowsImported = $rowsImported;

        return $obj;
    }
}
