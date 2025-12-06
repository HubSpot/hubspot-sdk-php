<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Automation\Sequences\EmailSettingsResponse\Criteria;
use HubspotSDK\Automation\Sequences\EmailSettingsResponse\SellingStrategy;
use HubspotSDK\Core\Attributes\Api;
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
        $obj = new self;

        $obj['emailSettings'] = $emailSettings;
        $obj['meetingSettings'] = $meetingSettings;

        return $obj;
    }

    /**
     * @param EmailSettingsResponse|array{
     *   criteria: value-of<Criteria>, sellingStrategy: value-of<SellingStrategy>
     * } $emailSettings
     */
    public function withEmailSettings(
        EmailSettingsResponse|array $emailSettings
    ): self {
        $obj = clone $this;
        $obj['emailSettings'] = $emailSettings;

        return $obj;
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
        $obj = clone $this;
        $obj['meetingSettings'] = $meetingSettings;

        return $obj;
    }
}
