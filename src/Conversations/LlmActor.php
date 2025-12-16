<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\LlmActor\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LlmActorShape = array{
 *   id: string,
 *   type: Type|value-of<Type>,
 *   avatar?: string|null,
 *   name?: string|null,
 * }
 */
final class LlmActor implements BaseModel
{
    /** @use SdkModel<LlmActorShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $avatar;

    #[Optional]
    public ?string $name;

    /**
     * `new LlmActor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LlmActor::with(id: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LlmActor)->withID(...)->withType(...)
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
        Type|string $type = 'LLM',
        ?string $avatar = null,
        ?string $name = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['type'] = $type;

        null !== $avatar && $self['avatar'] = $avatar;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withAvatar(string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
