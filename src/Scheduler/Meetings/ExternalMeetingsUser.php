<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalMeetingsUserShape = array{
 *   id: string,
 *   calendarProvider: string,
 *   isSalesStarter: bool,
 *   userID: string,
 *   userProfile: ExternalUserProfile,
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
     * @param ExternalUserProfile|array{
     *   email: string,
     *   firstName?: string|null,
     *   fullName?: string|null,
     *   lastName?: string|null,
     * } $userProfile
     */
    public static function with(
        string $id,
        string $calendarProvider,
        bool $isSalesStarter,
        string $userID,
        ExternalUserProfile|array $userProfile,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['calendarProvider'] = $calendarProvider;
        $obj['isSalesStarter'] = $isSalesStarter;
        $obj['userID'] = $userID;
        $obj['userProfile'] = $userProfile;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCalendarProvider(string $calendarProvider): self
    {
        $obj = clone $this;
        $obj['calendarProvider'] = $calendarProvider;

        return $obj;
    }

    public function withIsSalesStarter(bool $isSalesStarter): self
    {
        $obj = clone $this;
        $obj['isSalesStarter'] = $isSalesStarter;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * @param ExternalUserProfile|array{
     *   email: string,
     *   firstName?: string|null,
     *   fullName?: string|null,
     *   lastName?: string|null,
     * } $userProfile
     */
    public function withUserProfile(
        ExternalUserProfile|array $userProfile
    ): self {
        $obj = clone $this;
        $obj['userProfile'] = $userProfile;

        return $obj;
    }
}
