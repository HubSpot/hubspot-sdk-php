<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicDatePropertyOperation\OperationType;

/**
 * @phpstan-type PublicDatePropertyOperationShape = array{
 *   day: int,
 *   includeObjectsWithNoValueSet: bool,
 *   month: string,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   year: int,
 * }
 */
final class PublicDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicDatePropertyOperationShape> */
    use SdkModel;

    /**
     * The day of the month for the date operation.
     */
    #[Required]
    public int $day;

    /**
     * Indicates whether objects with no value set for the property should be included.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * The month for the date operation.
     */
    #[Required]
    public string $month;

    /**
     * Specifies the type of operation (DATE).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Defines the operation to be applied in the date property operation (IS_LESS_THAN_X_DAYS_AGO, IS_MORE_THAN_X_DAYS_AGO, IS_LESS_THAN_X_DAYS_FROM_NOW, IS_MORE_THAN_X_DAYS_FROM_NOW).
     */
    #[Required]
    public string $operator;

    /**
     * The year for the date operation.
     */
    #[Required]
    public int $year;

    /**
     * `new PublicDatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDatePropertyOperation::with(
     *   day: ...,
     *   includeObjectsWithNoValueSet: ...,
     *   month: ...,
     *   operationType: ...,
     *   operator: ...,
     *   year: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDatePropertyOperation)
     *   ->withDay(...)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withMonth(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withYear(...)
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
     */
    public static function with(
        int $day,
        bool $includeObjectsWithNoValueSet,
        string $month,
        string $operator,
        int $year,
        OperationType|string $operationType = 'DATE',
    ): self {
        $self = new self;

        $self['day'] = $day;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['month'] = $month;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['year'] = $year;

        return $self;
    }

    /**
     * The day of the month for the date operation.
     */
    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    /**
     * Indicates whether objects with no value set for the property should be included.
     */
    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * The month for the date operation.
     */
    public function withMonth(string $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    /**
     * Specifies the type of operation (DATE).
     *
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    /**
     * Defines the operation to be applied in the date property operation (IS_LESS_THAN_X_DAYS_AGO, IS_MORE_THAN_X_DAYS_AGO, IS_LESS_THAN_X_DAYS_FROM_NOW, IS_MORE_THAN_X_DAYS_FROM_NOW).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The year for the date operation.
     */
    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }
}
