<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\Advanced;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;

/**
 * Create a new calendar event and meeting object by providing the necessary details such as associations, email reminders, meeting object properties, and timezone.
 *
 * @see HubspotSDK\Services\Scheduler\Meetings\AdvancedService::create()
 *
 * @phpstan-import-type ExternalAssociationCreateRequestShape from \HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest
 * @phpstan-import-type ExternalEmailReminderScheduleShape from \HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule
 * @phpstan-import-type ExternalCalendarMeetingEventCreatePropertiesShape from \HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties
 *
 * @phpstan-type AdvancedCreateParamsShape = array{
 *   organizerUserID: string,
 *   associations: list<ExternalAssociationCreateRequest|ExternalAssociationCreateRequestShape>,
 *   emailReminderSchedule: ExternalEmailReminderSchedule|ExternalEmailReminderScheduleShape,
 *   properties: ExternalCalendarMeetingEventCreateProperties|ExternalCalendarMeetingEventCreatePropertiesShape,
 *   timezone: string,
 * }
 */
final class AdvancedCreateParams implements BaseModel
{
    /** @use SdkModel<AdvancedCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $organizerUserID;

    /** @var list<ExternalAssociationCreateRequest> $associations */
    #[Required(list: ExternalAssociationCreateRequest::class)]
    public array $associations;

    #[Required]
    public ExternalEmailReminderSchedule $emailReminderSchedule;

    #[Required]
    public ExternalCalendarMeetingEventCreateProperties $properties;

    /**
     * The timezone property that will be set on the meeting event.
     */
    #[Required]
    public string $timezone;

    /**
     * `new AdvancedCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AdvancedCreateParams::with(
     *   organizerUserID: ...,
     *   associations: ...,
     *   emailReminderSchedule: ...,
     *   properties: ...,
     *   timezone: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AdvancedCreateParams)
     *   ->withOrganizerUserID(...)
     *   ->withAssociations(...)
     *   ->withEmailReminderSchedule(...)
     *   ->withProperties(...)
     *   ->withTimezone(...)
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
     * @param list<ExternalAssociationCreateRequest|ExternalAssociationCreateRequestShape> $associations
     * @param ExternalEmailReminderSchedule|ExternalEmailReminderScheduleShape $emailReminderSchedule
     * @param ExternalCalendarMeetingEventCreateProperties|ExternalCalendarMeetingEventCreatePropertiesShape $properties
     */
    public static function with(
        string $organizerUserID,
        array $associations,
        ExternalEmailReminderSchedule|array $emailReminderSchedule,
        ExternalCalendarMeetingEventCreateProperties|array $properties,
        string $timezone,
    ): self {
        $self = new self;

        $self['organizerUserID'] = $organizerUserID;
        $self['associations'] = $associations;
        $self['emailReminderSchedule'] = $emailReminderSchedule;
        $self['properties'] = $properties;
        $self['timezone'] = $timezone;

        return $self;
    }

    public function withOrganizerUserID(string $organizerUserID): self
    {
        $self = clone $this;
        $self['organizerUserID'] = $organizerUserID;

        return $self;
    }

    /**
     * @param list<ExternalAssociationCreateRequest|ExternalAssociationCreateRequestShape> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

        return $self;
    }

    /**
     * @param ExternalEmailReminderSchedule|ExternalEmailReminderScheduleShape $emailReminderSchedule
     */
    public function withEmailReminderSchedule(
        ExternalEmailReminderSchedule|array $emailReminderSchedule
    ): self {
        $self = clone $this;
        $self['emailReminderSchedule'] = $emailReminderSchedule;

        return $self;
    }

    /**
     * @param ExternalCalendarMeetingEventCreateProperties|ExternalCalendarMeetingEventCreatePropertiesShape $properties
     */
    public function withProperties(
        ExternalCalendarMeetingEventCreateProperties|array $properties
    ): self {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The timezone property that will be set on the meeting event.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
