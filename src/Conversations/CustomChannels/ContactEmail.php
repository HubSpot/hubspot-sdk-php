<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\ContactEmail\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactEmailShape = array{
 *   email: string, type?: null|Type|value-of<Type>
 * }
 */
final class ContactEmail implements BaseModel
{
    /** @use SdkModel<ContactEmailShape> */
    use SdkModel;

    #[Required]
    public string $email;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new ContactEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactEmail::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactEmail)->withEmail(...)
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
    public static function with(string $email, Type|string|null $type = null): self
    {
        $self = new self;

        $self['email'] = $email;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

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
