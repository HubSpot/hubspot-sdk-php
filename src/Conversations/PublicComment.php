<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicComment\Attachment;
use HubspotSDK\Conversations\PublicComment\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AttachmentShape from \HubspotSDK\Conversations\PublicComment\Attachment
 * @phpstan-import-type PublicClientShape from \HubspotSDK\Conversations\PublicClient
 * @phpstan-import-type PublicRecipientShape from \HubspotSDK\Conversations\PublicRecipient
 * @phpstan-import-type PublicSenderShape from \HubspotSDK\Conversations\PublicSender
 *
 * @phpstan-type PublicCommentShape = array{
 *   id: string,
 *   archived: bool,
 *   attachments: list<AttachmentShape>,
 *   client: PublicClient|PublicClientShape,
 *   conversationsThreadID: string,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   recipients: list<PublicRecipientShape>,
 *   richText: string,
 *   senders: list<PublicSenderShape>,
 *   text: string,
 *   type: Type|value-of<Type>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PublicComment implements BaseModel
{
    /** @use SdkModel<PublicCommentShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $archived;

    /**
     * @var list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment> $attachments
     */
    #[Required(list: Attachment::class)]
    public array $attachments;

    #[Required]
    public PublicClient $client;

    #[Required('conversationsThreadId')]
    public string $conversationsThreadID;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $createdBy;

    /** @var list<PublicRecipient> $recipients */
    #[Required(list: PublicRecipient::class)]
    public array $recipients;

    #[Required]
    public string $richText;

    /** @var list<PublicSender> $senders */
    #[Required(list: PublicSender::class)]
    public array $senders;

    #[Required]
    public string $text;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PublicComment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicComment::with(
     *   id: ...,
     *   archived: ...,
     *   attachments: ...,
     *   client: ...,
     *   conversationsThreadID: ...,
     *   createdAt: ...,
     *   createdBy: ...,
     *   recipients: ...,
     *   richText: ...,
     *   senders: ...,
     *   text: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicComment)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withAttachments(...)
     *   ->withClient(...)
     *   ->withConversationsThreadID(...)
     *   ->withCreatedAt(...)
     *   ->withCreatedBy(...)
     *   ->withRecipients(...)
     *   ->withRichText(...)
     *   ->withSenders(...)
     *   ->withText(...)
     *   ->withType(...)
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
     * @param list<AttachmentShape> $attachments
     * @param PublicClientShape $client
     * @param list<PublicRecipientShape> $recipients
     * @param list<PublicSenderShape> $senders
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        bool $archived,
        array $attachments,
        PublicClient|array $client,
        string $conversationsThreadID,
        \DateTimeInterface $createdAt,
        string $createdBy,
        array $recipients,
        string $richText,
        array $senders,
        string $text,
        Type|string $type = 'COMMENT',
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['attachments'] = $attachments;
        $self['client'] = $client;
        $self['conversationsThreadID'] = $conversationsThreadID;
        $self['createdAt'] = $createdAt;
        $self['createdBy'] = $createdBy;
        $self['recipients'] = $recipients;
        $self['richText'] = $richText;
        $self['senders'] = $senders;
        $self['text'] = $text;
        $self['type'] = $type;

        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param list<AttachmentShape> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $self = clone $this;
        $self['attachments'] = $attachments;

        return $self;
    }

    /**
     * @param PublicClientShape $client
     */
    public function withClient(PublicClient|array $client): self
    {
        $self = clone $this;
        $self['client'] = $client;

        return $self;
    }

    public function withConversationsThreadID(
        string $conversationsThreadID
    ): self {
        $self = clone $this;
        $self['conversationsThreadID'] = $conversationsThreadID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreatedBy(string $createdBy): self
    {
        $self = clone $this;
        $self['createdBy'] = $createdBy;

        return $self;
    }

    /**
     * @param list<PublicRecipientShape> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $self = clone $this;
        $self['recipients'] = $recipients;

        return $self;
    }

    public function withRichText(string $richText): self
    {
        $self = clone $this;
        $self['richText'] = $richText;

        return $self;
    }

    /**
     * @param list<PublicSenderShape> $senders
     */
    public function withSenders(array $senders): self
    {
        $self = clone $this;
        $self['senders'] = $senders;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
