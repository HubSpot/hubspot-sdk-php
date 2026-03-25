<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicListConversionInactivity\ConversionType;
use HubspotSDK\Crm\Lists\PublicListConversionInactivity\TimeUnit;

/**
 * @phpstan-type PublicListConversionInactivityShape = array{
 *   conversionType: ConversionType|value-of<ConversionType>,
 *   offset: int,
 *   timeUnit: TimeUnit|value-of<TimeUnit>,
 * }
 */
final class PublicListConversionInactivity implements BaseModel
{
    /** @use SdkModel<PublicListConversionInactivityShape> */
    use SdkModel;

    /**
     * Specifies the type of conversion (INACTIVITY).
     *
     * @var value-of<ConversionType> $conversionType
     */
    #[Required(enum: ConversionType::class)]
    public string $conversionType;

    /**
     * The number of time units for the inactivity period.
     */
    #[Required]
    public int $offset;

    /**
     * The unit of time for the inactivity period, such as (DAY, MONTH, WEEK).
     *
     * @var value-of<TimeUnit> $timeUnit
     */
    #[Required(enum: TimeUnit::class)]
    public string $timeUnit;

    /**
     * `new PublicListConversionInactivity()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicListConversionInactivity::with(
     *   conversionType: ..., offset: ..., timeUnit: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicListConversionInactivity)
     *   ->withConversionType(...)
     *   ->withOffset(...)
     *   ->withTimeUnit(...)
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
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public static function with(
        int $offset,
        TimeUnit|string $timeUnit,
        ConversionType|string $conversionType = 'INACTIVITY',
    ): self {
        $self = new self;

        $self['conversionType'] = $conversionType;
        $self['offset'] = $offset;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    /**
     * Specifies the type of conversion (INACTIVITY).
     *
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public function withConversionType(
        ConversionType|string $conversionType
    ): self {
        $self = clone $this;
        $self['conversionType'] = $conversionType;

        return $self;
    }

    /**
     * The number of time units for the inactivity period.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * The unit of time for the inactivity period, such as (DAY, MONTH, WEEK).
     *
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }
}
