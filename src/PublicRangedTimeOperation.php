<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicDatePoint\TimeType;
use HubspotSDK\PublicRangedTimeOperation\Type;

/**
 * @phpstan-type PublicRangedTimeOperationShape = array{
 *   includeObjectsWithNoValueSet: bool,
 *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
 *   operationType: string,
 *   operator: string,
 *   type: value-of<Type>,
 *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
 *   lowerBoundEndpointBehavior?: string|null,
 *   propertyParser?: string|null,
 *   upperBoundEndpointBehavior?: string|null,
 * }
 */
final class PublicRangedTimeOperation implements BaseModel
{
    /** @use SdkModel<PublicRangedTimeOperationShape> */
    use SdkModel;

    #[Api]
    public bool $includeObjectsWithNoValueSet;

    #[Api]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint;

    #[Api]
    public string $operationType;

    #[Api]
    public string $operator;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint;

    #[Api(optional: true)]
    public ?string $lowerBoundEndpointBehavior;

    #[Api(optional: true)]
    public ?string $propertyParser;

    #[Api(optional: true)]
    public ?string $upperBoundEndpointBehavior;

    /**
     * `new PublicRangedTimeOperation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRangedTimeOperation::with(
     *   includeObjectsWithNoValueSet: ...,
     *   lowerBoundTimePoint: ...,
     *   operationType: ...,
     *   operator: ...,
     *   type: ...,
     *   upperBoundTimePoint: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRangedTimeOperation)
     *   ->withIncludeObjectsWithNoValueSet(...)
     *   ->withLowerBoundTimePoint(...)
     *   ->withOperationType(...)
     *   ->withOperator(...)
     *   ->withType(...)
     *   ->withUpperBoundTimePoint(...)
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
     *   zoneId: string,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     *   timezoneSource?: string|null,
     * }|PublicIndexedTimePoint|array{
     *   indexReference: PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference,
     *   timeType: value-of<PublicIndexedTimePoint\TimeType>,
     *   zoneId: string,
     *   offset?: PublicIndexOffset|null,
     *   timezoneSource?: string|null,
     * }|PublicPropertyReferencedTime|array{
     *   property: string,
     *   referenceType: string,
     *   timeType: value-of<PublicPropertyReferencedTime\TimeType>,
     *   zoneId: string,
     *   timezoneSource?: string|null,
     * } $lowerBoundTimePoint
     * @param PublicDatePoint|array{
     *   day: int,
     *   month: int,
     *   timeType: value-of<TimeType>,
     *   year: int,
     *   zoneId: string,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     *   timezoneSource?: string|null,
     * }|PublicIndexedTimePoint|array{
     *   indexReference: PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference,
     *   timeType: value-of<PublicIndexedTimePoint\TimeType>,
     *   zoneId: string,
     *   offset?: PublicIndexOffset|null,
     *   timezoneSource?: string|null,
     * }|PublicPropertyReferencedTime|array{
     *   property: string,
     *   referenceType: string,
     *   timeType: value-of<PublicPropertyReferencedTime\TimeType>,
     *   zoneId: string,
     *   timezoneSource?: string|null,
     * } $upperBoundTimePoint
     * @param Type|value-of<Type> $type
     */
    public static function with(
        bool $includeObjectsWithNoValueSet,
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint,
        string $operationType,
        string $operator,
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint,
        Type|string $type = 'TIME_RANGED',
        ?string $lowerBoundEndpointBehavior = null,
        ?string $propertyParser = null,
        ?string $upperBoundEndpointBehavior = null,
    ): self {
        $obj = new self;

        $obj['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $obj['lowerBoundTimePoint'] = $lowerBoundTimePoint;
        $obj['operationType'] = $operationType;
        $obj['operator'] = $operator;
        $obj['type'] = $type;
        $obj['upperBoundTimePoint'] = $upperBoundTimePoint;

        null !== $lowerBoundEndpointBehavior && $obj['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;
        null !== $propertyParser && $obj['propertyParser'] = $propertyParser;
        null !== $upperBoundEndpointBehavior && $obj['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;

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
     * @param PublicDatePoint|array{
     *   day: int,
     *   month: int,
     *   timeType: value-of<TimeType>,
     *   year: int,
     *   zoneId: string,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     *   timezoneSource?: string|null,
     * }|PublicIndexedTimePoint|array{
     *   indexReference: PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference,
     *   timeType: value-of<PublicIndexedTimePoint\TimeType>,
     *   zoneId: string,
     *   offset?: PublicIndexOffset|null,
     *   timezoneSource?: string|null,
     * }|PublicPropertyReferencedTime|array{
     *   property: string,
     *   referenceType: string,
     *   timeType: value-of<PublicPropertyReferencedTime\TimeType>,
     *   zoneId: string,
     *   timezoneSource?: string|null,
     * } $lowerBoundTimePoint
     */
    public function withLowerBoundTimePoint(
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint,
    ): self {
        $obj = clone $this;
        $obj['lowerBoundTimePoint'] = $lowerBoundTimePoint;

        return $obj;
    }

    public function withOperationType(string $operationType): self
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
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param PublicDatePoint|array{
     *   day: int,
     *   month: int,
     *   timeType: value-of<TimeType>,
     *   year: int,
     *   zoneId: string,
     *   hour?: int|null,
     *   millisecond?: int|null,
     *   minute?: int|null,
     *   second?: int|null,
     *   timezoneSource?: string|null,
     * }|PublicIndexedTimePoint|array{
     *   indexReference: PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference,
     *   timeType: value-of<PublicIndexedTimePoint\TimeType>,
     *   zoneId: string,
     *   offset?: PublicIndexOffset|null,
     *   timezoneSource?: string|null,
     * }|PublicPropertyReferencedTime|array{
     *   property: string,
     *   referenceType: string,
     *   timeType: value-of<PublicPropertyReferencedTime\TimeType>,
     *   zoneId: string,
     *   timezoneSource?: string|null,
     * } $upperBoundTimePoint
     */
    public function withUpperBoundTimePoint(
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint,
    ): self {
        $obj = clone $this;
        $obj['upperBoundTimePoint'] = $upperBoundTimePoint;

        return $obj;
    }

    public function withLowerBoundEndpointBehavior(
        string $lowerBoundEndpointBehavior
    ): self {
        $obj = clone $this;
        $obj['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;

        return $obj;
    }

    public function withPropertyParser(string $propertyParser): self
    {
        $obj = clone $this;
        $obj['propertyParser'] = $propertyParser;

        return $obj;
    }

    public function withUpperBoundEndpointBehavior(
        string $upperBoundEndpointBehavior
    ): self {
        $obj = clone $this;
        $obj['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;

        return $obj;
    }
}
