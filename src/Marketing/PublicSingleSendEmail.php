<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A JSON object containing anything you want to override.
 *
 * @phpstan-type PublicSingleSendEmailShape = array{
 *   to: string,
 *   bcc?: list<string>|null,
 *   cc?: list<string>|null,
 *   from?: string|null,
 *   replyTo?: list<string>|null,
 *   sendId?: string|null,
 * }
 */
final class PublicSingleSendEmail implements BaseModel
{
    /** @use SdkModel<PublicSingleSendEmailShape> */
    use SdkModel;

    /**
     * The recipient of the email.
     */
    #[Api]
    public string $to;

    /**
     * List of email addresses to send as Bcc.
     *
     * @var list<string>|null $bcc
     */
    #[Api(list: 'string', optional: true)]
    public ?array $bcc;

    /**
     * List of email addresses to send as Cc.
     *
     * @var list<string>|null $cc
     */
    #[Api(list: 'string', optional: true)]
    public ?array $cc;

    /**
     * The From header for the email.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * List of Reply-To header values for the email.
     *
     * @var list<string>|null $replyTo
     */
    #[Api(list: 'string', optional: true)]
    public ?array $replyTo;

    /**
     * ID for a particular send. No more than one email will be sent per sendId.
     */
    #[Api(optional: true)]
    public ?string $sendId;

    /**
     * `new PublicSingleSendEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSingleSendEmail::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSingleSendEmail)->withTo(...)
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
     * @param list<string> $bcc
     * @param list<string> $cc
     * @param list<string> $replyTo
     */
    public static function with(
        string $to,
        ?array $bcc = null,
        ?array $cc = null,
        ?string $from = null,
        ?array $replyTo = null,
        ?string $sendId = null,
    ): self {
        $obj = new self;

        $obj->to = $to;

        null !== $bcc && $obj->bcc = $bcc;
        null !== $cc && $obj->cc = $cc;
        null !== $from && $obj->from = $from;
        null !== $replyTo && $obj->replyTo = $replyTo;
        null !== $sendId && $obj->sendId = $sendId;

        return $obj;
    }

    /**
     * The recipient of the email.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * List of email addresses to send as Bcc.
     *
     * @param list<string> $bcc
     */
    public function withBcc(array $bcc): self
    {
        $obj = clone $this;
        $obj->bcc = $bcc;

        return $obj;
    }

    /**
     * List of email addresses to send as Cc.
     *
     * @param list<string> $cc
     */
    public function withCc(array $cc): self
    {
        $obj = clone $this;
        $obj->cc = $cc;

        return $obj;
    }

    /**
     * The From header for the email.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * List of Reply-To header values for the email.
     *
     * @param list<string> $replyTo
     */
    public function withReplyTo(array $replyTo): self
    {
        $obj = clone $this;
        $obj->replyTo = $replyTo;

        return $obj;
    }

    /**
     * ID for a particular send. No more than one email will be sent per sendId.
     */
    public function withSendID(string $sendID): self
    {
        $obj = clone $this;
        $obj->sendId = $sendID;

        return $obj;
    }
}
