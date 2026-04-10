<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling\Transcripts;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SpeakerShape = array{
 *   id: string, name: string, email?: string|null
 * }
 */
final class Speaker implements BaseModel
{
    /** @use SdkModel<SpeakerShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $name;

    #[Optional]
    public ?string $email;

    /**
     * `new Speaker()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Speaker::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Speaker)->withID(...)->withName(...)
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
     */
    public static function with(
        string $id,
        string $name,
        ?string $email = null
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;

        null !== $email && $self['email'] = $email;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }
}
