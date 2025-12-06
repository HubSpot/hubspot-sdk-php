<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(enum: ConversionType::class)]
    public string $conversionType;

    #[Api]
    public int $day;

    #[Api]
    public int $month;

    #[Api]
    public int $year;

    #[Api]
    public int $offset;

    /** @var value-of<TimeUnit> $timeUnit */
    #[Api(enum: TimeUnit::class)]
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
        $obj = new self;

        $obj['conversionType'] = $conversionType;
        $obj['day'] = $day;
        $obj['month'] = $month;
        $obj['year'] = $year;
        $obj['offset'] = $offset;
        $obj['timeUnit'] = $timeUnit;

        return $obj;
    }

    /**
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public function withConversionType(
        ConversionType|string $conversionType
    ): self {
        $obj = clone $this;
        $obj['conversionType'] = $conversionType;

        return $obj;
    }

    public function withDay(int $day): self
    {
        $obj = clone $this;
        $obj['day'] = $day;

        return $obj;
    }

    public function withMonth(int $month): self
    {
        $obj = clone $this;
        $obj['month'] = $month;

        return $obj;
    }

    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj['year'] = $year;

        return $obj;
    }

    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }

    /**
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $obj = clone $this;
        $obj['timeUnit'] = $timeUnit;

        return $obj;
    }
}
