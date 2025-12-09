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
        $obj = new self;

        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $middleName && $obj['middleName'] = $middleName;
        null !== $prefix && $obj['prefix'] = $prefix;
        null !== $suffix && $obj['suffix'] = $suffix;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    public function withMiddleName(string $middleName): self
    {
        $obj = clone $this;
        $obj['middleName'] = $middleName;

        return $obj;
    }

    public function withPrefix(string $prefix): self
    {
        $obj = clone $this;
        $obj['prefix'] = $prefix;

        return $obj;
    }

    public function withSuffix(string $suffix): self
    {
        $obj = clone $this;
        $obj['suffix'] = $suffix;

        return $obj;
    }
}
