<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APITimeWindow\Day;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APITimeOfDayShape from \HubspotSDK\Automation\Workflows\APITimeOfDay
 *
 * @phpstan-type APITimeWindowShape = array{
 *   day: Day|value-of<Day>,
 *   endTime?: null|APITimeOfDay|APITimeOfDayShape,
 *   startTime?: null|APITimeOfDay|APITimeOfDayShape,
 * }
 */
final class APITimeWindow implements BaseModel
{
    /** @use SdkModel<APITimeWindowShape> */
    use SdkModel;

    /** @var value-of<Day> $day */
    #[Required(enum: Day::class)]
    public string $day;

    #[Optional]
    public ?APITimeOfDay $endTime;

    #[Optional]
    public ?APITimeOfDay $startTime;

    /**
     * `new APITimeWindow()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APITimeWindow::with(day: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APITimeWindow)->withDay(...)
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
     * @param Day|value-of<Day> $day
     * @param APITimeOfDay|APITimeOfDayShape|null $endTime
     * @param APITimeOfDay|APITimeOfDayShape|null $startTime
     */
    public static function with(
        Day|string $day,
        APITimeOfDay|array|null $endTime = null,
        APITimeOfDay|array|null $startTime = null,
    ): self {
        $self = new self;

        $self['day'] = $day;

        null !== $endTime && $self['endTime'] = $endTime;
        null !== $startTime && $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * @param Day|value-of<Day> $day
     */
    public function withDay(Day|string $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    /**
     * @param APITimeOfDay|APITimeOfDayShape $endTime
     */
    public function withEndTime(APITimeOfDay|array $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * @param APITimeOfDay|APITimeOfDayShape $startTime
     */
    public function withStartTime(APITimeOfDay|array $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
