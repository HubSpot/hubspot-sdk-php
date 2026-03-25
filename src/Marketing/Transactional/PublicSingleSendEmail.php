<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSingleSendEmailShape = array{
 *   bcc: list<string>,
 *   cc: list<string>,
 *   replyTo: list<string>,
 *   from?: string|null,
 *   sendID?: string|null,
 *   to?: string|null,
 * }
 */
final class PublicSingleSendEmail implements BaseModel
{
    /** @use SdkModel<PublicSingleSendEmailShape> */
    use SdkModel;

    /**
     * List of email addresses to send as Bcc.
     *
     * @var list<string> $bcc
     */
    #[Required(list: 'string')]
    public array $bcc;

    /**
     * List of email addresses to send as Cc.
     *
     * @var list<string> $cc
     */
    #[Required(list: 'string')]
    public array $cc;

    /**
     * List of Reply-To header values for the email.
     *
     * @var list<string> $replyTo
     */
    #[Required(list: 'string')]
    public array $replyTo;

    /**
     * The From header for the email.
     */
    #[Optional]
    public ?string $from;

    /**
     * ID for a particular send. No more than one email will be sent per sendId.
     */
    #[Optional('sendId')]
    public ?string $sendID;

    /**
     * The recipient of the email.
     */
    #[Optional]
    public ?string $to;

    /**
     * `new PublicSingleSendEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSingleSendEmail::with(bcc: ..., cc: ..., replyTo: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSingleSendEmail)->withBcc(...)->withCc(...)->withReplyTo(...)
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
        array $bcc,
        array $cc,
        array $replyTo,
        ?string $from = null,
        ?string $sendID = null,
        ?string $to = null,
    ): self {
        $self = new self;

        $self['bcc'] = $bcc;
        $self['cc'] = $cc;
        $self['replyTo'] = $replyTo;

        null !== $from && $self['from'] = $from;
        null !== $sendID && $self['sendID'] = $sendID;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * List of email addresses to send as Bcc.
     *
     * @param list<string> $bcc
     */
    public function withBcc(array $bcc): self
    {
        $self = clone $this;
        $self['bcc'] = $bcc;

        return $self;
    }

    /**
     * List of email addresses to send as Cc.
     *
     * @param list<string> $cc
     */
    public function withCc(array $cc): self
    {
        $self = clone $this;
        $self['cc'] = $cc;

        return $self;
    }

    /**
     * List of Reply-To header values for the email.
     *
     * @param list<string> $replyTo
     */
    public function withReplyTo(array $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    /**
     * The From header for the email.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * ID for a particular send. No more than one email will be sent per sendId.
     */
    public function withSendID(string $sendID): self
    {
        $self = clone $this;
        $self['sendID'] = $sendID;

        return $self;
    }

    /**
     * The recipient of the email.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
