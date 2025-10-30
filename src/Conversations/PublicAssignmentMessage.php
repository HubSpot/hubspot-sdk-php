<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicAssignmentMessage\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssignmentMessageShape = array{
 *   id: string,
 *   archived: bool,
 *   client: PublicClient,
 *   conversationsThreadID: string,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   recipients: list<PublicRecipient>,
 *   senders: list<PublicSender>,
 *   type: value-of<Type>,
 *   assignedFrom?: string,
 *   assignedTo?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class PublicAssignmentMessage implements BaseModel
{
    /** @use SdkModel<PublicAssignmentMessageShape> */
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
    public ?string $assignedFrom;

    #[Api(optional: true)]
    public ?string $assignedTo;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PublicAssignmentMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssignmentMessage::with(
     *   id: ...,
     *   archived: ...,
     *   client: ...,
     *   conversationsThreadID: ...,
     *   createdAt: ...,
     *   createdBy: ...,
     *   recipients: ...,
     *   senders: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssignmentMessage)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withClient(...)
     *   ->withConversationsThreadID(...)
     *   ->withCreatedAt(...)
     *   ->withCreatedBy(...)
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
        array $recipients,
        array $senders,
        Type|string $type = 'ASSIGNMENT',
        ?string $assignedFrom = null,
        ?string $assignedTo = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->client = $client;
        $obj->conversationsThreadID = $conversationsThreadID;
        $obj->createdAt = $createdAt;
        $obj->createdBy = $createdBy;
        $obj->recipients = $recipients;
        $obj->senders = $senders;
        $obj['type'] = $type;

        null !== $assignedFrom && $obj->assignedFrom = $assignedFrom;
        null !== $assignedTo && $obj->assignedTo = $assignedTo;
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

    public function withAssignedFrom(string $assignedFrom): self
    {
        $obj = clone $this;
        $obj->assignedFrom = $assignedFrom;

        return $obj;
    }

    public function withAssignedTo(string $assignedTo): self
    {
        $obj = clone $this;
        $obj->assignedTo = $assignedTo;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
