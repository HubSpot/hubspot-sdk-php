<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalReminderShape from \HubSpotSDK\Scheduler\Meetings\ExternalReminder
 *
 * @phpstan-type ExternalEmailReminderScheduleShape = array{
 *   reminders: list<ExternalReminder|ExternalReminderShape>,
 *   shouldIncludeInviteDescription: bool,
 * }
 */
final class ExternalEmailReminderSchedule implements BaseModel
{
    /** @use SdkModel<ExternalEmailReminderScheduleShape> */
    use SdkModel;

    /** @var list<ExternalReminder> $reminders */
    #[Required(list: ExternalReminder::class)]
    public array $reminders;

    /**
     * Whether the invite description should be included in the reminder.
     */
    #[Required]
    public bool $shouldIncludeInviteDescription;

    /**
     * `new ExternalEmailReminderSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalEmailReminderSchedule::with(
     *   reminders: ..., shouldIncludeInviteDescription: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalEmailReminderSchedule)
     *   ->withReminders(...)
     *   ->withShouldIncludeInviteDescription(...)
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
     * @param list<ExternalReminder|ExternalReminderShape> $reminders
     */
    public static function with(
        array $reminders,
        bool $shouldIncludeInviteDescription
    ): self {
        $self = new self;

        $self['reminders'] = $reminders;
        $self['shouldIncludeInviteDescription'] = $shouldIncludeInviteDescription;

        return $self;
    }

    /**
     * @param list<ExternalReminder|ExternalReminderShape> $reminders
     */
    public function withReminders(array $reminders): self
    {
        $self = clone $this;
        $self['reminders'] = $reminders;

        return $self;
    }

    /**
     * Whether the invite description should be included in the reminder.
     */
    public function withShouldIncludeInviteDescription(
        bool $shouldIncludeInviteDescription
    ): self {
        $self = clone $this;
        $self['shouldIncludeInviteDescription'] = $shouldIncludeInviteDescription;

        return $self;
    }
}
