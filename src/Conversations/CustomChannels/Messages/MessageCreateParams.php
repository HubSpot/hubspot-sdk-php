<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\Messages;

use HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant;
use HubspotSDK\Conversations\CustomChannels\ContactAttachment;
use HubspotSDK\Conversations\CustomChannels\FileAttachment;
use HubspotSDK\Conversations\CustomChannels\LocationAttachment;
use HubspotSDK\Conversations\CustomChannels\MessageHeaderAttachment;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\Attachment;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubspotSDK\Conversations\CustomChannels\PreResolvedContacts;
use HubspotSDK\Conversations\CustomChannels\QuickRepliesAttachment;
use HubspotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment;
use HubspotSDK\Conversations\CustomChannels\UnsupportedContentAttachment;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Publish a message over your custom channel.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannels\MessagesService::create()
 *
 * @phpstan-type MessageCreateParamsShape = array{
 *   attachments: list<FileAttachment|LocationAttachment|ContactAttachment|UnsupportedContentAttachment|MessageHeaderAttachment|QuickRepliesAttachment|SocialMetadataIntegrationAttachment>,
 *   channelAccountId: string,
 *   messageDirection: MessageDirection|value-of<MessageDirection>,
 *   recipients: list<ChannelIntegrationParticipant>,
 *   senders: list<ChannelIntegrationParticipant>,
 *   text: string,
 *   timestamp: \DateTimeInterface,
 *   inReplyToId?: string,
 *   integrationIdempotencyId?: string,
 *   integrationThreadId?: string,
 *   preResolvedContacts?: PreResolvedContacts,
 *   richText?: string,
 * }
 */
final class MessageCreateParams implements BaseModel
{
    /** @use SdkModel<MessageCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * @var list<FileAttachment|LocationAttachment|ContactAttachment|UnsupportedContentAttachment|MessageHeaderAttachment|QuickRepliesAttachment|SocialMetadataIntegrationAttachment> $attachments
     */
    #[Api(list: Attachment::class)]
    public array $attachments;

    #[Api]
    public string $channelAccountId;

    /** @var value-of<MessageDirection> $messageDirection */
    #[Api(enum: MessageDirection::class)]
    public string $messageDirection;

    /** @var list<ChannelIntegrationParticipant> $recipients */
    #[Api(list: ChannelIntegrationParticipant::class)]
    public array $recipients;

    /** @var list<ChannelIntegrationParticipant> $senders */
    #[Api(list: ChannelIntegrationParticipant::class)]
    public array $senders;

    #[Api]
    public string $text;

    #[Api]
    public \DateTimeInterface $timestamp;

    #[Api(optional: true)]
    public ?string $inReplyToId;

    #[Api(optional: true)]
    public ?string $integrationIdempotencyId;

    #[Api(optional: true)]
    public ?string $integrationThreadId;

    #[Api(optional: true)]
    public ?PreResolvedContacts $preResolvedContacts;

    #[Api(optional: true)]
    public ?string $richText;

    /**
     * `new MessageCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageCreateParams::with(
     *   attachments: ...,
     *   channelAccountId: ...,
     *   messageDirection: ...,
     *   recipients: ...,
     *   senders: ...,
     *   text: ...,
     *   timestamp: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageCreateParams)
     *   ->withAttachments(...)
     *   ->withChannelAccountID(...)
     *   ->withMessageDirection(...)
     *   ->withRecipients(...)
     *   ->withSenders(...)
     *   ->withText(...)
     *   ->withTimestamp(...)
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
     * @param list<FileAttachment|LocationAttachment|ContactAttachment|UnsupportedContentAttachment|MessageHeaderAttachment|QuickRepliesAttachment|SocialMetadataIntegrationAttachment> $attachments
     * @param MessageDirection|value-of<MessageDirection> $messageDirection
     * @param list<ChannelIntegrationParticipant> $recipients
     * @param list<ChannelIntegrationParticipant> $senders
     */
    public static function with(
        array $attachments,
        string $channelAccountId,
        MessageDirection|string $messageDirection,
        array $recipients,
        array $senders,
        string $text,
        \DateTimeInterface $timestamp,
        ?string $inReplyToId = null,
        ?string $integrationIdempotencyId = null,
        ?string $integrationThreadId = null,
        ?PreResolvedContacts $preResolvedContacts = null,
        ?string $richText = null,
    ): self {
        $obj = new self;

        $obj->attachments = $attachments;
        $obj->channelAccountId = $channelAccountId;
        $obj['messageDirection'] = $messageDirection;
        $obj->recipients = $recipients;
        $obj->senders = $senders;
        $obj->text = $text;
        $obj->timestamp = $timestamp;

        null !== $inReplyToId && $obj->inReplyToId = $inReplyToId;
        null !== $integrationIdempotencyId && $obj->integrationIdempotencyId = $integrationIdempotencyId;
        null !== $integrationThreadId && $obj->integrationThreadId = $integrationThreadId;
        null !== $preResolvedContacts && $obj->preResolvedContacts = $preResolvedContacts;
        null !== $richText && $obj->richText = $richText;

        return $obj;
    }

    /**
     * @param list<FileAttachment|LocationAttachment|ContactAttachment|UnsupportedContentAttachment|MessageHeaderAttachment|QuickRepliesAttachment|SocialMetadataIntegrationAttachment> $attachments
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

    /**
     * @param MessageDirection|value-of<MessageDirection> $messageDirection
     */
    public function withMessageDirection(
        MessageDirection|string $messageDirection
    ): self {
        $obj = clone $this;
        $obj['messageDirection'] = $messageDirection;

        return $obj;
    }

    /**
     * @param list<ChannelIntegrationParticipant> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $obj = clone $this;
        $obj->recipients = $recipients;

        return $obj;
    }

    /**
     * @param list<ChannelIntegrationParticipant> $senders
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

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withInReplyToID(string $inReplyToID): self
    {
        $obj = clone $this;
        $obj->inReplyToId = $inReplyToID;

        return $obj;
    }

    public function withIntegrationIdempotencyID(
        string $integrationIdempotencyID
    ): self {
        $obj = clone $this;
        $obj->integrationIdempotencyId = $integrationIdempotencyID;

        return $obj;
    }

    public function withIntegrationThreadID(string $integrationThreadID): self
    {
        $obj = clone $this;
        $obj->integrationThreadId = $integrationThreadID;

        return $obj;
    }

    public function withPreResolvedContacts(
        PreResolvedContacts $preResolvedContacts
    ): self {
        $obj = clone $this;
        $obj->preResolvedContacts = $preResolvedContacts;

        return $obj;
    }

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj->richText = $richText;

        return $obj;
    }
}
