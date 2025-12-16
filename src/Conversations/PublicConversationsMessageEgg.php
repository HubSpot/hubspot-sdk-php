<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicConversationsMessageEgg\Attachment;
use HubspotSDK\Conversations\PublicConversationsMessageEgg\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AttachmentShape from \HubspotSDK\Conversations\PublicConversationsMessageEgg\Attachment
 * @phpstan-import-type PublicRecipientEggShape from \HubspotSDK\Conversations\PublicRecipientEgg
 *
 * @phpstan-type PublicConversationsMessageEggShape = array{
 *   attachments: list<AttachmentShape>,
 *   channelAccountID: string,
 *   channelID: string,
 *   recipients: list<PublicRecipientEggShape>,
 *   senderActorID: string,
 *   text: string,
 *   type: Type|value-of<Type>,
 *   richText?: string|null,
 *   subject?: string|null,
 * }
 */
final class PublicConversationsMessageEgg implements BaseModel
{
    /** @use SdkModel<PublicConversationsMessageEggShape> */
    use SdkModel;

    /**
     * @var list<PublicFileEgg|PublicQuickRepliesEgg|PublicSocialMediaEgg> $attachments
     */
    #[Required(list: Attachment::class)]
    public array $attachments;

    #[Required('channelAccountId')]
    public string $channelAccountID;

    #[Required('channelId')]
    public string $channelID;

    /** @var list<PublicRecipientEgg> $recipients */
    #[Required(list: PublicRecipientEgg::class)]
    public array $recipients;

    #[Required('senderActorId')]
    public string $senderActorID;

    #[Required]
    public string $text;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $richText;

    #[Optional]
    public ?string $subject;

    /**
     * `new PublicConversationsMessageEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicConversationsMessageEgg::with(
     *   attachments: ...,
     *   channelAccountID: ...,
     *   channelID: ...,
     *   recipients: ...,
     *   senderActorID: ...,
     *   text: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicConversationsMessageEgg)
     *   ->withAttachments(...)
     *   ->withChannelAccountID(...)
     *   ->withChannelID(...)
     *   ->withRecipients(...)
     *   ->withSenderActorID(...)
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
     * @param list<PublicRecipientEggShape> $recipients
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $attachments,
        string $channelAccountID,
        string $channelID,
        array $recipients,
        string $senderActorID,
        string $text,
        Type|string $type = 'MESSAGE',
        ?string $richText = null,
        ?string $subject = null,
    ): self {
        $self = new self;

        $self['attachments'] = $attachments;
        $self['channelAccountID'] = $channelAccountID;
        $self['channelID'] = $channelID;
        $self['recipients'] = $recipients;
        $self['senderActorID'] = $senderActorID;
        $self['text'] = $text;
        $self['type'] = $type;

        null !== $richText && $self['richText'] = $richText;
        null !== $subject && $self['subject'] = $subject;

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
     * @param list<PublicRecipientEggShape> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $self = clone $this;
        $self['recipients'] = $recipients;

        return $self;
    }

    public function withSenderActorID(string $senderActorID): self
    {
        $self = clone $this;
        $self['senderActorID'] = $senderActorID;

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

    public function withRichText(string $richText): self
    {
        $self = clone $this;
        $self['richText'] = $richText;

        return $self;
    }

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }
}
