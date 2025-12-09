<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\UnsupportedContentAttachment\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnsupportedContentAttachmentShape = array{type: value-of<Type>}
 */
final class UnsupportedContentAttachment implements BaseModel
{
    /** @use SdkModel<UnsupportedContentAttachmentShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new UnsupportedContentAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnsupportedContentAttachment::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnsupportedContentAttachment)->withType(...)
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
    public static function with(Type|string $type = 'UNSUPPORTED_CONTENT'): self
    {
        $obj = new self;

        $obj['type'] = $type;

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
