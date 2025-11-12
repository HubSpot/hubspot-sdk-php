<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalUserProfileShape = array{
 *   email: string,
 *   firstName?: string|null,
 *   fullName?: string|null,
 *   lastName?: string|null,
 * }
 */
final class ExternalUserProfile implements BaseModel
{
    /** @use SdkModel<ExternalUserProfileShape> */
    use SdkModel;

    #[Api]
    public string $email;

    #[Api(optional: true)]
    public ?string $firstName;

    #[Api(optional: true)]
    public ?string $fullName;

    #[Api(optional: true)]
    public ?string $lastName;

    /**
     * `new ExternalUserProfile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalUserProfile::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalUserProfile)->withEmail(...)
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
        string $email,
        ?string $firstName = null,
        ?string $fullName = null,
        ?string $lastName = null,
    ): self {
        $obj = new self;

        $obj->email = $email;

        null !== $firstName && $obj->firstName = $firstName;
        null !== $fullName && $obj->fullName = $fullName;
        null !== $lastName && $obj->lastName = $lastName;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    public function withFullName(string $fullName): self
    {
        $obj = clone $this;
        $obj->fullName = $fullName;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }
}
