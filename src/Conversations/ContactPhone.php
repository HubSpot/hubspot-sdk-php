<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ContactPhone\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactPhoneShape = array{
 *   phone: string, type?: null|Type|value-of<Type>
 * }
 */
final class ContactPhone implements BaseModel
{
    /** @use SdkModel<ContactPhoneShape> */
    use SdkModel;

    #[Required]
    public string $phone;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new ContactPhone()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactPhone::with(phone: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactPhone)->withPhone(...)
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
     * @param Type|value-of<Type>|null $type
     */
    public static function with(string $phone, Type|string|null $type = null): self
    {
        $self = new self;

        $self['phone'] = $phone;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withPhone(string $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
