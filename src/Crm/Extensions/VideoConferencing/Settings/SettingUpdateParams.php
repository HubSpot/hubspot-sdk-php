<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\VideoConferencing\Settings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Crm\Extensions\VideoConferencing\Settings->update
 *
 * @phpstan-type SettingUpdateParamsShape = array{
 *   createMeetingUrl: string,
 *   deleteMeetingUrl?: string,
 *   fetchAccountsUri?: string,
 *   updateMeetingUrl?: string,
 *   userVerifyUrl?: string,
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
    #[Api]
    public string $createMeetingUrl;

    /**
     * The URL that HubSpot will send notifications of meetings that have been deleted in HubSpot.
     */
    #[Api(optional: true)]
    public ?string $deleteMeetingUrl;

    #[Api(optional: true)]
    public ?string $fetchAccountsUri;

    /**
     * The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     */
    #[Api(optional: true)]
    public ?string $updateMeetingUrl;

    /**
     * The URL that HubSpot will use to verify that a user exists in the video conference application.
     */
    #[Api(optional: true)]
    public ?string $userVerifyUrl;

    /**
     * `new SettingUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingUpdateParams::with(createMeetingUrl: ...)
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
        string $createMeetingUrl,
        ?string $deleteMeetingUrl = null,
        ?string $fetchAccountsUri = null,
        ?string $updateMeetingUrl = null,
        ?string $userVerifyUrl = null,
    ): self {
        $obj = new self;

        $obj->createMeetingUrl = $createMeetingUrl;

        null !== $deleteMeetingUrl && $obj->deleteMeetingUrl = $deleteMeetingUrl;
        null !== $fetchAccountsUri && $obj->fetchAccountsUri = $fetchAccountsUri;
        null !== $updateMeetingUrl && $obj->updateMeetingUrl = $updateMeetingUrl;
        null !== $userVerifyUrl && $obj->userVerifyUrl = $userVerifyUrl;

        return $obj;
    }

    /**
     * The URL that HubSpot will send requests to create a new video conference.
     */
    public function withCreateMeetingURL(string $createMeetingURL): self
    {
        $obj = clone $this;
        $obj->createMeetingUrl = $createMeetingURL;

        return $obj;
    }

    /**
     * The URL that HubSpot will send notifications of meetings that have been deleted in HubSpot.
     */
    public function withDeleteMeetingURL(string $deleteMeetingURL): self
    {
        $obj = clone $this;
        $obj->deleteMeetingUrl = $deleteMeetingURL;

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
        $obj->updateMeetingUrl = $updateMeetingURL;

        return $obj;
    }

    /**
     * The URL that HubSpot will use to verify that a user exists in the video conference application.
     */
    public function withUserVerifyURL(string $userVerifyURL): self
    {
        $obj = clone $this;
        $obj->userVerifyUrl = $userVerifyURL;

        return $obj;
    }
}
