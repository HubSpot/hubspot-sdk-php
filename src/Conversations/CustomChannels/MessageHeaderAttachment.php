<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\MessageHeaderAttachment\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type message_header_attachment = array{
 *   type: value-of<Type>, fileID?: int, text?: string
 * }
 */
final class MessageHeaderAttachment implements BaseModel
{
    /** @use SdkModel<message_header_attachment> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api('fileId', optional: true)]
    public ?int $fileID;

    #[Api(optional: true)]
    public ?string $text;

    /**
     * `new MessageHeaderAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageHeaderAttachment::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageHeaderAttachment)->withType(...)
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
        $obj = new self;

        $obj['type'] = $type;

        null !== $fileID && $obj->fileID = $fileID;
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
        $obj->fileID = $fileID;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
