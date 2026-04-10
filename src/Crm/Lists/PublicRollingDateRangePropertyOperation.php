<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicRollingDateRangePropertyOperation\OperationType;

/**
 * @phpstan-type PublicRollingDateRangePropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   numberOfDays: int,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   requiresTimeZoneConversion: bool,
 * }
 */
final class PublicRollingDateRangePropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicRollingDateRangePropertyOperationShape> */
    use SdkModel;

    /**
     * Indicates whether objects with no value set for the property should be included in the operation.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * The number of days to be considered in the rolling date range operation.
     */
    #[Required]
    public int $numberOfDays;

    /**
     * Specifies the type of operation (ROLLING_DATE_RANGE).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Defines the operation to be applied within the rolling date range property operation (IS_LESS_THAN_X_DAYS_AGO, IS_MORE_THAN_X_DAYS_AGO, IS_LESS_THAN_X_DAYS_FROM_NOW, IS_MORE_THAN_X_DAYS_FROM_NOW).
     */
    #[Required]
    public string $operator;

    /**
     * Specifies whether the operation requires conversion to a different time zone.
     */
    #[Required]
    public bool $requiresTimeZoneConversion;

    /**
     * `new PublicRollingDateRangePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRollingDateRangePropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   numberOfDays: ...,
     *   operationType: ...,
     *   operator: ...,
     *   requiresTimeZoneConversion: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRollingDateRangePropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withNumberOfDays(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withRequiresTimeZoneConversion(...)
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
        bool $includeObjectsWithNoValueSet,
        int $numberOfDays,
        string $operator,
        bool $requiresTimeZoneConversion,
        OperationType|string $operationType = 'ROLLING_DATE_RANGE',
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['numberOfDays'] = $numberOfDays;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;

        return $self;
    }

    /**
     * Indicates whether objects with no value set for the property should be included in the operation.
     */
    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * The number of days to be considered in the rolling date range operation.
     */
    public function withNumberOfDays(int $numberOfDays): self
    {
        $self = clone $this;
        $self['numberOfDays'] = $numberOfDays;

        return $self;
    }

    /**
     * Specifies the type of operation (ROLLING_DATE_RANGE).
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
     * Defines the operation to be applied within the rolling date range property operation (IS_LESS_THAN_X_DAYS_AGO, IS_MORE_THAN_X_DAYS_AGO, IS_LESS_THAN_X_DAYS_FROM_NOW, IS_MORE_THAN_X_DAYS_FROM_NOW).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * Specifies whether the operation requires conversion to a different time zone.
     */
    public function withRequiresTimeZoneConversion(
        bool $requiresTimeZoneConversion
    ): self {
        $self = clone $this;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;

        return $self;
    }
}
