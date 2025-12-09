<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams\ConversionType;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams\TimeUnit;

/**
 * Schedule the conversion of an active list into a static list, or update the already scheduled conversion. This can be scheduled for a specific date or based on activity.
 *
 * @see HubspotSDK\Services\Crm\ListsService::scheduleConversion()
 *
 * @phpstan-type ListScheduleConversionParamsShape = array{
 *   conversionType: ConversionType|value-of<ConversionType>,
 *   day: int,
 *   month: int,
 *   year: int,
 *   offset: int,
 *   timeUnit: TimeUnit|value-of<TimeUnit>,
 * }
 */
final class ListScheduleConversionParams implements BaseModel
{
    /** @use SdkModel<ListScheduleConversionParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<ConversionType> $conversionType */
    #[Required(enum: ConversionType::class)]
    public string $conversionType;

    #[Required]
    public int $day;

    #[Required]
    public int $month;

    #[Required]
    public int $year;

    #[Required]
    public int $offset;

    /** @var value-of<TimeUnit> $timeUnit */
    #[Required(enum: TimeUnit::class)]
    public string $timeUnit;

    /**
     * `new ListScheduleConversionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListScheduleConversionParams::with(
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
     * (new ListScheduleConversionParams)
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
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public function withConversionType(
        ConversionType|string $conversionType
    ): self {
        $self = clone $this;
        $self['conversionType'] = $conversionType;

        return $self;
    }

    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }

    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }
}
