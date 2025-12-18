<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Attachment;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Direction;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\TruncationStatus;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AttachmentShape from \HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Attachment
 * @phpstan-import-type PublicClientShape from \HubspotSDK\Conversations\PublicClient
 * @phpstan-import-type PublicRecipientShape from \HubspotSDK\Conversations\PublicRecipient
 * @phpstan-import-type PublicSenderShape from \HubspotSDK\Conversations\PublicSender
 * @phpstan-import-type PublicMessageStatusShape from \HubspotSDK\Conversations\PublicMessageStatus
 *
 * @phpstan-type ConversationsPublicConversationsMessageShape = array{
 *   id: string,
 *   archived: bool,
 *   attachments: list<AttachmentShape>,
 *   channelAccountID: string,
 *   channelID: string,
 *   client: PublicClient|PublicClientShape,
 *   conversationsThreadID: string,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   direction: Direction|value-of<Direction>,
 *   recipients: list<PublicRecipientShape>,
 *   senders: list<PublicSenderShape>,
 *   text: string,
 *   truncationStatus: TruncationStatus|value-of<TruncationStatus>,
 *   type: Type|value-of<Type>,
 *   inReplyToID?: string|null,
 *   richText?: string|null,
 *   status?: null|PublicMessageStatus|PublicMessageStatusShape,
 *   subject?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class ConversationsPublicConversationsMessage implements BaseModel
{
    /** @use SdkModel<ConversationsPublicConversationsMessageShape> */
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

    #[Required('channelAccountId')]
    public string $channelAccountID;

    #[Required('channelId')]
    public string $channelID;

    #[Required]
    public PublicClient $client;

    #[Required('conversationsThreadId')]
    public string $conversationsThreadID;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $createdBy;

    /** @var value-of<Direction> $direction */
    #[Required(enum: Direction::class)]
    public string $direction;

    /** @var list<PublicRecipient> $recipients */
    #[Required(list: PublicRecipient::class)]
    public array $recipients;

    /** @var list<PublicSender> $senders */
    #[Required(list: PublicSender::class)]
    public array $senders;

    #[Required]
    public string $text;

    /** @var value-of<TruncationStatus> $truncationStatus */
    #[Required(enum: TruncationStatus::class)]
    public string $truncationStatus;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional('inReplyToId')]
    public ?string $inReplyToID;

    #[Optional]
    public ?string $richText;

    #[Optional]
    public ?PublicMessageStatus $status;

    #[Optional]
    public ?string $subject;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new ConversationsPublicConversationsMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationsPublicConversationsMessage::with(
     *   id: ...,
     *   archived: ...,
     *   attachments: ...,
     *   channelAccountID: ...,
     *   channelID: ...,
     *   client: ...,
     *   conversationsThreadID: ...,
     *   createdAt: ...,
     *   createdBy: ...,
     *   direction: ...,
     *   recipients: ...,
     *   senders: ...,
     *   text: ...,
     *   truncationStatus: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationsPublicConversationsMessage)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withAttachments(...)
     *   ->withChannelAccountID(...)
     *   ->withChannelID(...)
     *   ->withClient(...)
     *   ->withConversationsThreadID(...)
     *   ->withCreatedAt(...)
     *   ->withCreatedBy(...)
     *   ->withDirection(...)
     *   ->withRecipients(...)
     *   ->withSenders(...)
     *   ->withText(...)
     *   ->withTruncationStatus(...)
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
     * @param PublicClient|PublicClientShape $client
     * @param Direction|value-of<Direction> $direction
     * @param list<PublicRecipientShape> $recipients
     * @param list<PublicSenderShape> $senders
     * @param TruncationStatus|value-of<TruncationStatus> $truncationStatus
     * @param Type|value-of<Type> $type
     * @param PublicMessageStatus|PublicMessageStatusShape|null $status
     */
    public static function with(
        string $id,
        bool $archived,
        array $attachments,
        string $channelAccountID,
        string $channelID,
        PublicClient|array $client,
        string $conversationsThreadID,
        \DateTimeInterface $createdAt,
        string $createdBy,
        Direction|string $direction,
        array $recipients,
        array $senders,
        string $text,
        TruncationStatus|string $truncationStatus,
        Type|string $type = 'MESSAGE',
        ?string $inReplyToID = null,
        ?string $richText = null,
        PublicMessageStatus|array|null $status = null,
        ?string $subject = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['attachments'] = $attachments;
        $self['channelAccountID'] = $channelAccountID;
        $self['channelID'] = $channelID;
        $self['client'] = $client;
        $self['conversationsThreadID'] = $conversationsThreadID;
        $self['createdAt'] = $createdAt;
        $self['createdBy'] = $createdBy;
        $self['direction'] = $direction;
        $self['recipients'] = $recipients;
        $self['senders'] = $senders;
        $self['text'] = $text;
        $self['truncationStatus'] = $truncationStatus;
        $self['type'] = $type;

        null !== $inReplyToID && $self['inReplyToID'] = $inReplyToID;
        null !== $richText && $self['richText'] = $richText;
        null !== $status && $self['status'] = $status;
        null !== $subject && $self['subject'] = $subject;
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

    public function withChannelAccountID(string $channelAccountID): self
    {
        $self = clone $this;
        $self['channelAccountID'] = $channelAccountID;

        return $self;
    }

    public function withChannelID(string $channelID): self
    {
        $self = clone $this;
        $self['channelID'] = $channelID;

        return $self;
    }

    /**
     * @param PublicClient|PublicClientShape $client
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
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

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
     * @param TruncationStatus|value-of<TruncationStatus> $truncationStatus
     */
    public function withTruncationStatus(
        TruncationStatus|string $truncationStatus
    ): self {
        $self = clone $this;
        $self['truncationStatus'] = $truncationStatus;

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

    public function withInReplyToID(string $inReplyToID): self
    {
        $self = clone $this;
        $self['inReplyToID'] = $inReplyToID;

        return $self;
    }

    public function withRichText(string $richText): self
    {
        $self = clone $this;
        $self['richText'] = $richText;

        return $self;
    }

    /**
     * @param PublicMessageStatus|PublicMessageStatusShape $status
     */
    public function withStatus(PublicMessageStatus|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
