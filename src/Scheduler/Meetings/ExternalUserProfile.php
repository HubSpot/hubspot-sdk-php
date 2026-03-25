<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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

    /**
     * The email address of the user.
     */
    #[Required]
    public string $email;

    /**
     * The first name of the user.
     */
    #[Optional]
    public ?string $firstName;

    /**
     * The full name of the user.
     */
    #[Optional]
    public ?string $fullName;

    /**
     * The last name of the user.
     */
    #[Optional]
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
        $self = new self;

        $self['email'] = $email;

        null !== $firstName && $self['firstName'] = $firstName;
        null !== $fullName && $self['fullName'] = $fullName;
        null !== $lastName && $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * The email address of the user.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The first name of the user.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The full name of the user.
     */
    public function withFullName(string $fullName): self
    {
        $self = clone $this;
        $self['fullName'] = $fullName;

        return $self;
    }

    /**
     * The last name of the user.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }
}
