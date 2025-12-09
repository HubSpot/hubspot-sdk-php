<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicClient\ClientType;
use HubspotSDK\Conversations\PublicWelcomeMessage\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicWelcomeMessageShape = array{
 *   id: string,
 *   archived: bool,
 *   channelAccountID: string,
 *   channelID: string,
 *   client: PublicClient,
 *   conversationsThreadID: string,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   recipients: list<PublicRecipient>,
 *   senders: list<PublicSender>,
 *   text: string,
 *   type: value-of<Type>,
 *   richText?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PublicWelcomeMessage implements BaseModel
{
    /** @use SdkModel<PublicWelcomeMessageShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $archived;

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

    /** @var list<PublicRecipient> $recipients */
    #[Required(list: PublicRecipient::class)]
    public array $recipients;

    /** @var list<PublicSender> $senders */
    #[Required(list: PublicSender::class)]
    public array $senders;

    #[Required]
    public string $text;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $richText;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PublicWelcomeMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicWelcomeMessage::with(
     *   id: ...,
     *   archived: ...,
     *   channelAccountID: ...,
     *   channelID: ...,
     *   client: ...,
     *   conversationsThreadID: ...,
     *   createdAt: ...,
     *   createdBy: ...,
     *   recipients: ...,
     *   senders: ...,
     *   text: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicWelcomeMessage)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withChannelAccountID(...)
     *   ->withChannelID(...)
     *   ->withClient(...)
     *   ->withConversationsThreadID(...)
     *   ->withCreatedAt(...)
     *   ->withCreatedBy(...)
     *   ->withRecipients(...)
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
     * @param PublicClient|array{
     *   clientType: value-of<ClientType>, integrationAppID?: int|null
     * } $client
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        bool $archived,
        string $channelAccountID,
        string $channelID,
        PublicClient|array $client,
        string $conversationsThreadID,
        \DateTimeInterface $createdAt,
        string $createdBy,
        array $recipients,
        array $senders,
        string $text,
        Type|string $type = 'WELCOME_MESSAGE',
        ?string $richText = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['channelAccountID'] = $channelAccountID;
        $self['channelID'] = $channelID;
        $self['client'] = $client;
        $self['conversationsThreadID'] = $conversationsThreadID;
        $self['createdAt'] = $createdAt;
        $self['createdBy'] = $createdBy;
        $self['recipients'] = $recipients;
        $self['senders'] = $senders;
        $self['text'] = $text;
        $self['type'] = $type;

        null !== $richText && $self['richText'] = $richText;
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
     * @param PublicClient|array{
     *   clientType: value-of<ClientType>, integrationAppID?: int|null
     * } $client
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
     * @param list<PublicRecipient|array{
     *   deliveryIdentifier: PublicDeliveryIdentifier,
     *   actorID?: string|null,
     *   name?: string|null,
     *   recipientField?: string|null,
     * }> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $self = clone $this;
        $self['recipients'] = $recipients;

        return $self;
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

    public function withRichText(string $richText): self
    {
        $self = clone $this;
        $self['richText'] = $richText;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
