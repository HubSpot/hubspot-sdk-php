<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\EmailActor\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailActorShape = array{
 *   id: string, email: string, type: value-of<Type>
 * }
 */
final class EmailActor implements BaseModel
{
    /** @use SdkModel<EmailActorShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $email;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->email = $email;
        $obj['type'] = $type;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
