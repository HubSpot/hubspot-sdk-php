<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\ParticipationProperties\AttendanceState;

/**
 * @phpstan-type ParticipationPropertiesShape = array{
 *   attendanceState: value-of<AttendanceState>,
 *   occurredAt: int,
 *   attendanceDurationSeconds?: int|null,
 *   attendancePercentage?: string|null,
 * }
 */
final class ParticipationProperties implements BaseModel
{
    /** @use SdkModel<ParticipationPropertiesShape> */
    use SdkModel;

    /** @var value-of<AttendanceState> $attendanceState */
    #[Api(enum: AttendanceState::class)]
    public string $attendanceState;

    #[Api]
    public int $occurredAt;

    #[Api(optional: true)]
    public ?int $attendanceDurationSeconds;

    #[Api(optional: true)]
    public ?string $attendancePercentage;

    /**
     * `new ParticipationProperties()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipationProperties::with(attendanceState: ..., occurredAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipationProperties)->withAttendanceState(...)->withOccurredAt(...)
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
     * @param AttendanceState|value-of<AttendanceState> $attendanceState
     */
    public static function with(
        AttendanceState|string $attendanceState,
        int $occurredAt,
        ?int $attendanceDurationSeconds = null,
        ?string $attendancePercentage = null,
    ): self {
        $obj = new self;

        $obj['attendanceState'] = $attendanceState;
        $obj->occurredAt = $occurredAt;

        null !== $attendanceDurationSeconds && $obj->attendanceDurationSeconds = $attendanceDurationSeconds;
        null !== $attendancePercentage && $obj->attendancePercentage = $attendancePercentage;

        return $obj;
    }

    /**
     * @param AttendanceState|value-of<AttendanceState> $attendanceState
     */
    public function withAttendanceState(
        AttendanceState|string $attendanceState
    ): self {
        $obj = clone $this;
        $obj['attendanceState'] = $attendanceState;

        return $obj;
    }

    public function withOccurredAt(int $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurredAt = $occurredAt;

        return $obj;
    }

    public function withAttendanceDurationSeconds(
        int $attendanceDurationSeconds
    ): self {
        $obj = clone $this;
        $obj->attendanceDurationSeconds = $attendanceDurationSeconds;

        return $obj;
    }

    public function withAttendancePercentage(string $attendancePercentage): self
    {
        $obj = clone $this;
        $obj->attendancePercentage = $attendancePercentage;

        return $obj;
    }
}
