<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\BotActor\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BotActorShape = array{
 *   id: string, type: value-of<Type>, avatar?: string|null, name?: string|null
 * }
 */
final class BotActor implements BaseModel
{
    /** @use SdkModel<BotActorShape> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $avatar;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new BotActor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BotActor::with(id: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BotActor)->withID(...)->withType(...)
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
        Type|string $type = 'BOT',
        ?string $avatar = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['type'] = $type;

        null !== $avatar && $obj['avatar'] = $avatar;
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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
