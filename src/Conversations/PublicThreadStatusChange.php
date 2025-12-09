<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicClient\ClientType;
use HubspotSDK\Conversations\PublicThreadStatusChange\NewStatus;
use HubspotSDK\Conversations\PublicThreadStatusChange\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicThreadStatusChangeShape = array{
 *   id: string,
 *   archived: bool,
 *   client: PublicClient,
 *   conversationsThreadID: string,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   newStatus: value-of<NewStatus>,
 *   recipients: list<PublicRecipient>,
 *   senders: list<PublicSender>,
 *   type: value-of<Type>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PublicThreadStatusChange implements BaseModel
{
    /** @use SdkModel<PublicThreadStatusChangeShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $archived;

    #[Required]
    public PublicClient $client;

    #[Required('conversationsThreadId')]
    public string $conversationsThreadID;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $createdBy;

    /** @var value-of<NewStatus> $newStatus */
    #[Required(enum: NewStatus::class)]
    public string $newStatus;

    /** @var list<PublicRecipient> $recipients */
    #[Required(list: PublicRecipient::class)]
    public array $recipients;

    /** @var list<PublicSender> $senders */
    #[Required(list: PublicSender::class)]
    public array $senders;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PublicThreadStatusChange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicThreadStatusChange::with(
     *   id: ...,
     *   archived: ...,
     *   client: ...,
     *   conversationsThreadID: ...,
     *   createdAt: ...,
     *   createdBy: ...,
     *   newStatus: ...,
     *   recipients: ...,
     *   senders: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicThreadStatusChange)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withClient(...)
     *   ->withConversationsThreadID(...)
     *   ->withCreatedAt(...)
     *   ->withCreatedBy(...)
     *   ->withNewStatus(...)
     *   ->withRecipients(...)
     *   ->withSenders(...)
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
     * @param NewStatus|value-of<NewStatus> $newStatus
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
        PublicClient|array $client,
        string $conversationsThreadID,
        \DateTimeInterface $createdAt,
        string $createdBy,
        NewStatus|string $newStatus,
        array $recipients,
        array $senders,
        Type|string $type = 'THREAD_STATUS_CHANGE',
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['client'] = $client;
        $self['conversationsThreadID'] = $conversationsThreadID;
        $self['createdAt'] = $createdAt;
        $self['createdBy'] = $createdBy;
        $self['newStatus'] = $newStatus;
        $self['recipients'] = $recipients;
        $self['senders'] = $senders;
        $self['type'] = $type;

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
     * @param NewStatus|value-of<NewStatus> $newStatus
     */
    public function withNewStatus(NewStatus|string $newStatus): self
    {
        $self = clone $this;
        $self['newStatus'] = $newStatus;

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

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
