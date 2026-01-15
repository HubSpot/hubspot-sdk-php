<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelIntegrationMessageEgg\Attachment;
use HubspotSDK\Conversations\CustomChannels\ChannelIntegrationMessageEgg\MessageDirection;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AttachmentVariants from \HubspotSDK\Conversations\CustomChannels\ChannelIntegrationMessageEgg\Attachment
 * @phpstan-import-type AttachmentShape from \HubspotSDK\Conversations\CustomChannels\ChannelIntegrationMessageEgg\Attachment
 * @phpstan-import-type ChannelIntegrationParticipantShape from \HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant
 * @phpstan-import-type PreResolvedContactsShape from \HubspotSDK\Conversations\CustomChannels\PreResolvedContacts
 *
 * @phpstan-type ChannelIntegrationMessageEggShape = array{
 *   attachments: list<AttachmentShape>,
 *   channelAccountID: string,
 *   messageDirection: MessageDirection|value-of<MessageDirection>,
 *   recipients: list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape>,
 *   senders: list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape>,
 *   text: string,
 *   timestamp: \DateTimeInterface,
 *   inReplyToID?: string|null,
 *   integrationIdempotencyID?: string|null,
 *   integrationThreadID?: string|null,
 *   preResolvedContacts?: null|PreResolvedContacts|PreResolvedContactsShape,
 *   richText?: string|null,
 * }
 */
final class ChannelIntegrationMessageEgg implements BaseModel
{
    /** @use SdkModel<ChannelIntegrationMessageEggShape> */
    use SdkModel;

    /** @var list<AttachmentVariants> $attachments */
    #[Required(list: Attachment::class)]
    public array $attachments;

    #[Required('channelAccountId')]
    public string $channelAccountID;

    /** @var value-of<MessageDirection> $messageDirection */
    #[Required(enum: MessageDirection::class)]
    public string $messageDirection;

    /** @var list<ChannelIntegrationParticipant> $recipients */
    #[Required(list: ChannelIntegrationParticipant::class)]
    public array $recipients;

    /** @var list<ChannelIntegrationParticipant> $senders */
    #[Required(list: ChannelIntegrationParticipant::class)]
    public array $senders;

    #[Required]
    public string $text;

    #[Required]
    public \DateTimeInterface $timestamp;

    #[Optional('inReplyToId')]
    public ?string $inReplyToID;

    #[Optional('integrationIdempotencyId')]
    public ?string $integrationIdempotencyID;

    #[Optional('integrationThreadId')]
    public ?string $integrationThreadID;

    #[Optional]
    public ?PreResolvedContacts $preResolvedContacts;

    #[Optional]
    public ?string $richText;

    /**
     * `new ChannelIntegrationMessageEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelIntegrationMessageEgg::with(
     *   attachments: ...,
     *   channelAccountID: ...,
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
     * (new ChannelIntegrationMessageEgg)
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
     * @param list<AttachmentShape> $attachments
     * @param MessageDirection|value-of<MessageDirection> $messageDirection
     * @param list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape> $recipients
     * @param list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape> $senders
     * @param PreResolvedContacts|PreResolvedContactsShape|null $preResolvedContacts
     */
    public static function with(
        array $attachments,
        string $channelAccountID,
        MessageDirection|string $messageDirection,
        array $recipients,
        array $senders,
        string $text,
        \DateTimeInterface $timestamp,
        ?string $inReplyToID = null,
        ?string $integrationIdempotencyID = null,
        ?string $integrationThreadID = null,
        PreResolvedContacts|array|null $preResolvedContacts = null,
        ?string $richText = null,
    ): self {
        $self = new self;

        $self['attachments'] = $attachments;
        $self['channelAccountID'] = $channelAccountID;
        $self['messageDirection'] = $messageDirection;
        $self['recipients'] = $recipients;
        $self['senders'] = $senders;
        $self['text'] = $text;
        $self['timestamp'] = $timestamp;

        null !== $inReplyToID && $self['inReplyToID'] = $inReplyToID;
        null !== $integrationIdempotencyID && $self['integrationIdempotencyID'] = $integrationIdempotencyID;
        null !== $integrationThreadID && $self['integrationThreadID'] = $integrationThreadID;
        null !== $preResolvedContacts && $self['preResolvedContacts'] = $preResolvedContacts;
        null !== $richText && $self['richText'] = $richText;

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

    /**
     * @param MessageDirection|value-of<MessageDirection> $messageDirection
     */
    public function withMessageDirection(
        MessageDirection|string $messageDirection
    ): self {
        $self = clone $this;
        $self['messageDirection'] = $messageDirection;

        return $self;
    }

    /**
     * @param list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $self = clone $this;
        $self['recipients'] = $recipients;

        return $self;
    }

    /**
     * @param list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape> $senders
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

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withInReplyToID(string $inReplyToID): self
    {
        $self = clone $this;
        $self['inReplyToID'] = $inReplyToID;

        return $self;
    }

    public function withIntegrationIdempotencyID(
        string $integrationIdempotencyID
    ): self {
        $self = clone $this;
        $self['integrationIdempotencyID'] = $integrationIdempotencyID;

        return $self;
    }

    public function withIntegrationThreadID(string $integrationThreadID): self
    {
        $self = clone $this;
        $self['integrationThreadID'] = $integrationThreadID;

        return $self;
    }

    /**
     * @param PreResolvedContacts|PreResolvedContactsShape $preResolvedContacts
     */
    public function withPreResolvedContacts(
        PreResolvedContacts|array $preResolvedContacts
    ): self {
        $self = clone $this;
        $self['preResolvedContacts'] = $preResolvedContacts;

        return $self;
    }

    public function withRichText(string $richText): self
    {
        $self = clone $this;
        $self['richText'] = $richText;

        return $self;
    }
}
