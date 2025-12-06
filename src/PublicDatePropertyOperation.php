<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicDatePropertyOperation\OperationType;

/**
 * @phpstan-type PublicDatePropertyOperationShape = array{
 *   day: int,
 *   includeObjectsWithNoValueSet: bool,
 *   month: string,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   year: int,
 * }
 */
final class PublicDatePropertyOperation implements BaseModel
{
    /** @use SdkModel<PublicDatePropertyOperationShape> */
    use SdkModel;

    #[Api]
    public int $day;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public string $month;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    #[Api]
    public string $operator;

    #[Api]
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
        $obj = new self;

        $obj['day'] = $day;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['month'] = $month;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['year'] = $year;

        return $obj;
    }

    public function withDay(int $day): self
    {
        $obj = clone $this;
        $obj['day'] = $day;

        return $obj;
    }

    public function withIncludeObjectsWithNoValueSet(
        bool $includeObjectsWithNoValueSet
    ): self {
        $obj = clone $this;
        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;

        return $obj;
    }

    public function withMonth(string $month): self
    {
        $obj = clone $this;
        $obj['month'] = $month;

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

    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj['year'] = $year;

        return $obj;
    }
}
