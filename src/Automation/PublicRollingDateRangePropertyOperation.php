<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\PublicRollingDateRangePropertyOperation\OperationType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_rolling_date_range_property_operation = array{
 *   includeObjectsWithNoValueSet: bool,
 *   numberOfDays: int,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   requiresTimeZoneConversion: bool,
 * }
 */
final class PublicRollingDateRangePropertyOperation implements BaseModel
{
    /** @use SdkModel<public_rolling_date_range_property_operation> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public int $numberOfDays;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    #[Api]
    public string $operator;

    #[Api]
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
        $obj = new self;

        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;
        $obj->numberOfDays = $numberOfDays;
        $obj['operationType'] = $operationType;
        $obj->operator = $operator;
        $obj->requiresTimeZoneConversion = $requiresTimeZoneConversion;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj->includeObjectsWithNoValueSet = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withNumberOfDays(int $numberOfDays): self
    {
        $obj = clone $this;
        $obj->numberOfDays = $numberOfDays;

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

    public function withRequiresTimeZoneConversion(
        bool $requiresTimeZoneConversion
    ): self {
        $obj = clone $this;
        $obj->requiresTimeZoneConversion = $requiresTimeZoneConversion;

        return $obj;
    }
}
