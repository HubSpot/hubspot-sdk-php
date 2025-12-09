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
 *   channelAccountId: string,
 *   channelId: string,
 *   client: PublicClient,
 *   conversationsThreadId: string,
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

    #[Required]
    public string $channelAccountId;

    #[Required]
    public string $channelId;

    #[Required]
    public PublicClient $client;

    #[Required]
    public string $conversationsThreadId;

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
     *   channelAccountId: ...,
     *   channelId: ...,
     *   client: ...,
     *   conversationsThreadId: ...,
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
        string $channelAccountId,
        string $channelId,
        PublicClient|array $client,
        string $conversationsThreadId,
        \DateTimeInterface $createdAt,
        string $createdBy,
        array $recipients,
        array $senders,
        string $text,
        Type|string $type = 'WELCOME_MESSAGE',
        ?string $richText = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['archived'] = $archived;
        $obj['channelAccountId'] = $channelAccountId;
        $obj['channelId'] = $channelId;
        $obj['client'] = $client;
        $obj['conversationsThreadId'] = $conversationsThreadId;
        $obj['createdAt'] = $createdAt;
        $obj['createdBy'] = $createdBy;
        $obj['recipients'] = $recipients;
        $obj['senders'] = $senders;
        $obj['text'] = $text;
        $obj['type'] = $type;

        null !== $richText && $obj['richText'] = $richText;
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

    public function withChannelAccountID(string $channelAccountID): self
    {
        $obj = clone $this;
        $obj['channelAccountId'] = $channelAccountID;

        return $obj;
    }

    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj['channelId'] = $channelID;

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

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj['richText'] = $richText;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
