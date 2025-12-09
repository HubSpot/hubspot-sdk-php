<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicCalendarDatePropertyOperation\FiscalYearStart;
use HubspotSDK\PublicCalendarDatePropertyOperation\OperationType;

/**
 * @phpstan-type PublicCalendarDatePropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   timeUnit: string,
 *   fiscalYearStart?: value-of<FiscalYearStart>|null,
 *   timeUnitCount?: int|null,
 *   useFiscalYear?: bool|null,
 * }
 */
final class PublicCalendarDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicCalendarDatePropertyOperationShape> */
    use SdkModel;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    #[Required]
    public string $operator;

    #[Required]
    public string $timeUnit;

    /** @var value-of<FiscalYearStart>|null $fiscalYearStart */
    #[Optional(enum: FiscalYearStart::class)]
    public ?string $fiscalYearStart;

    #[Optional]
    public ?int $timeUnitCount;

    #[Optional]
    public ?bool $useFiscalYear;

    /**
     * `new PublicCalendarDatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCalendarDatePropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   timeUnit: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCalendarDatePropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withTimeUnit(...)
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
     * @param OperationType|value-of<OperationType> $operationType
     * @param FiscalYearStart|value-of<FiscalYearStart> $fiscalYearStart
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        string $operator,
        string $timeUnit,
        OperationType|string $operationType = 'CALENDAR_DATE',
        FiscalYearStart|string|null $fiscalYearStart = null,
        ?int $timeUnitCount = null,
        ?bool $useFiscalYear = null,
    ): self {
        $obj = new self;

        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['timeUnit'] = $timeUnit;

        null !== $fiscalYearStart && $obj['fiscalYearStart'] = $fiscalYearStart;
        null !== $timeUnitCount && $obj['timeUnitCount'] = $timeUnitCount;
        null !== $useFiscalYear && $obj['useFiscalYear'] = $useFiscalYear;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $obj;
    }

    /**
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $obj = clone $this;
        $obj['operationType'] = $operationType;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    public function withTimeUnit(string $timeUnit): self
    {
        $obj = clone $this;
        $obj['timeUnit'] = $timeUnit;

        return $obj;
    }

    /**
     * @param FiscalYearStart|value-of<FiscalYearStart> $fiscalYearStart
     */
    public function withFiscalYearStart(
        FiscalYearStart|string $fiscalYearStart
    ): self {
        $obj = clone $this;
        $obj['fiscalYearStart'] = $fiscalYearStart;

        return $obj;
    }

    public function withTimeUnitCount(int $timeUnitCount): self
    {
        $obj = clone $this;
        $obj['timeUnitCount'] = $timeUnitCount;

        return $obj;
    }

    public function withUseFiscalYear(bool $useFiscalYear): self
    {
        $obj = clone $this;
        $obj['useFiscalYear'] = $useFiscalYear;

        return $obj;
    }
}
