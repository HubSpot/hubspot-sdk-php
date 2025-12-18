<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailSettingsResponseShape from \HubspotSDK\Automation\Sequences\EmailSettingsResponse
 * @phpstan-import-type MeetingSettingsResponseShape from \HubspotSDK\Automation\Sequences\MeetingSettingsResponse
 *
 * @phpstan-type UnenrollmentSettingsResponseShape = array{
 *   emailSettings: EmailSettingsResponse|EmailSettingsResponseShape,
 *   meetingSettings: MeetingSettingsResponse|MeetingSettingsResponseShape,
 * }
 */
final class UnenrollmentSettingsResponse implements BaseModel
{
    /** @use SdkModel<UnenrollmentSettingsResponseShape> */
    use SdkModel;

    #[Required]
    public EmailSettingsResponse $emailSettings;

    #[Required]
    public MeetingSettingsResponse $meetingSettings;

    /**
     * `new UnenrollmentSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnenrollmentSettingsResponse::with(emailSettings: ..., meetingSettings: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnenrollmentSettingsResponse)
     *   ->withEmailSettings(...)
     *   ->withMeetingSettings(...)
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
     * @param EmailSettingsResponse|EmailSettingsResponseShape $emailSettings
     * @param MeetingSettingsResponse|MeetingSettingsResponseShape $meetingSettings
     */
    public static function with(
        EmailSettingsResponse|array $emailSettings,
        MeetingSettingsResponse|array $meetingSettings,
    ): self {
        $self = new self;

        $self['emailSettings'] = $emailSettings;
        $self['meetingSettings'] = $meetingSettings;

        return $self;
    }

    /**
     * @param EmailSettingsResponse|EmailSettingsResponseShape $emailSettings
     */
    public function withEmailSettings(
        EmailSettingsResponse|array $emailSettings
    ): self {
        $self = clone $this;
        $self['emailSettings'] = $emailSettings;

        return $self;
    }

    /**
     * @param MeetingSettingsResponse|MeetingSettingsResponseShape $meetingSettings
     */
    public function withMeetingSettings(
        MeetingSettingsResponse|array $meetingSettings
    ): self {
        $self = clone $this;
        $self['meetingSettings'] = $meetingSettings;

        return $self;
    }
}
