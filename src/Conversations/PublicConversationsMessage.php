<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicConversationsMessage\Attachment;
use HubspotSDK\Conversations\PublicConversationsMessage\Direction;
use HubspotSDK\Conversations\PublicConversationsMessage\TruncationStatus;
use HubspotSDK\Conversations\PublicConversationsMessage\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_conversations_message = array{
 *   id: string,
 *   archived: bool,
 *   attachments: list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment>,
 *   channelAccountID: string,
 *   channelID: string,
 *   client: PublicClient,
 *   conversationsThreadID: string,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   direction: value-of<Direction>,
 *   recipients: list<PublicRecipient>,
 *   senders: list<PublicSender>,
 *   text: string,
 *   truncationStatus: value-of<TruncationStatus>,
 *   type: value-of<Type>,
 *   inReplyToID?: string,
 *   richText?: string,
 *   status?: PublicMessageStatus,
 *   subject?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class PublicConversationsMessage implements BaseModel
{
    /** @use SdkModel<public_conversations_message> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $archived;

    /**
     * @var list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment> $attachments
     */
    #[Api(list: Attachment::class)]
    public array $attachments;

    #[Api('channelAccountId')]
    public string $channelAccountID;

    #[Api('channelId')]
    public string $channelID;

    #[Api]
    public PublicClient $client;

    #[Api('conversationsThreadId')]
    public string $conversationsThreadID;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $createdBy;

    /** @var value-of<Direction> $direction */
    #[Api(enum: Direction::class)]
    public string $direction;

    /** @var list<PublicRecipient> $recipients */
    #[Api(list: PublicRecipient::class)]
    public array $recipients;

    /** @var list<PublicSender> $senders */
    #[Api(list: PublicSender::class)]
    public array $senders;

    #[Api]
    public string $text;

    /** @var value-of<TruncationStatus> $truncationStatus */
    #[Api(enum: TruncationStatus::class)]
    public string $truncationStatus;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api('inReplyToId', optional: true)]
    public ?string $inReplyToID;

    #[Api(optional: true)]
    public ?string $richText;

    #[Api(optional: true)]
    public ?PublicMessageStatus $status;

    #[Api(optional: true)]
    public ?string $subject;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PublicConversationsMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicConversationsMessage::with(
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
     * (new PublicConversationsMessage)
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
     * @param list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment> $attachments
     * @param Direction|value-of<Direction> $direction
     * @param list<PublicRecipient> $recipients
     * @param list<PublicSender> $senders
     * @param TruncationStatus|value-of<TruncationStatus> $truncationStatus
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        bool $archived,
        array $attachments,
        string $channelAccountID,
        string $channelID,
        PublicClient $client,
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
        ?PublicMessageStatus $status = null,
        ?string $subject = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->attachments = $attachments;
        $obj->channelAccountID = $channelAccountID;
        $obj->channelID = $channelID;
        $obj->client = $client;
        $obj->conversationsThreadID = $conversationsThreadID;
        $obj->createdAt = $createdAt;
        $obj->createdBy = $createdBy;
        $obj['direction'] = $direction;
        $obj->recipients = $recipients;
        $obj->senders = $senders;
        $obj->text = $text;
        $obj['truncationStatus'] = $truncationStatus;
        $obj['type'] = $type;

        null !== $inReplyToID && $obj->inReplyToID = $inReplyToID;
        null !== $richText && $obj->richText = $richText;
        null !== $status && $obj->status = $status;
        null !== $subject && $obj->subject = $subject;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * @param list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $obj = clone $this;
        $obj->attachments = $attachments;

        return $obj;
    }

    public function withChannelAccountID(string $channelAccountID): self
    {
        $obj = clone $this;
        $obj->channelAccountID = $channelAccountID;

        return $obj;
    }

    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj->channelID = $channelID;

        return $obj;
    }

    public function withClient(PublicClient $client): self
    {
        $obj = clone $this;
        $obj->client = $client;

        return $obj;
    }

    public function withConversationsThreadID(
        string $conversationsThreadID
    ): self {
        $obj = clone $this;
        $obj->conversationsThreadID = $conversationsThreadID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedBy(string $createdBy): self
    {
        $obj = clone $this;
        $obj->createdBy = $createdBy;

        return $obj;
    }

    /**
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    /**
     * @param list<PublicRecipient> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $obj = clone $this;
        $obj->recipients = $recipients;

        return $obj;
    }

    /**
     * @param list<PublicSender> $senders
     */
    public function withSenders(array $senders): self
    {
        $obj = clone $this;
        $obj->senders = $senders;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    /**
     * @param TruncationStatus|value-of<TruncationStatus> $truncationStatus
     */
    public function withTruncationStatus(
        TruncationStatus|string $truncationStatus
    ): self {
        $obj = clone $this;
        $obj['truncationStatus'] = $truncationStatus;

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

    public function withInReplyToID(string $inReplyToID): self
    {
        $obj = clone $this;
        $obj->inReplyToID = $inReplyToID;

        return $obj;
    }

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj->richText = $richText;

        return $obj;
    }

    public function withStatus(PublicMessageStatus $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
