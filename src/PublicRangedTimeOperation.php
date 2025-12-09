<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public bool $includeObjectsWithNoValueSet;

    #[Required]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint;

    #[Required]
    public string $operationType;

    #[Required]
    public string $operator;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint;

    #[Optional]
    public ?string $lowerBoundEndpointBehavior;

    #[Optional]
    public ?string $propertyParser;

    #[Optional]
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
     * } $lowerBoundTimePoint
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
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['lowerBoundTimePoint'] = $lowerBoundTimePoint;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['type'] = $type;
        $self['upperBoundTimePoint'] = $upperBoundTimePoint;

        null !== $lowerBoundEndpointBehavior && $self['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;
        null !== $propertyParser && $self['propertyParser'] = $propertyParser;
        null !== $upperBoundEndpointBehavior && $self['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;

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
     * } $lowerBoundTimePoint
     */
    public function withLowerBoundTimePoint(
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $lowerBoundTimePoint,
    ): self {
        $self = clone $this;
        $self['lowerBoundTimePoint'] = $lowerBoundTimePoint;

        return $self;
    }

    public function withOperationType(string $operationType): self
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

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
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
     * } $upperBoundTimePoint
     */
    public function withUpperBoundTimePoint(
        PublicDatePoint|array|PublicIndexedTimePoint|PublicPropertyReferencedTime $upperBoundTimePoint,
    ): self {
        $self = clone $this;
        $self['upperBoundTimePoint'] = $upperBoundTimePoint;

        return $self;
    }

    public function withLowerBoundEndpointBehavior(
        string $lowerBoundEndpointBehavior
    ): self {
        $self = clone $this;
        $self['lowerBoundEndpointBehavior'] = $lowerBoundEndpointBehavior;

        return $self;
    }

    public function withPropertyParser(string $propertyParser): self
    {
        $self = clone $this;
        $self['propertyParser'] = $propertyParser;

        return $self;
    }

    public function withUpperBoundEndpointBehavior(
        string $upperBoundEndpointBehavior
    ): self {
        $self = clone $this;
        $self['upperBoundEndpointBehavior'] = $upperBoundEndpointBehavior;

        return $self;
    }
}
