<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type unenrollment_settings_response = array{
 *   emailSettings: EmailSettingsResponse, meetingSettings: MeetingSettingsResponse
 * }
 */
final class UnenrollmentSettingsResponse implements BaseModel
{
    /** @use SdkModel<unenrollment_settings_response> */
    use SdkModel;

    #[Api]
    public EmailSettingsResponse $emailSettings;

    #[Api]
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
     */
    public static function with(
        EmailSettingsResponse $emailSettings,
        MeetingSettingsResponse $meetingSettings,
    ): self {
        $obj = new self;

        $obj->emailSettings = $emailSettings;
        $obj->meetingSettings = $meetingSettings;

        return $obj;
    }

    public function withEmailSettings(
        EmailSettingsResponse $emailSettings
    ): self {
        $obj = clone $this;
        $obj->emailSettings = $emailSettings;

        return $obj;
    }

    public function withMeetingSettings(
        MeetingSettingsResponse $meetingSettings
    ): self {
        $obj = clone $this;
        $obj->meetingSettings = $meetingSettings;

        return $obj;
    }
}
