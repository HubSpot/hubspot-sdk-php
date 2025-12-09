<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicMessageHeader\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMessageHeaderShape = array{
 *   type: value-of<Type>, fileID?: int|null, text?: string|null
 * }
 */
final class PublicMessageHeader implements BaseModel
{
    /** @use SdkModel<PublicMessageHeaderShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional('fileId')]
    public ?int $fileID;

    #[Optional]
    public ?string $text;

    /**
     * `new PublicMessageHeader()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicMessageHeader::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicMessageHeader)->withType(...)
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
        Type|string $type = 'MESSAGE_HEADER',
        ?int $fileID = null,
        ?string $text = null,
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $fileID && $self['fileID'] = $fileID;
        null !== $text && $self['text'] = $text;

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

    public function withFileID(int $fileID): self
    {
        $self = clone $this;
        $self['fileID'] = $fileID;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
