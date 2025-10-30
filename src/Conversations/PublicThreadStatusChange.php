<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicThreadStatusChange\NewStatus;
use HubspotSDK\Conversations\PublicThreadStatusChange\Type;
use HubspotSDK\Core\Attributes\Api;
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
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class PublicThreadStatusChange implements BaseModel
{
    /** @use SdkModel<PublicThreadStatusChangeShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $archived;

    #[Api]
    public PublicClient $client;

    #[Api('conversationsThreadId')]
    public string $conversationsThreadID;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $createdBy;

    /** @var value-of<NewStatus> $newStatus */
    #[Api(enum: NewStatus::class)]
    public string $newStatus;

    /** @var list<PublicRecipient> $recipients */
    #[Api(list: PublicRecipient::class)]
    public array $recipients;

    /** @var list<PublicSender> $senders */
    #[Api(list: PublicSender::class)]
    public array $senders;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
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
     * @param NewStatus|value-of<NewStatus> $newStatus
     * @param list<PublicRecipient> $recipients
     * @param list<PublicSender> $senders
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        bool $archived,
        PublicClient $client,
        string $conversationsThreadID,
        \DateTimeInterface $createdAt,
        string $createdBy,
        NewStatus|string $newStatus,
        array $recipients,
        array $senders,
        Type|string $type = 'THREAD_STATUS_CHANGE',
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->client = $client;
        $obj->conversationsThreadID = $conversationsThreadID;
        $obj->createdAt = $createdAt;
        $obj->createdBy = $createdBy;
        $obj['newStatus'] = $newStatus;
        $obj->recipients = $recipients;
        $obj->senders = $senders;
        $obj['type'] = $type;

        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withClient(PublicClient $client): self
    {
        $obj = clone $this;
        $obj->client = $client;

        return $obj;
    }

    public function withConversationsThreadID(
        string $conversationsThreadID
    ): self {
        $obj = clone $this;
        $obj->conversationsThreadID = $conversationsThreadID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedBy(string $createdBy): self
    {
        $obj = clone $this;
        $obj->createdBy = $createdBy;

        return $obj;
    }

    /**
     * @param NewStatus|value-of<NewStatus> $newStatus
     */
    public function withNewStatus(NewStatus|string $newStatus): self
    {
        $obj = clone $this;
        $obj['newStatus'] = $newStatus;

        return $obj;
    }

    /**
     * @param list<PublicRecipient> $recipients
     */
    public function withRecipients(array $recipients): self
    {
        $obj = clone $this;
        $obj->recipients = $recipients;

        return $obj;
    }

    /**
     * @param list<PublicSender> $senders
     */
    public function withSenders(array $senders): self
    {
        $obj = clone $this;
        $obj->senders = $senders;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
