<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActingUserShape = array{userID: int, userEmail?: string|null}
 */
final class ActingUser implements BaseModel
{
    /** @use SdkModel<ActingUserShape> */
    use SdkModel;

    /**
     * The ID of the user who performed the action.
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
        $obj = new self;

        $obj['userID'] = $userID;

        null !== $userEmail && $obj['userEmail'] = $userEmail;

        return $obj;
    }

    /**
     * The ID of the user who performed the action.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * The email address of the user who performed the action.
     */
    public function withUserEmail(string $userEmail): self
    {
        $obj = clone $this;
        $obj['userEmail'] = $userEmail;

        return $obj;
    }
}
