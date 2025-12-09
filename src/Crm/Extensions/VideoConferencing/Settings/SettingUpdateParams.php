<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\VideoConferencing\Settings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Extensions\VideoConferencing\SettingsService::update()
 *
 * @phpstan-type SettingUpdateParamsShape = array{
 *   createMeetingURL: string,
 *   deleteMeetingURL?: string,
 *   fetchAccountsUri?: string,
 *   updateMeetingURL?: string,
 *   userVerifyURL?: string,
 * }
 */
final class SettingUpdateParams implements BaseModel
{
    /** @use SdkModel<SettingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL that HubSpot will send requests to create a new video conference.
     */
    #[Required('createMeetingUrl')]
    public string $createMeetingURL;

    /**
     * The URL that HubSpot will send notifications of meetings that have been deleted in HubSpot.
     */
    #[Optional('deleteMeetingUrl')]
    public ?string $deleteMeetingURL;

    #[Optional]
    public ?string $fetchAccountsUri;

    /**
     * The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     */
    #[Optional('updateMeetingUrl')]
    public ?string $updateMeetingURL;

    /**
     * The URL that HubSpot will use to verify that a user exists in the video conference application.
     */
    #[Optional('userVerifyUrl')]
    public ?string $userVerifyURL;

    /**
     * `new SettingUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingUpdateParams::with(createMeetingURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingUpdateParams)->withCreateMeetingURL(...)
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
        string $createMeetingURL,
        ?string $deleteMeetingURL = null,
        ?string $fetchAccountsUri = null,
        ?string $updateMeetingURL = null,
        ?string $userVerifyURL = null,
    ): self {
        $self = new self;

        $self['createMeetingURL'] = $createMeetingURL;

        null !== $deleteMeetingURL && $self['deleteMeetingURL'] = $deleteMeetingURL;
        null !== $fetchAccountsUri && $self['fetchAccountsUri'] = $fetchAccountsUri;
        null !== $updateMeetingURL && $self['updateMeetingURL'] = $updateMeetingURL;
        null !== $userVerifyURL && $self['userVerifyURL'] = $userVerifyURL;

        return $self;
    }

    /**
     * The URL that HubSpot will send requests to create a new video conference.
     */
    public function withCreateMeetingURL(string $createMeetingURL): self
    {
        $self = clone $this;
        $self['createMeetingURL'] = $createMeetingURL;

        return $self;
    }

    /**
     * The URL that HubSpot will send notifications of meetings that have been deleted in HubSpot.
     */
    public function withDeleteMeetingURL(string $deleteMeetingURL): self
    {
        $self = clone $this;
        $self['deleteMeetingURL'] = $deleteMeetingURL;

        return $self;
    }

    public function withFetchAccountsUri(string $fetchAccountsUri): self
    {
        $self = clone $this;
        $self['fetchAccountsUri'] = $fetchAccountsUri;

        return $self;
    }

    /**
     * The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     */
    public function withUpdateMeetingURL(string $updateMeetingURL): self
    {
        $self = clone $this;
        $self['updateMeetingURL'] = $updateMeetingURL;

        return $self;
    }

    /**
     * The URL that HubSpot will use to verify that a user exists in the video conference application.
     */
    public function withUserVerifyURL(string $userVerifyURL): self
    {
        $self = clone $this;
        $self['userVerifyURL'] = $userVerifyURL;

        return $self;
    }
}
