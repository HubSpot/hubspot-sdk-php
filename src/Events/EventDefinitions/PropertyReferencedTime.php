<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\PropertyReferencedTime\ReferenceType;
use HubspotSDK\Events\EventDefinitions\PropertyReferencedTime\TimeType;
use HubspotSDK\Events\EventDefinitions\PropertyReferencedTime\TimezoneSource;

/**
 * @phpstan-type property_referenced_time = array{
 *   property: string,
 *   referenceType: value-of<ReferenceType>,
 *   timeType: value-of<TimeType>,
 *   timezoneSource: value-of<TimezoneSource>,
 *   zoneID: string,
 * }
 */
final class PropertyReferencedTime implements BaseModel
{
    /** @use SdkModel<property_referenced_time> */
    use SdkModel;

    #[Api]
    public string $property;

    /** @var value-of<ReferenceType> $referenceType */
    #[Api(enum: ReferenceType::class)]
    public string $referenceType;

    /** @var value-of<TimeType> $timeType */
    #[Api(enum: TimeType::class)]
    public string $timeType;

    /** @var value-of<TimezoneSource> $timezoneSource */
    #[Api(enum: TimezoneSource::class)]
    public string $timezoneSource;

    #[Api('zoneId')]
    public string $zoneID;

    /**
     * `new PropertyReferencedTime()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyReferencedTime::with(
     *   property: ...,
     *   referenceType: ...,
     *   timeType: ...,
     *   timezoneSource: ...,
     *   zoneID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyReferencedTime)
     *   ->withProperty(...)
     *   ->withReferenceType(...)
     *   ->withTimeType(...)
     *   ->withTimezoneSource(...)
     *   ->withZoneID(...)
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
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     * @param TimeType|value-of<TimeType> $timeType
     */
    public static function with(
        string $property,
        ReferenceType|string $referenceType,
        TimezoneSource|string $timezoneSource,
        string $zoneID,
        TimeType|string $timeType = 'PROPERTY_REFERENCED',
    ): self {
        $obj = new self;

        $obj->property = $property;
        $obj['referenceType'] = $referenceType;
        $obj['timeType'] = $timeType;
        $obj['timezoneSource'] = $timezoneSource;
        $obj->zoneID = $zoneID;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }

    /**
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public function withReferenceType(ReferenceType|string $referenceType): self
    {
        $obj = clone $this;
        $obj['referenceType'] = $referenceType;

        return $obj;
    }

    /**
     * @param TimeType|value-of<TimeType> $timeType
     */
    public function withTimeType(TimeType|string $timeType): self
    {
        $obj = clone $this;
        $obj['timeType'] = $timeType;

        return $obj;
    }

    /**
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     */
    public function withTimezoneSource(
        TimezoneSource|string $timezoneSource
    ): self {
        $obj = clone $this;
        $obj['timezoneSource'] = $timezoneSource;

        return $obj;
    }

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj->zoneID = $zoneID;

        return $obj;
    }
}
