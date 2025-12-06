<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicFileEgg\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicFileEggShape = array{fileId: string, type: value-of<Type>}
 */
final class PublicFileEgg implements BaseModel
{
    /** @use SdkModel<PublicFileEggShape> */
    use SdkModel;

    #[Api]
    public string $fileId;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new PublicFileEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicFileEgg::with(fileId: ..., type: ...)
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
        string $fileId,
        Type|string $type = 'FILE'
    ): self {
        $obj = new self;

        $obj['fileId'] = $fileId;
        $obj['type'] = $type;

        return $obj;
    }

    public function withFileID(string $fileID): self
    {
        $obj = clone $this;
        $obj['fileId'] = $fileID;

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
