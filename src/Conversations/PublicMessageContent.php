<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_message_content = array{richText?: string, text?: string}
 */
final class PublicMessageContent implements BaseModel
{
    /** @use SdkModel<public_message_content> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $richText;

    #[Api(optional: true)]
    public ?string $text;

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
        ?string $richText = null,
        ?string $text = null
    ): self {
        $obj = new self;

        null !== $richText && $obj->richText = $richText;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj->richText = $richText;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
