<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\IntegratorActor\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegratorActorShape = array{
 *   id: string, name: string, type: value-of<Type>, avatar?: string
 * }
 */
final class IntegratorActor implements BaseModel
{
    /** @use SdkModel<IntegratorActorShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $name;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $avatar;

    /**
     * `new IntegratorActor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorActor::with(id: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorActor)->withID(...)->withName(...)->withType(...)
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
        string $name,
        Type|string $type = 'INTEGRATOR',
        ?string $avatar = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;
        $obj['type'] = $type;

        null !== $avatar && $obj->avatar = $avatar;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
        $obj->avatar = $avatar;

        return $obj;
    }
}
