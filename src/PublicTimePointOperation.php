<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicDatePoint\TimeType;
use HubspotSDK\PublicTimePointOperation\OperationType;

/**
 * @phpstan-type PublicTimePointOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   operationType: value-of<OperationType>,
 *   operator: string,
 *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
 *   type: string,
 *   endpointBehavior?: string|null,
 *   propertyParser?: string|null,
 * }
 */
final class PublicTimePointOperation implements BaseModel
{
    /** @use SdkModel<PublicTimePointOperationShape> */
    use SdkModel;

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    /** @var value-of<OperationType> $operationType */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    #[Required]
    public string $operator;

    #[Required]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $timePoint;

    #[Required]
    public string $type;

    #[Optional]
    public ?string $endpointBehavior;

    #[Optional]
    public ?string $propertyParser;

    /**
     * `new PublicTimePointOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicTimePointOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   operationType: ...,
     *   operator: ...,
     *   timePoint: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicTimePointOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withTimePoint(...)
     *   ->withType(...)
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
     * @param PublicDatePoint|array{
     *   day: int,
     *   month: int,
     *   timeType: value-of<TimeType>,
     *   year: int,
     *   zoneID: string,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     *   timezoneSource?: string|null,
     * }|PublicIndexedTimePoint|array{
     *   indexReference: PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference,
     *   timeType: value-of<PublicIndexedTimePoint\TimeType>,
     *   zoneID: string,
     *   offset?: PublicIndexOffset|null,
     *   timezoneSource?: string|null,
     * }|PublicPropertyReferencedTime|array{
     *   property: string,
     *   referenceType: string,
     *   timeType: value-of<PublicPropertyReferencedTime\TimeType>,
     *   zoneID: string,
     *   timezoneSource?: string|null,
     * } $timePoint
     * @param OperationType|value-of<OperationType> $operationType
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        string $operator,
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $timePoint,
        string $type,
        OperationType|string $operationType = 'TIME_POINT',
        ?string $endpointBehavior = null,
        ?string $propertyParser = null,
    ): self {
        $obj = new self;

        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['timePoint'] = $timePoint;
        $obj['type'] = $type;

        null !== $endpointBehavior && $obj['endpointBehavior'] = $endpointBehavior;
        null !== $propertyParser && $obj['propertyParser'] = $propertyParser;

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

    /**
     * @param PublicDatePoint|array{
     *   day: int,
     *   month: int,
     *   timeType: value-of<TimeType>,
     *   year: int,
     *   zoneID: string,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     *   timezoneSource?: string|null,
     * }|PublicIndexedTimePoint|array{
     *   indexReference: PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference,
     *   timeType: value-of<PublicIndexedTimePoint\TimeType>,
     *   zoneID: string,
     *   offset?: PublicIndexOffset|null,
     *   timezoneSource?: string|null,
     * }|PublicPropertyReferencedTime|array{
     *   property: string,
     *   referenceType: string,
     *   timeType: value-of<PublicPropertyReferencedTime\TimeType>,
     *   zoneID: string,
     *   timezoneSource?: string|null,
     * } $timePoint
     */
    public function withTimePoint(
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $timePoint,
    ): self {
        $obj = clone $this;
        $obj['timePoint'] = $timePoint;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withEndpointBehavior(string $endpointBehavior): self
    {
        $obj = clone $this;
        $obj['endpointBehavior'] = $endpointBehavior;

        return $obj;
    }

    public function withPropertyParser(string $propertyParser): self
    {
        $obj = clone $this;
        $obj['propertyParser'] = $propertyParser;

        return $obj;
    }
}
