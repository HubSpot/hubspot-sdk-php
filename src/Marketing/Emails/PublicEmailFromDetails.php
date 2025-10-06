<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_email_from_details = array{
 *   customReplyTo?: string, fromName?: string, replyTo?: string
 * }
 */
final class PublicEmailFromDetails implements BaseModel
{
    /** @use SdkModel<public_email_from_details> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $customReplyTo;

    #[Api(optional: true)]
    public ?string $fromName;

    #[Api(optional: true)]
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

        null !== $customReplyTo && $obj->customReplyTo = $customReplyTo;
        null !== $fromName && $obj->fromName = $fromName;
        null !== $replyTo && $obj->replyTo = $replyTo;

        return $obj;
    }

    public function withCustomReplyTo(string $customReplyTo): self
    {
        $obj = clone $this;
        $obj->customReplyTo = $customReplyTo;

        return $obj;
    }

    public function withFromName(string $fromName): self
    {
        $obj = clone $this;
        $obj->fromName = $fromName;

        return $obj;
    }

    public function withReplyTo(string $replyTo): self
    {
        $obj = clone $this;
        $obj->replyTo = $replyTo;

        return $obj;
    }
}
