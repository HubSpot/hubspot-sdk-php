<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIDailyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_daily_enrollment_schedule = array{
 *   timeOfDay: APITimeOfDay, type: value-of<Type>
 * }
 */
final class APIDailyEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<api_daily_enrollment_schedule> */
    use SdkModel;

    #[Api]
    public APITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIDailyEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIDailyEnrollmentSchedule::with(timeOfDay: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIDailyEnrollmentSchedule)->withTimeOfDay(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        APITimeOfDay $timeOfDay,
        Type|string $type = 'DAILY'
    ): self {
        $obj = new self;

        $obj->timeOfDay = $timeOfDay;
        $obj['type'] = $type;

        return $obj;
    }

    public function withTimeOfDay(APITimeOfDay $timeOfDay): self
    {
        $obj = clone $this;
        $obj->timeOfDay = $timeOfDay;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
