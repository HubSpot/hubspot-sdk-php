<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Data structure representing the from fields on the email.
 *
 * @phpstan-type PublicEmailFromDetailsShape = array{
 *   customReplyTo?: string|null, fromName?: string|null, replyTo?: string|null
 * }
 */
final class PublicEmailFromDetails implements BaseModel
{
    /** @use SdkModel<PublicEmailFromDetailsShape> */
    use SdkModel;

    /**
     * The reply to recipients will see.
     */
    #[Optional]
    public ?string $customReplyTo;

    /**
     * The name recipients will see.
     */
    #[Optional]
    public ?string $fromName;

    /**
     * The from address and reply to email address (if no customReplyTo defined) recipients will see.
     */
    #[Optional]
    public ?string $replyTo;

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
        ?string $customReplyTo = null,
        ?string $fromName = null,
        ?string $replyTo = null,
    ): self {
        $obj = new self;

        null !== $customReplyTo && $obj['customReplyTo'] = $customReplyTo;
        null !== $fromName && $obj['fromName'] = $fromName;
        null !== $replyTo && $obj['replyTo'] = $replyTo;

        return $obj;
    }

    /**
     * The reply to recipients will see.
     */
    public function withCustomReplyTo(string $customReplyTo): self
    {
        $obj = clone $this;
        $obj['customReplyTo'] = $customReplyTo;

        return $obj;
    }

    /**
     * The name recipients will see.
     */
    public function withFromName(string $fromName): self
    {
        $obj = clone $this;
        $obj['fromName'] = $fromName;

        return $obj;
    }

    /**
     * The from address and reply to email address (if no customReplyTo defined) recipients will see.
     */
    public function withReplyTo(string $replyTo): self
    {
        $obj = clone $this;
        $obj['replyTo'] = $replyTo;

        return $obj;
    }
}
