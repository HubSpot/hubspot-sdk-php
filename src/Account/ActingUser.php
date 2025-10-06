<?php

declare(strict_types=1);

namespace HubspotSDK\Account;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type acting_user = array{userID: int, userEmail?: string}
 */
final class ActingUser implements BaseModel
{
    /** @use SdkModel<acting_user> */
    use SdkModel;

    #[Api('userId')]
    public int $userID;

    #[Api(optional: true)]
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

        $obj->userID = $userID;

        null !== $userEmail && $obj->userEmail = $userEmail;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    public function withUserEmail(string $userEmail): self
    {
        $obj = clone $this;
        $obj->userEmail = $userEmail;

        return $obj;
    }
}
