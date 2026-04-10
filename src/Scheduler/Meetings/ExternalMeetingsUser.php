<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Scheduler\Meetings\ExternalMeetingsUser\CalendarProvider;

/**
 * @phpstan-import-type ExternalUserProfileShape from \HubSpotSDK\Scheduler\Meetings\ExternalUserProfile
 *
 * @phpstan-type ExternalMeetingsUserShape = array{
 *   id: string,
 *   calendarProvider: CalendarProvider|value-of<CalendarProvider>,
 *   isSalesStarter: bool,
 *   userID: string,
 *   userProfile: ExternalUserProfile|ExternalUserProfileShape,
 * }
 */
final class ExternalMeetingsUser implements BaseModel
{
    /** @use SdkModel<ExternalMeetingsUserShape> */
    use SdkModel;

    /**
     * The ID for the meetings user. This value is different than the userId.
     */
    #[Required]
    public string $id;

    /**
     * The calendar provider associated with the user. Accepted values are: GOOGLE, OFFICE365, EXCHANGE, UNKNOWN.
     *
     * @var value-of<CalendarProvider> $calendarProvider
     */
    #[Required(enum: CalendarProvider::class)]
    public string $calendarProvider;

    /**
     * Whether the user has a sales starter seat.
     */
    #[Required]
    public bool $isSalesStarter;

    /**
     * The ID of the user.
     */
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
     * @param CalendarProvider|value-of<CalendarProvider> $calendarProvider
     * @param ExternalUserProfile|ExternalUserProfileShape $userProfile
     */
    public static function with(
        string $id,
        CalendarProvider|string $calendarProvider,
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

    /**
     * The ID for the meetings user. This value is different than the userId.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The calendar provider associated with the user. Accepted values are: GOOGLE, OFFICE365, EXCHANGE, UNKNOWN.
     *
     * @param CalendarProvider|value-of<CalendarProvider> $calendarProvider
     */
    public function withCalendarProvider(
        CalendarProvider|string $calendarProvider
    ): self {
        $self = clone $this;
        $self['calendarProvider'] = $calendarProvider;

        return $self;
    }

    /**
     * Whether the user has a sales starter seat.
     */
    public function withIsSalesStarter(bool $isSalesStarter): self
    {
        $self = clone $this;
        $self['isSalesStarter'] = $isSalesStarter;

        return $self;
    }

    /**
     * The ID of the user.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * @param ExternalUserProfile|ExternalUserProfileShape $userProfile
     */
    public function withUserProfile(
        ExternalUserProfile|array $userProfile
    ): self {
        $self = clone $this;
        $self['userProfile'] = $userProfile;

        return $self;
    }
}
