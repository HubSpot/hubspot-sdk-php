<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Automation\Sequences\EmailSettingsResponse\Criteria;
use HubspotSDK\Automation\Sequences\EmailSettingsResponse\SellingStrategy;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnenrollmentSettingsResponseShape = array{
 *   emailSettings: EmailSettingsResponse, meetingSettings: MeetingSettingsResponse
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
     * @param EmailSettingsResponse|array{
     *   criteria: value-of<Criteria>, sellingStrategy: value-of<SellingStrategy>
     * } $emailSettings
     * @param MeetingSettingsResponse|array{
     *   criteria: value-of<MeetingSettingsResponse\Criteria>,
     *   sellingStrategy: value-of<MeetingSettingsResponse\SellingStrategy>,
     * } $meetingSettings
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
     * @param EmailSettingsResponse|array{
     *   criteria: value-of<Criteria>, sellingStrategy: value-of<SellingStrategy>
     * } $emailSettings
     */
    public function withEmailSettings(
        EmailSettingsResponse|array $emailSettings
    ): self {
        $self = clone $this;
        $self['emailSettings'] = $emailSettings;

        return $self;
    }

    /**
     * @param MeetingSettingsResponse|array{
     *   criteria: value-of<MeetingSettingsResponse\Criteria>,
     *   sellingStrategy: value-of<MeetingSettingsResponse\SellingStrategy>,
     * } $meetingSettings
     */
    public function withMeetingSettings(
        MeetingSettingsResponse|array $meetingSettings
    ): self {
        $self = clone $this;
        $self['meetingSettings'] = $meetingSettings;

        return $self;
    }
}
