<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\EmailActor\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailActorShape = array{
 *   id: string, email: string, type: Type|value-of<Type>
 * }
 */
final class EmailActor implements BaseModel
{
    /** @use SdkModel<EmailActorShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $email;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new EmailActor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailActor::with(id: ..., email: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailActor)->withID(...)->withEmail(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        string $email,
        Type|string $type = 'EMAIL'
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['email'] = $email;
        $self['type'] = $type;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
