<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APITimeWindow\Day;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APITimeWindowShape = array{
 *   day: value-of<Day>, endTime?: APITimeOfDay|null, startTime?: APITimeOfDay|null
 * }
 */
final class APITimeWindow implements BaseModel
{
    /** @use SdkModel<APITimeWindowShape> */
    use SdkModel;

    /** @var value-of<Day> $day */
    #[Api(enum: Day::class)]
    public string $day;

    #[Api(optional: true)]
    public ?APITimeOfDay $endTime;

    #[Api(optional: true)]
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
     * @param APITimeOfDay|array{hour: int, minute: int} $endTime
     * @param APITimeOfDay|array{hour: int, minute: int} $startTime
     */
    public static function with(
        Day|string $day,
        APITimeOfDay|array|null $endTime = null,
        APITimeOfDay|array|null $startTime = null,
    ): self {
        $obj = new self;

        $obj['day'] = $day;

        null !== $endTime && $obj['endTime'] = $endTime;
        null !== $startTime && $obj['startTime'] = $startTime;

        return $obj;
    }

    /**
     * @param Day|value-of<Day> $day
     */
    public function withDay(Day|string $day): self
    {
        $obj = clone $this;
        $obj['day'] = $day;

        return $obj;
    }

    /**
     * @param APITimeOfDay|array{hour: int, minute: int} $endTime
     */
    public function withEndTime(APITimeOfDay|array $endTime): self
    {
        $obj = clone $this;
        $obj['endTime'] = $endTime;

        return $obj;
    }

    /**
     * @param APITimeOfDay|array{hour: int, minute: int} $startTime
     */
    public function withStartTime(APITimeOfDay|array $startTime): self
    {
        $obj = clone $this;
        $obj['startTime'] = $startTime;

        return $obj;
    }
}
