<?php

declare(strict_types=1);

namespace HubSpotSDK\Account\Activity;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActingUserShape = array{userID: int, userEmail?: string|null}
 */
final class ActingUser implements BaseModel
{
    /** @use SdkModel<ActingUserShape> */
    use SdkModel;

    /**
     * The user's unique ID.
     */
    #[Required('userId')]
    public int $userID;

    /**
     * The email address of the user who performed the action.
     */
    #[Optional]
    public ?string $userEmail;

    /**
     * `new ActingUser()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActingUser::with(userID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActingUser)->withUserID(...)
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
    public static function with(int $userID, ?string $userEmail = null): self
    {
        $self = new self;

        $self['userID'] = $userID;

        null !== $userEmail && $self['userEmail'] = $userEmail;

        return $self;
    }

    /**
     * The user's unique ID.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * The email address of the user who performed the action.
     */
    public function withUserEmail(string $userEmail): self
    {
        $self = clone $this;
        $self['userEmail'] = $userEmail;

        return $self;
    }
}
