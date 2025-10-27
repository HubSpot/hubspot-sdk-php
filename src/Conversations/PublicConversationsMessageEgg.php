<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicConversationsMessageEgg\Attachment;
use HubspotSDK\Conversations\PublicConversationsMessageEgg\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_conversations_message_egg = array{
 *   attachments: list<PublicFileEgg|PublicQuickRepliesEgg|PublicSocialMediaEgg>,
 *   channelAccountID: string,
 *   channelID: string,
 *   recipients: list<PublicRecipientEgg>,
 *   senderActorID: string,
 *   text: string,
 *   type: value-of<Type>,
 *   richText?: string,
 *   subject?: string,
 * }
 */
final class PublicConversationsMessageEgg implements BaseModel
{
    /** @use SdkModel<public_conversations_message_egg> */
    use SdkModel;

    /**
     * @var list<PublicFileEgg|PublicQuickRepliesEgg|PublicSocialMediaEgg> $attachments
     */
    #[Api(list: Attachment::class)]
    public array $attachments;

    #[Api('channelAccountId')]
    public string $channelAccountID;

    #[Api('channelId')]
    public string $channelID;

    /** @var list<PublicRecipientEgg> $recipients */
    #[Api(list: PublicRecipientEgg::class)]
    public array $recipients;

    #[Api('senderActorId')]
    public string $senderActorID;

    #[Api]
    public string $text;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $richText;

    #[Api(optional: true)]
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
     * @param list<PublicFileEgg|PublicQuickRepliesEgg|PublicSocialMediaEgg> $attachments
     * @param list<PublicRecipientEgg> $recipients
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
        $obj = new self;

        $obj->attachments = $attachments;
        $obj->channelAccountID = $channelAccountID;
        $obj->channelID = $channelID;
        $obj->recipients = $recipients;
        $obj->senderActorID = $senderActorID;
        $obj->text = $text;
        $obj['type'] = $type;

        null !== $richText && $obj->richText = $richText;
        null !== $subject && $obj->subject = $subject;

        return $obj;
    }

    /**
     * @param list<PublicFileEgg|PublicQuickRepliesEgg|PublicSocialMediaEgg> $attachments
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

    /**
     * @param list<PublicRecipientEgg> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $obj = clone $this;
        $obj->recipients = $recipients;

        return $obj;
    }

    public function withSenderActorID(string $senderActorID): self
    {
        $obj = clone $this;
        $obj->senderActorID = $senderActorID;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

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

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj->richText = $richText;

        return $obj;
    }

    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }
}
