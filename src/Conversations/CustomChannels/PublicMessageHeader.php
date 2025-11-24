<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicMessageHeader\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMessageHeaderShape = array{
 *   type: value-of<Type>, fileId?: int|null, text?: string|null
 * }
 */
final class PublicMessageHeader implements BaseModel
{
    /** @use SdkModel<PublicMessageHeaderShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?int $fileId;

    #[Api(optional: true)]
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
        ?int $fileId = null,
        ?string $text = null,
    ): self {
        $obj = new self;

        $obj['type'] = $type;

        null !== $fileId && $obj->fileId = $fileId;
        null !== $text && $obj->text = $text;

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

    public function withFileID(int $fileID): self
    {
        $obj = clone $this;
        $obj->fileId = $fileID;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
