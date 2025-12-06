<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicPropertyReferencedTime\TimeType;

/**
 * @phpstan-type PublicPropertyReferencedTimeShape = array{
 *   property: string,
 *   referenceType: string,
 *   timeType: value-of<TimeType>,
 *   zoneId: string,
 *   timezoneSource?: string|null,
 * }
 */
final class PublicPropertyReferencedTime implements BaseModel
{
    /** @use SdkModel<PublicPropertyReferencedTimeShape> */
    use SdkModel;

    #[Api]
    public string $property;

    #[Api]
    public string $referenceType;

    /** @var value-of<TimeType> $timeType */
    #[Api(enum: TimeType::class)]
    public string $timeType;

    #[Api]
    public string $zoneId;

    #[Api(optional: true)]
    public ?string $timezoneSource;

    /**
     * `new PublicPropertyReferencedTime()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyReferencedTime::with(
     *   property: ..., referenceType: ..., timeType: ..., zoneId: ...
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
        string $zoneId,
        TimeType|string $timeType = 'PROPERTY_REFERENCED',
        ?string $timezoneSource = null,
    ): self {
        $obj = new self;

        $obj['property'] = $property;
        $obj['referenceType'] = $referenceType;
        $obj['timeType'] = $timeType;
        $obj['zoneId'] = $zoneId;

        null !== $timezoneSource && $obj['timezoneSource'] = $timezoneSource;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }

    public function withReferenceType(string $referenceType): self
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

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj['zoneId'] = $zoneID;

        return $obj;
    }

    public function withTimezoneSource(string $timezoneSource): self
    {
        $obj = clone $this;
        $obj['timezoneSource'] = $timezoneSource;

        return $obj;
    }
}
