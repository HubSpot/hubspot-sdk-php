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
        $self = new self;

        $self['includeObjectsWithNoValueSet'] = $includeObjectsWithNoValueSet;
        $self['operationType'] = $operationType;
        $self['operator'] = $operator;
        $self['timePoint'] = $timePoint;
        $self['type'] = $type;

        null !== $endpointBehavior && $self['endpointBehavior'] = $endpointBehavior;
        null !== $propertyParser && $self['propertyParser'] = $propertyParser;

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
        $self = clone $this;
        $self['timePoint'] = $timePoint;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withEndpointBehavior(string $endpointBehavior): self
    {
        $self = clone $this;
        $self['endpointBehavior'] = $endpointBehavior;

        return $self;
    }

    public function withPropertyParser(string $propertyParser): self
    {
        $self = clone $this;
        $self['propertyParser'] = $propertyParser;

        return $self;
    }
}
