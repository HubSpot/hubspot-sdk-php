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
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   timeUnit: string,
 *   fiscalYearStart?: null|FiscalYearStart|value-of<FiscalYearStart>,
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
     * @param FiscalYearStart|value-of<FiscalYearStart>|null $fiscalYearStart
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
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['timeUnit'] = $timeUnit;

        null !== $fiscalYearStart && $self['fiscalYearStart'] = $fiscalYearStart;
        null !== $timeUnitCount && $self['timeUnitCount'] = $timeUnitCount;
        null !== $useFiscalYear && $self['useFiscalYear'] = $useFiscalYear;

        return $self;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withTimeUnit(string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    /**
     * @param FiscalYearStart|value-of<FiscalYearStart> $fiscalYearStart
     */
    public function withFiscalYearStart(
        FiscalYearStart|string $fiscalYearStart
    ): self {
        $self = clone $this;
        $self['fiscalYearStart'] = $fiscalYearStart;

        return $self;
    }

    public function withTimeUnitCount(int $timeUnitCount): self
    {
        $self = clone $this;
        $self['timeUnitCount'] = $timeUnitCount;

        return $self;
    }

    public function withUseFiscalYear(bool $useFiscalYear): self
    {
        $self = clone $this;
        $self['useFiscalYear'] = $useFiscalYear;

        return $self;
    }
}
