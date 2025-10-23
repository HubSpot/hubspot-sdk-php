<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Videoconferencing\Settings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Updates the settings for a video conference application with the specified ID.
 *
 * @see HubspotSDK\CRM\Extensions\Videoconferencing\Settings->update
 *
 * @phpstan-type setting_update_params = array{
 *   createMeetingURL: string,
 *   deleteMeetingURL?: string,
 *   fetchAccountsUri?: string,
 *   updateMeetingURL?: string,
 *   userVerifyURL?: string,
 * }
 */
final class SettingUpdateParams implements BaseModel
{
    /** @use SdkModel<setting_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL that HubSpot will send requests to create a new video conference.
     */
    #[Api('createMeetingUrl')]
    public string $createMeetingURL;

    /**
     * The URL that HubSpot will send notifications of meetings that have been deleted in HubSpot.
     */
    #[Api('deleteMeetingUrl', optional: true)]
    public ?string $deleteMeetingURL;

    #[Api(optional: true)]
    public ?string $fetchAccountsUri;

    /**
     * The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     */
    #[Api('updateMeetingUrl', optional: true)]
    public ?string $updateMeetingURL;

    /**
     * The URL that HubSpot will use to verify that a user exists in the video conference application.
     */
    #[Api('userVerifyUrl', optional: true)]
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
        $obj = new self;

        $obj->createMeetingURL = $createMeetingURL;

        null !== $deleteMeetingURL && $obj->deleteMeetingURL = $deleteMeetingURL;
        null !== $fetchAccountsUri && $obj->fetchAccountsUri = $fetchAccountsUri;
        null !== $updateMeetingURL && $obj->updateMeetingURL = $updateMeetingURL;
        null !== $userVerifyURL && $obj->userVerifyURL = $userVerifyURL;

        return $obj;
    }

    /**
     * The URL that HubSpot will send requests to create a new video conference.
     */
    public function withCreateMeetingURL(string $createMeetingURL): self
    {
        $obj = clone $this;
        $obj->createMeetingURL = $createMeetingURL;

        return $obj;
    }

    /**
     * The URL that HubSpot will send notifications of meetings that have been deleted in HubSpot.
     */
    public function withDeleteMeetingURL(string $deleteMeetingURL): self
    {
        $obj = clone $this;
        $obj->deleteMeetingURL = $deleteMeetingURL;

        return $obj;
    }

    public function withFetchAccountsUri(string $fetchAccountsUri): self
    {
        $obj = clone $this;
        $obj->fetchAccountsUri = $fetchAccountsUri;

        return $obj;
    }

    /**
     * The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     */
    public function withUpdateMeetingURL(string $updateMeetingURL): self
    {
        $obj = clone $this;
        $obj->updateMeetingURL = $updateMeetingURL;

        return $obj;
    }

    /**
     * The URL that HubSpot will use to verify that a user exists in the video conference application.
     */
    public function withUserVerifyURL(string $userVerifyURL): self
    {
        $obj = clone $this;
        $obj->userVerifyURL = $userVerifyURL;

        return $obj;
    }
}
