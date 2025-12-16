<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalUserProfileShape from \HubspotSDK\Scheduler\Meetings\ExternalUserProfile
 *
 * @phpstan-type ExternalMeetingsUserShape = array{
 *   id: string,
 *   calendarProvider: string,
 *   isSalesStarter: bool,
 *   userID: string,
 *   userProfile: ExternalUserProfile|ExternalUserProfileShape,
 * }
 */
final class ExternalMeetingsUser implements BaseModel
{
    /** @use SdkModel<ExternalMeetingsUserShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $calendarProvider;

    #[Required]
    public bool $isSalesStarter;

    #[Required('userId')]
    public string $userID;

    #[Required]
    public ExternalUserProfile $userProfile;

    /**
     * `new ExternalMeetingsUser()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalMeetingsUser::with(
     *   id: ...,
     *   calendarProvider: ...,
     *   isSalesStarter: ...,
     *   userID: ...,
     *   userProfile: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalMeetingsUser)
     *   ->withID(...)
     *   ->withCalendarProvider(...)
     *   ->withIsSalesStarter(...)
     *   ->withUserID(...)
     *   ->withUserProfile(...)
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
     * @param ExternalUserProfileShape $userProfile
     */
    public static function with(
        string $id,
        string $calendarProvider,
        bool $isSalesStarter,
        string $userID,
        ExternalUserProfile|array $userProfile,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['calendarProvider'] = $calendarProvider;
        $self['isSalesStarter'] = $isSalesStarter;
        $self['userID'] = $userID;
        $self['userProfile'] = $userProfile;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCalendarProvider(string $calendarProvider): self
    {
        $self = clone $this;
        $self['calendarProvider'] = $calendarProvider;

        return $self;
    }

    public function withIsSalesStarter(bool $isSalesStarter): self
    {
        $self = clone $this;
        $self['isSalesStarter'] = $isSalesStarter;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * @param ExternalUserProfileShape $userProfile
     */
    public function withUserProfile(
        ExternalUserProfile|array $userProfile
    ): self {
        $self = clone $this;
        $self['userProfile'] = $userProfile;

        return $self;
    }
}
