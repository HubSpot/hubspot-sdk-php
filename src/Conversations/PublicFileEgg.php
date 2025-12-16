<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicFileEgg\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicFileEggShape = array{
 *   fileID: string, type: Type|value-of<Type>
 * }
 */
final class PublicFileEgg implements BaseModel
{
    /** @use SdkModel<PublicFileEggShape> */
    use SdkModel;

    #[Required('fileId')]
    public string $fileID;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicFileEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicFileEgg::with(fileID: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicFileEgg)->withFileID(...)->withType(...)
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
        string $fileID,
        Type|string $type = 'FILE'
    ): self {
        $self = new self;

        $self['fileID'] = $fileID;
        $self['type'] = $type;

        return $self;
    }

    public function withFileID(string $fileID): self
    {
        $self = clone $this;
        $self['fileID'] = $fileID;

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
