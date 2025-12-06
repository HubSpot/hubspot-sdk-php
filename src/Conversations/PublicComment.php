<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicClient\ClientType;
use HubspotSDK\Conversations\PublicComment\Attachment;
use HubspotSDK\Conversations\PublicComment\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCommentShape = array{
 *   id: string,
 *   archived: bool,
 *   attachments: list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment>,
 *   client: PublicClient,
 *   conversationsThreadId: string,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   recipients: list<PublicRecipient>,
 *   richText: string,
 *   senders: list<PublicSender>,
 *   text: string,
 *   type: value-of<Type>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PublicComment implements BaseModel
{
    /** @use SdkModel<PublicCommentShape> */
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

    #[Api]
    public PublicClient $client;

    #[Api]
    public string $conversationsThreadId;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $createdBy;

    /** @var list<PublicRecipient> $recipients */
    #[Api(list: PublicRecipient::class)]
    public array $recipients;

    #[Api]
    public string $richText;

    /** @var list<PublicSender> $senders */
    #[Api(list: PublicSender::class)]
    public array $senders;

    #[Api]
    public string $text;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
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
     *   conversationsThreadId: ...,
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
     * @param list<PublicFile|array{
     *   fileId: string,
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
     *   fileId?: int|null,
     *   text?: string|null,
     * }|PublicQuickReplies|array{
     *   allowMultiSelect: bool,
     *   allowUserInput: bool,
     *   quickReplies: list<QuickReply>,
     *   type: value-of<PublicQuickReplies\Type>,
     * }|PublicWhatsAppTemplateMetadata|array{
     *   crmObjectIds: array<string,int>,
     *   mappedTemplateId: string,
     *   parameters: array<string,string>,
     *   type: value-of<PublicWhatsAppTemplateMetadata\Type>,
     * }|PublicSocialMetadataAttachment|array{
     *   socialMetadata: SocialMetadata,
     *   type: value-of<PublicSocialMetadataAttachment\Type>,
     * }> $attachments
     * @param PublicClient|array{
     *   clientType: value-of<ClientType>, integrationAppId?: int|null
     * } $client
     * @param list<PublicRecipient|array{
     *   deliveryIdentifier: PublicDeliveryIdentifier,
     *   actorId?: string|null,
     *   name?: string|null,
     *   recipientField?: string|null,
     * }> $recipients
     * @param list<PublicSender|array{
     *   actorId?: string|null,
     *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
     *   name?: string|null,
     *   senderField?: string|null,
     * }> $senders
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        bool $archived,
        array $attachments,
        PublicClient|array $client,
        string $conversationsThreadId,
        \DateTimeInterface $createdAt,
        string $createdBy,
        array $recipients,
        string $richText,
        array $senders,
        string $text,
        Type|string $type = 'COMMENT',
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['archived'] = $archived;
        $obj['attachments'] = $attachments;
        $obj['client'] = $client;
        $obj['conversationsThreadId'] = $conversationsThreadId;
        $obj['createdAt'] = $createdAt;
        $obj['createdBy'] = $createdBy;
        $obj['recipients'] = $recipients;
        $obj['richText'] = $richText;
        $obj['senders'] = $senders;
        $obj['text'] = $text;
        $obj['type'] = $type;

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
     *   fileId: string,
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
     *   fileId?: int|null,
     *   text?: string|null,
     * }|PublicQuickReplies|array{
     *   allowMultiSelect: bool,
     *   allowUserInput: bool,
     *   quickReplies: list<QuickReply>,
     *   type: value-of<PublicQuickReplies\Type>,
     * }|PublicWhatsAppTemplateMetadata|array{
     *   crmObjectIds: array<string,int>,
     *   mappedTemplateId: string,
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

    /**
     * @param PublicClient|array{
     *   clientType: value-of<ClientType>, integrationAppId?: int|null
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
        $obj['conversationsThreadId'] = $conversationsThreadID;

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
     * @param list<PublicRecipient|array{
     *   deliveryIdentifier: PublicDeliveryIdentifier,
     *   actorId?: string|null,
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

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj['richText'] = $richText;

        return $obj;
    }

    /**
     * @param list<PublicSender|array{
     *   actorId?: string|null,
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
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
