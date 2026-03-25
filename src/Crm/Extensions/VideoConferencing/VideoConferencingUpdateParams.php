<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\VideoConferencing;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Extensions\VideoConferencingService::update()
 *
 * @phpstan-type VideoConferencingUpdateParamsShape = array{
 *   createMeetingURL: string,
 *   deleteMeetingURL?: string|null,
 *   fetchAccountsUri?: string|null,
 *   updateMeetingURL?: string|null,
 *   userVerifyURL?: string|null,
 * }
 */
final class VideoConferencingUpdateParams implements BaseModel
{
    /** @use SdkModel<VideoConferencingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('createMeetingUrl')]
    public string $createMeetingURL;

    #[Optional('deleteMeetingUrl')]
    public ?string $deleteMeetingURL;

    #[Optional]
    public ?string $fetchAccountsUri;

    #[Optional('updateMeetingUrl')]
    public ?string $updateMeetingURL;

    #[Optional('userVerifyUrl')]
    public ?string $userVerifyURL;

    /**
     * `new VideoConferencingUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VideoConferencingUpdateParams::with(createMeetingURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VideoConferencingUpdateParams)->withCreateMeetingURL(...)
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

    public function withCreateMeetingURL(string $createMeetingURL): self
    {
        $self = clone $this;
        $self['createMeetingURL'] = $createMeetingURL;

        return $self;
    }

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

    public function withUpdateMeetingURL(string $updateMeetingURL): self
    {
        $self = clone $this;
        $self['updateMeetingURL'] = $updateMeetingURL;

        return $self;
    }

    public function withUserVerifyURL(string $userVerifyURL): self
    {
        $self = clone $this;
        $self['userVerifyURL'] = $userVerifyURL;

        return $self;
    }
}
