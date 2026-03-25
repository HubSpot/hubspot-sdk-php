<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicRangedDatePropertyOperation\OperationType;

/**
 * @phpstan-type PublicRangedDatePropertyOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBound: int,
 *   operationType: OperationType|value-of<OperationType>,
 *   operator: string,
 *   requiresTimeZoneConversion: bool,
 *   upperBound: int,
 * }
 */
final class PublicRangedDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicRangedDatePropertyOperationShape> */
    use SdkModel;

    /**
     * Specifies whether objects without a set value should be included in the operation.
     */
    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /**
     * The lower limit of the date range for the operation.
     */
    #[Required]
    public int $lowerBound;

    /**
     * Specifies the type of operation (RANGED_DATE).
     *
     * @var value-of<OperationType> $operationType
     */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /**
     * Defines the operation to be applied in the ranged date property operation (IS_BETWEEN, IS_NOT_BETWEEN).
     */
    #[Required]
    public string $operator;

    /**
     * Indicates whether the operation requires conversion to a different time zone.
     */
    #[Required]
    public bool $requiresTimeZoneConversion;

    /**
     * The upper limit of the date range for the operation.
     */
    #[Required]
    public int $upperBound;

    /**
     * `new PublicRangedDatePropertyOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRangedDatePropertyOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   lowerBound: ...,
     *   operationType: ...,
     *   operator: ...,
     *   requiresTimeZoneConversion: ...,
     *   upperBound: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRangedDatePropertyOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withLowerBound(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withRequiresTimeZoneConversion(...)
     *   ->withUpperBound(...)
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
        int $lowerBound,
        string $operator,
        bool $requiresTimeZoneConversion,
        int $upperBound,
        OperationType|string $operationType = 'RANGED_DATE',
    ): self {
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['lowerBound'] = $lowerBound;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;
        $self['upperBound'] = $upperBound;

        return $self;
    }

    /**
     * Specifies whether objects without a set value should be included in the operation.
     */
    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $self = clone $this;
        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $self;
    }

    /**
     * The lower limit of the date range for the operation.
     */
    public function withLowerBound(int $lowerBound): self
    {
        $self = clone $this;
        $self['lowerBound'] = $lowerBound;

        return $self;
    }

    /**
     * Specifies the type of operation (RANGED_DATE).
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
     * Defines the operation to be applied in the ranged date property operation (IS_BETWEEN, IS_NOT_BETWEEN).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * Indicates whether the operation requires conversion to a different time zone.
     */
    public function withRequiresTimeZoneConversion(
        bool $requiresTimeZoneConversion
    ): self {
        $self = clone $this;
        $self['requiresTimeZoneConversion'] = $requiresTimeZoneConversion;

        return $self;
    }

    /**
     * The upper limit of the date range for the operation.
     */
    public function withUpperBound(int $upperBound): self
    {
        $self = clone $this;
        $self['upperBound'] = $upperBound;

        return $self;
    }
}
