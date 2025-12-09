<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMessageContentShape = array{
 *   richText?: string|null, text?: string|null
 * }
 */
final class PublicMessageContent implements BaseModel
{
    /** @use SdkModel<PublicMessageContentShape> */
    use SdkModel;

    #[Optional]
    public ?string $richText;

    #[Optional]
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
        $self = new self;

        null !== $richText && $self['richText'] = $richText;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withRichText(string $richText): self
    {
        $self = clone $this;
        $self['richText'] = $richText;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
