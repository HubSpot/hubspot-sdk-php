<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\PropertyReferencedTime\ReferenceType;
use HubspotSDK\Events\EventDefinitions\PropertyReferencedTime\TimeType;
use HubspotSDK\Events\EventDefinitions\PropertyReferencedTime\TimezoneSource;

/**
 * @phpstan-type PropertyReferencedTimeShape = array{
 *   property: string,
 *   referenceType: ReferenceType|value-of<ReferenceType>,
 *   timeType: TimeType|value-of<TimeType>,
 *   timezoneSource: TimezoneSource|value-of<TimezoneSource>,
 *   zoneID: string,
 * }
 */
final class PropertyReferencedTime implements BaseModel
{
    /** @use SdkModel<PropertyReferencedTimeShape> */
    use SdkModel;

    #[Required]
    public string $property;

    /** @var value-of<ReferenceType> $referenceType */
    #[Required(enum: ReferenceType::class)]
    public string $referenceType;

    /** @var value-of<TimeType> $timeType */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    /** @var value-of<TimezoneSource> $timezoneSource */
    #[Required(enum: TimezoneSource::class)]
    public string $timezoneSource;

    #[Required('zoneId')]
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
        $self = new self;

        $self['property'] = $property;
        $self['referenceType'] = $referenceType;
        $self['timeType'] = $timeType;
        $self['timezoneSource'] = $timezoneSource;
        $self['zoneID'] = $zoneID;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public function withReferenceType(ReferenceType|string $referenceType): self
    {
        $self = clone $this;
        $self['referenceType'] = $referenceType;

        return $self;
    }

    /**
     * @param TimeType|value-of<TimeType> $timeType
     */
    public function withTimeType(TimeType|string $timeType): self
    {
        $self = clone $this;
        $self['timeType'] = $timeType;

        return $self;
    }

    /**
     * @param TimezoneSource|value-of<TimezoneSource> $timezoneSource
     */
    public function withTimezoneSource(
        TimezoneSource|string $timezoneSource
    ): self {
        $self = clone $this;
        $self['timezoneSource'] = $timezoneSource;

        return $self;
    }

    public function withZoneID(string $zoneID): self
    {
        $self = clone $this;
        $self['zoneID'] = $zoneID;

        return $self;
    }
}
