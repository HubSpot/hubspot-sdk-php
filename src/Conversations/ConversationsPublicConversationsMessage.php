<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Attachment;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Direction;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\TruncationStatus;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Type;
use HubspotSDK\Conversations\PublicClient\ClientType;
use HubspotSDK\Conversations\PublicMessageStatus\StatusType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationsPublicConversationsMessageShape = array{
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
 *   inReplyToID?: string|null,
 *   richText?: string|null,
 *   status?: PublicMessageStatus|null,
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
     * @param list<PublicFile|array{
     *   fileID: string,
     *   fileUsageType: string,
     *   type: value-of<PublicFile\Type>,
     *   name?: string|null,
     *   url?: string|null,
     * }|PublicLocation|array{
     *   latitude: float,
     *   longitude: float,
     *   type: value-of<PublicLocation\Type>,
     *   address?: string|null,
     *   name?: string|null,
     *   url?: string|null,
     * }|PublicContact|array{
     *   contactProfile: ContactProfile,
     *   type: value-of<PublicContact\Type>,
     * }|PublicUnsupportedContent|array{
     *   type: value-of<PublicUnsupportedContent\Type>
     * }|PublicMessageHeader|array{
     *   type: value-of<PublicMessageHeader\Type>,
     *   fileID?: int|null,
     *   text?: string|null,
     * }|PublicQuickReplies|array{
     *   allowMultiSelect: bool,
     *   allowUserInput: bool,
     *   quickReplies: list<QuickReply>,
     *   type: value-of<PublicQuickReplies\Type>,
     * }|PublicWhatsAppTemplateMetadata|array{
     *   crmObjectIDs: array<string,int>,
     *   mappedTemplateID: string,
     *   parameters: array<string,string>,
     *   type: value-of<PublicWhatsAppTemplateMetadata\Type>,
     * }|PublicSocialMetadataAttachment|array{
     *   socialMetadata: SocialMetadata,
     *   type: value-of<PublicSocialMetadataAttachment\Type>,
     * }> $attachments
     * @param PublicClient|array{
     *   clientType: value-of<ClientType>, integrationAppID?: int|null
     * } $client
     * @param Direction|value-of<Direction> $direction
     * @param list<PublicRecipient|array{
     *   deliveryIdentifier: PublicDeliveryIdentifier,
     *   actorID?: string|null,
     *   name?: string|null,
     *   recipientField?: string|null,
     * }> $recipients
     * @param list<PublicSender|array{
     *   actorID?: string|null,
     *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
     *   name?: string|null,
     *   senderField?: string|null,
     * }> $senders
     * @param TruncationStatus|value-of<TruncationStatus> $truncationStatus
     * @param Type|value-of<Type> $type
     * @param PublicMessageStatus|array{
     *   statusType: value-of<StatusType>,
     *   failureDetails?: PublicMessageFailureDetails|null,
     * } $status
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['archived'] = $archived;
        $obj['attachments'] = $attachments;
        $obj['channelAccountID'] = $channelAccountID;
        $obj['channelID'] = $channelID;
        $obj['client'] = $client;
        $obj['conversationsThreadID'] = $conversationsThreadID;
        $obj['createdAt'] = $createdAt;
        $obj['createdBy'] = $createdBy;
        $obj['direction'] = $direction;
        $obj['recipients'] = $recipients;
        $obj['senders'] = $senders;
        $obj['text'] = $text;
        $obj['truncationStatus'] = $truncationStatus;
        $obj['type'] = $type;

        null !== $inReplyToID && $obj['inReplyToID'] = $inReplyToID;
        null !== $richText && $obj['richText'] = $richText;
        null !== $status && $obj['status'] = $status;
        null !== $subject && $obj['subject'] = $subject;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * @param list<PublicFile|array{
     *   fileID: string,
     *   fileUsageType: string,
     *   type: value-of<PublicFile\Type>,
     *   name?: string|null,
     *   url?: string|null,
     * }|PublicLocation|array{
     *   latitude: float,
     *   longitude: float,
     *   type: value-of<PublicLocation\Type>,
     *   address?: string|null,
     *   name?: string|null,
     *   url?: string|null,
     * }|PublicContact|array{
     *   contactProfile: ContactProfile,
     *   type: value-of<PublicContact\Type>,
     * }|PublicUnsupportedContent|array{
     *   type: value-of<PublicUnsupportedContent\Type>
     * }|PublicMessageHeader|array{
     *   type: value-of<PublicMessageHeader\Type>,
     *   fileID?: int|null,
     *   text?: string|null,
     * }|PublicQuickReplies|array{
     *   allowMultiSelect: bool,
     *   allowUserInput: bool,
     *   quickReplies: list<QuickReply>,
     *   type: value-of<PublicQuickReplies\Type>,
     * }|PublicWhatsAppTemplateMetadata|array{
     *   crmObjectIDs: array<string,int>,
     *   mappedTemplateID: string,
     *   parameters: array<string,string>,
     *   type: value-of<PublicWhatsAppTemplateMetadata\Type>,
     * }|PublicSocialMetadataAttachment|array{
     *   socialMetadata: SocialMetadata,
     *   type: value-of<PublicSocialMetadataAttachment\Type>,
     * }> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $obj = clone $this;
        $obj['attachments'] = $attachments;

        return $obj;
    }

    public function withChannelAccountID(string $channelAccountID): self
    {
        $obj = clone $this;
        $obj['channelAccountID'] = $channelAccountID;

        return $obj;
    }

    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj['channelID'] = $channelID;

        return $obj;
    }

    /**
     * @param PublicClient|array{
     *   clientType: value-of<ClientType>, integrationAppID?: int|null
     * } $client
     */
    public function withClient(PublicClient|array $client): self
    {
        $obj = clone $this;
        $obj['client'] = $client;

        return $obj;
    }

    public function withConversationsThreadID(
        string $conversationsThreadID
    ): self {
        $obj = clone $this;
        $obj['conversationsThreadID'] = $conversationsThreadID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withCreatedBy(string $createdBy): self
    {
        $obj = clone $this;
        $obj['createdBy'] = $createdBy;

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
     * @param list<PublicRecipient|array{
     *   deliveryIdentifier: PublicDeliveryIdentifier,
     *   actorID?: string|null,
     *   name?: string|null,
     *   recipientField?: string|null,
     * }> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $obj = clone $this;
        $obj['recipients'] = $recipients;

        return $obj;
    }

    /**
     * @param list<PublicSender|array{
     *   actorID?: string|null,
     *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
     *   name?: string|null,
     *   senderField?: string|null,
     * }> $senders
     */
    public function withSenders(array $senders): self
    {
        $obj = clone $this;
        $obj['senders'] = $senders;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

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
        $obj['inReplyToID'] = $inReplyToID;

        return $obj;
    }

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj['richText'] = $richText;

        return $obj;
    }

    /**
     * @param PublicMessageStatus|array{
     *   statusType: value-of<StatusType>,
     *   failureDetails?: PublicMessageFailureDetails|null,
     * } $status
     */
    public function withStatus(PublicMessageStatus|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj['subject'] = $subject;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
