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
     */
    public static function with(
        Day|string $day,
        ?APITimeOfDay $endTime = null,
        ?APITimeOfDay $startTime = null,
    ): self {
        $obj = new self;

        $obj['day'] = $day;

        null !== $endTime && $obj->endTime = $endTime;
        null !== $startTime && $obj->startTime = $startTime;

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

    public function withEndTime(APITimeOfDay $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    public function withStartTime(APITimeOfDay $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }
}
