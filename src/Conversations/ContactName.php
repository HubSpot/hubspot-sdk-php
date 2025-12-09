<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactNameShape = array{
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   middleName?: string|null,
 *   prefix?: string|null,
 *   suffix?: string|null,
 * }
 */
final class ContactName implements BaseModel
{
    /** @use SdkModel<ContactNameShape> */
    use SdkModel;

    #[Optional]
    public ?string $firstName;

    #[Optional]
    public ?string $lastName;

    #[Optional]
    public ?string $middleName;

    #[Optional]
    public ?string $prefix;

    #[Optional]
    public ?string $suffix;

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
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $middleName = null,
        ?string $prefix = null,
        ?string $suffix = null,
    ): self {
        $self = new self;

        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $middleName && $self['middleName'] = $middleName;
        null !== $prefix && $self['prefix'] = $prefix;
        null !== $suffix && $self['suffix'] = $suffix;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    public function withMiddleName(string $middleName): self
    {
        $self = clone $this;
        $self['middleName'] = $middleName;

        return $self;
    }

    public function withPrefix(string $prefix): self
    {
        $self = clone $this;
        $self['prefix'] = $prefix;

        return $self;
    }

    public function withSuffix(string $suffix): self
    {
        $self = clone $this;
        $self['suffix'] = $suffix;

        return $self;
    }
}
