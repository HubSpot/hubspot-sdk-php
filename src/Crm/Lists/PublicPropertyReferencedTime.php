<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicPropertyReferencedTime\TimeType;

/**
 * @phpstan-type PublicPropertyReferencedTimeShape = array{
 *   property: string,
 *   referenceType: string,
 *   timeType: TimeType|value-of<TimeType>,
 *   zoneID: string,
 *   timezoneSource?: string|null,
 * }
 */
final class PublicPropertyReferencedTime implements BaseModel
{
    /** @use SdkModel<PublicPropertyReferencedTimeShape> */
    use SdkModel;

    /**
     * Specifies the name of the property that the time reference is applied to.
     */
    #[Required]
    public string $property;

    /**
     * Specifies the type of reference for the property (VALUE, UPDATED_AT, ANNIVERSARY, VALUE_WITH_ZONE_SAME_LOCAL_CONVERSION, ANNIVERSARY_WITH_ZONE_SAME_LOCAL_CONVERSION).
     */
    #[Required]
    public string $referenceType;

    /**
     * Defines the type of time (PROPERTY_REFERENCED).
     *
     * @var value-of<TimeType> $timeType
     */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    /**
     * Indicates the identifier for the time zone associated with the property.
     */
    #[Required('zoneId')]
    public string $zoneID;

    /**
     * Specifies the source of the time zone information for the property (CUSTOM, USER, PORTAL).
     */
    #[Optional]
    public ?string $timezoneSource;

    /**
     * `new PublicPropertyReferencedTime()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyReferencedTime::with(
     *   property: ..., referenceType: ..., timeType: ..., zoneID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPropertyReferencedTime)
     *   ->withProperty(...)
     *   ->withReferenceType(...)
     *   ->withTimeType(...)
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
     * @param TimeType|value-of<TimeType> $timeType
     */
    public static function with(
        string $property,
        string $referenceType,
        string $zoneID,
        TimeType|string $timeType = 'PROPERTY_REFERENCED',
        ?string $timezoneSource = null,
    ): self {
        $self = new self;

        $self['property'] = $property;
        $self['referenceType'] = $referenceType;
        $self['timeType'] = $timeType;
        $self['zoneID'] = $zoneID;

        null !== $timezoneSource && $self['timezoneSource'] = $timezoneSource;

        return $self;
    }

    /**
     * Specifies the name of the property that the time reference is applied to.
     */
    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * Specifies the type of reference for the property (VALUE, UPDATED_AT, ANNIVERSARY, VALUE_WITH_ZONE_SAME_LOCAL_CONVERSION, ANNIVERSARY_WITH_ZONE_SAME_LOCAL_CONVERSION).
     */
    public function withReferenceType(string $referenceType): self
    {
        $self = clone $this;
        $self['referenceType'] = $referenceType;

        return $self;
    }

    /**
     * Defines the type of time (PROPERTY_REFERENCED).
     *
     * @param TimeType|value-of<TimeType> $timeType
     */
    public function withTimeType(TimeType|string $timeType): self
    {
        $self = clone $this;
        $self['timeType'] = $timeType;

        return $self;
    }

    /**
     * Indicates the identifier for the time zone associated with the property.
     */
    public function withZoneID(string $zoneID): self
    {
        $self = clone $this;
        $self['zoneID'] = $zoneID;

        return $self;
    }

    /**
     * Specifies the source of the time zone information for the property (CUSTOM, USER, PORTAL).
     */
    public function withTimezoneSource(string $timezoneSource): self
    {
        $self = clone $this;
        $self['timezoneSource'] = $timezoneSource;

        return $self;
    }
}
