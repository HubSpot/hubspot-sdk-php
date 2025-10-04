<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicCalendarDatePropertyOperation\FiscalYearStart;
use HubspotSDK\Automation\AutomationPublicCalendarDatePropertyOperation\OperationType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_calendar_date_property_operation = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   timeUnit: string,
 *   fiscalYearStart?: value-of<FiscalYearStart>,
 *   timeUnitCount?: int,
 *   useFiscalYear?: bool,
 * }
 */
final class AutomationPublicCalendarDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<automation_public_calendar_date_property_operation> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    #[Api]
    public string $operator;

    #[Api]
    public string $timeUnit;

    /** @var value-of<FiscalYearStart>|null $fiscalYearStart */
    #[Api(enum: FiscalYearStart::class, optional: true)]
    public ?string $fiscalYearStart;

    #[Api(optional: true)]
    public ?int $timeUnitCount;

    #[Api(optional: true)]
    public ?bool $useFiscalYear;

    /**
     * `new AutomationPublicCalendarDatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicCalendarDatePropertyOperation::with(
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
     * (new AutomationPublicCalendarDatePropertyOperation)
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

        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj->operator = $operator;
        $obj->timeUnit = $timeUnit;

        null !== $fiscalYearStart && $obj['fiscalYearStart'] = $fiscalYearStart;
        null !== $timeUnitCount && $obj->timeUnitCount = $timeUnitCount;
        null !== $useFiscalYear && $obj->useFiscalYear = $useFiscalYear;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

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
        $obj->operator = $operator;

        return $obj;
    }

    public function withTimeUnit(string $timeUnit): self
    {
        $obj = clone $this;
        $obj->timeUnit = $timeUnit;

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
        $obj->timeUnitCount = $timeUnitCount;

        return $obj;
    }

    public function withUseFiscalYear(bool $useFiscalYear): self
    {
        $obj = clone $this;
        $obj->useFiscalYear = $useFiscalYear;

        return $obj;
    }
}
