<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicConversationsMessageEgg\Attachment;
use HubspotSDK\Conversations\PublicConversationsMessageEgg\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicConversationsMessageEggShape = array{
 *   attachments: list<PublicFileEgg|PublicQuickRepliesEgg|PublicSocialMediaEgg>,
 *   channelAccountId: string,
 *   channelId: string,
 *   recipients: list<PublicRecipientEgg>,
 *   senderActorId: string,
 *   text: string,
 *   type: value-of<Type>,
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
    #[Api(list: Attachment::class)]
    public array $attachments;

    #[Api]
    public string $channelAccountId;

    #[Api]
    public string $channelId;

    /** @var list<PublicRecipientEgg> $recipients */
    #[Api(list: PublicRecipientEgg::class)]
    public array $recipients;

    #[Api]
    public string $senderActorId;

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
     *   channelAccountId: ...,
     *   channelId: ...,
     *   recipients: ...,
     *   senderActorId: ...,
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
        string $channelAccountId,
        string $channelId,
        array $recipients,
        string $senderActorId,
        string $text,
        Type|string $type = 'MESSAGE',
        ?string $richText = null,
        ?string $subject = null,
    ): self {
        $obj = new self;

        $obj->attachments = $attachments;
        $obj->channelAccountId = $channelAccountId;
        $obj->channelId = $channelId;
        $obj->recipients = $recipients;
        $obj->senderActorId = $senderActorId;
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
        $obj->channelAccountId = $channelAccountID;

        return $obj;
    }

    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj->channelId = $channelID;

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
        $obj->senderActorId = $senderActorID;

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
