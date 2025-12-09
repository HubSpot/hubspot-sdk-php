<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicPropertyReferencedTime\TimeType;

/**
 * @phpstan-type PublicPropertyReferencedTimeShape = array{
 *   property: string,
 *   referenceType: string,
 *   timeType: value-of<TimeType>,
 *   zoneID: string,
 *   timezoneSource?: string|null,
 * }
 */
final class PublicPropertyReferencedTime implements BaseModel
{
    /** @use SdkModel<PublicPropertyReferencedTimeShape> */
    use SdkModel;

    #[Required]
    public string $property;

    #[Required]
    public string $referenceType;

    /** @var value-of<TimeType> $timeType */
    #[Required(enum: TimeType::class)]
    public string $timeType;

    #[Required('zoneId')]
    public string $zoneID;

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

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    public function withReferenceType(string $referenceType): self
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

    public function withZoneID(string $zoneID): self
    {
        $self = clone $this;
        $self['zoneID'] = $zoneID;

        return $self;
    }

    public function withTimezoneSource(string $timezoneSource): self
    {
        $self = clone $this;
        $self['timezoneSource'] = $timezoneSource;

        return $self;
    }
}
