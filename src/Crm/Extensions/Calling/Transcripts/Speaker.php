<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
        $obj = new self;

        $obj['id'] = $id;
        $obj['name'] = $name;

        null !== $email && $obj['email'] = $email;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }
}
