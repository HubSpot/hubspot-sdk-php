<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\VisitorActor\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type VisitorActorShape = array{
 *   id: string,
 *   type: value-of<Type>,
 *   avatar?: string|null,
 *   email?: string|null,
 *   name?: string|null,
 * }
 */
final class VisitorActor implements BaseModel
{
    /** @use SdkModel<VisitorActorShape> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $avatar;

    #[Api(optional: true)]
    public ?string $email;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new VisitorActor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VisitorActor::with(id: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VisitorActor)->withID(...)->withType(...)
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
        Type|string $type = 'VISITOR',
        ?string $avatar = null,
        ?string $email = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['type'] = $type;

        null !== $avatar && $obj['avatar'] = $avatar;
        null !== $email && $obj['email'] = $email;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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

    public function withAvatar(string $avatar): self
    {
        $obj = clone $this;
        $obj['avatar'] = $avatar;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
