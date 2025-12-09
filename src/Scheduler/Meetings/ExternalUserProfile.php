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

    #[Required]
    public string $email;

    #[Optional]
    public ?string $firstName;

    #[Optional]
    public ?string $fullName;

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

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withFullName(string $fullName): self
    {
        $self = clone $this;
        $self['fullName'] = $fullName;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }
}
