<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\ListUpdateScheduleConversionParams\ConversionType;
use HubspotSDK\Crm\Lists\ListUpdateScheduleConversionParams\TimeUnit;

/**
 * @see HubspotSDK\Services\Crm\ListsService::updateScheduleConversion()
 *
 * @phpstan-type ListUpdateScheduleConversionParamsShape = array{
 *   conversionType: ConversionType|value-of<ConversionType>,
 *   day: int,
 *   month: int,
 *   year: int,
 *   offset: int,
 *   timeUnit: TimeUnit|value-of<TimeUnit>,
 * }
 */
final class ListUpdateScheduleConversionParams implements BaseModel
{
    /** @use SdkModel<ListUpdateScheduleConversionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the type of conversion (INACTIVITY).
     *
     * @var value-of<ConversionType> $conversionType
     */
    #[Required(enum: ConversionType::class)]
    public string $conversionType;

    /**
     * The day component of the conversion date.
     */
    #[Required]
    public int $day;

    /**
     * The month component of the conversion date.
     */
    #[Required]
    public int $month;

    /**
     * The year component of the conversion date.
     */
    #[Required]
    public int $year;

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
     * `new ListUpdateScheduleConversionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListUpdateScheduleConversionParams::with(
     *   conversionType: ...,
     *   day: ...,
     *   month: ...,
     *   year: ...,
     *   offset: ...,
     *   timeUnit: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListUpdateScheduleConversionParams)
     *   ->withConversionType(...)
     *   ->withDay(...)
     *   ->withMonth(...)
     *   ->withYear(...)
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
        int $day,
        int $month,
        int $year,
        int $offset,
        TimeUnit|string $timeUnit,
        ConversionType|string $conversionType = 'INACTIVITY',
    ): self {
        $self = new self;

        $self['conversionType'] = $conversionType;
        $self['day'] = $day;
        $self['month'] = $month;
        $self['year'] = $year;
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
     * The day component of the conversion date.
     */
    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    /**
     * The month component of the conversion date.
     */
    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    /**
     * The year component of the conversion date.
     */
    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

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
