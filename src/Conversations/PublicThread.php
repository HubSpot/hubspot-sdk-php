<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicThread\Status;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicThreadShape = array{
 *   id: string,
 *   associatedContactID: string,
 *   createdAt: \DateTimeInterface,
 *   inboxID: string,
 *   originalChannelAccountID: string,
 *   originalChannelID: string,
 *   spam: bool,
 *   status: value-of<Status>,
 *   archived?: bool,
 *   assignedTo?: string,
 *   closedAt?: \DateTimeInterface,
 *   latestMessageReceivedTimestamp?: \DateTimeInterface,
 *   latestMessageSentTimestamp?: \DateTimeInterface,
 *   latestMessageTimestamp?: \DateTimeInterface,
 *   threadAssociations?: PublicThreadAssociations,
 * }
 */
final class PublicThread implements BaseModel
{
    /** @use SdkModel<PublicThreadShape> */
    use SdkModel;

    /**
     * The unique ID of the thread.
     */
    #[Api]
    public string $id;

    /**
     * The ID of the associated Contact in the CRM. If the Contact for the thread has not yet been added or created, the `associatedContactId` returned will be a visitorID and cannot be used to search for the Contact in the CRM.
     */
    #[Api('associatedContactId')]
    public string $associatedContactID;

    /**
     * When the thread was created.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * The ID of the conversations inbox containing the thread.
     */
    #[Api('inboxId')]
    public string $inboxID;

    #[Api('originalChannelAccountId')]
    public string $originalChannelAccountID;

    #[Api('originalChannelId')]
    public string $originalChannelID;

    /**
     * Whether the thread is marked as spam.
     */
    #[Api]
    public bool $spam;

    /**
     * The thread's status: `OPEN` or `CLOSED`.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * Whether this thread is archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $assignedTo;

    /**
     * When the thread was closed. Only set if the thread is closed.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $closedAt;

    /**
     * The time that the latest message was sent on the thread.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $latestMessageReceivedTimestamp;

    /**
     * The time that the latest message was sent on the thread.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $latestMessageSentTimestamp;

    /**
     * The time that the latest message was sent or received on the thread.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $latestMessageTimestamp;

    #[Api(optional: true)]
    public ?PublicThreadAssociations $threadAssociations;

    /**
     * `new PublicThread()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicThread::with(
     *   id: ...,
     *   associatedContactID: ...,
     *   createdAt: ...,
     *   inboxID: ...,
     *   originalChannelAccountID: ...,
     *   originalChannelID: ...,
     *   spam: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicThread)
     *   ->withID(...)
     *   ->withAssociatedContactID(...)
     *   ->withCreatedAt(...)
     *   ->withInboxID(...)
     *   ->withOriginalChannelAccountID(...)
     *   ->withOriginalChannelID(...)
     *   ->withSpam(...)
     *   ->withStatus(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        string $associatedContactID,
        \DateTimeInterface $createdAt,
        string $inboxID,
        string $originalChannelAccountID,
        string $originalChannelID,
        bool $spam,
        Status|string $status,
        ?bool $archived = null,
        ?string $assignedTo = null,
        ?\DateTimeInterface $closedAt = null,
        ?\DateTimeInterface $latestMessageReceivedTimestamp = null,
        ?\DateTimeInterface $latestMessageSentTimestamp = null,
        ?\DateTimeInterface $latestMessageTimestamp = null,
        ?PublicThreadAssociations $threadAssociations = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->associatedContactID = $associatedContactID;
        $obj->createdAt = $createdAt;
        $obj->inboxID = $inboxID;
        $obj->originalChannelAccountID = $originalChannelAccountID;
        $obj->originalChannelID = $originalChannelID;
        $obj->spam = $spam;
        $obj['status'] = $status;

        null !== $archived && $obj->archived = $archived;
        null !== $assignedTo && $obj->assignedTo = $assignedTo;
        null !== $closedAt && $obj->closedAt = $closedAt;
        null !== $latestMessageReceivedTimestamp && $obj->latestMessageReceivedTimestamp = $latestMessageReceivedTimestamp;
        null !== $latestMessageSentTimestamp && $obj->latestMessageSentTimestamp = $latestMessageSentTimestamp;
        null !== $latestMessageTimestamp && $obj->latestMessageTimestamp = $latestMessageTimestamp;
        null !== $threadAssociations && $obj->threadAssociations = $threadAssociations;

        return $obj;
    }

    /**
     * The unique ID of the thread.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The ID of the associated Contact in the CRM. If the Contact for the thread has not yet been added or created, the `associatedContactId` returned will be a visitorID and cannot be used to search for the Contact in the CRM.
     */
    public function withAssociatedContactID(string $associatedContactID): self
    {
        $obj = clone $this;
        $obj->associatedContactID = $associatedContactID;

        return $obj;
    }

    /**
     * When the thread was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The ID of the conversations inbox containing the thread.
     */
    public function withInboxID(string $inboxID): self
    {
        $obj = clone $this;
        $obj->inboxID = $inboxID;

        return $obj;
    }

    public function withOriginalChannelAccountID(
        string $originalChannelAccountID
    ): self {
        $obj = clone $this;
        $obj->originalChannelAccountID = $originalChannelAccountID;

        return $obj;
    }

    public function withOriginalChannelID(string $originalChannelID): self
    {
        $obj = clone $this;
        $obj->originalChannelID = $originalChannelID;

        return $obj;
    }

    /**
     * Whether the thread is marked as spam.
     */
    public function withSpam(bool $spam): self
    {
        $obj = clone $this;
        $obj->spam = $spam;

        return $obj;
    }

    /**
     * The thread's status: `OPEN` or `CLOSED`.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Whether this thread is archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withAssignedTo(string $assignedTo): self
    {
        $obj = clone $this;
        $obj->assignedTo = $assignedTo;

        return $obj;
    }

    /**
     * When the thread was closed. Only set if the thread is closed.
     */
    public function withClosedAt(\DateTimeInterface $closedAt): self
    {
        $obj = clone $this;
        $obj->closedAt = $closedAt;

        return $obj;
    }

    /**
     * The time that the latest message was sent on the thread.
     */
    public function withLatestMessageReceivedTimestamp(
        \DateTimeInterface $latestMessageReceivedTimestamp
    ): self {
        $obj = clone $this;
        $obj->latestMessageReceivedTimestamp = $latestMessageReceivedTimestamp;

        return $obj;
    }

    /**
     * The time that the latest message was sent on the thread.
     */
    public function withLatestMessageSentTimestamp(
        \DateTimeInterface $latestMessageSentTimestamp
    ): self {
        $obj = clone $this;
        $obj->latestMessageSentTimestamp = $latestMessageSentTimestamp;

        return $obj;
    }

    /**
     * The time that the latest message was sent or received on the thread.
     */
    public function withLatestMessageTimestamp(
        \DateTimeInterface $latestMessageTimestamp
    ): self {
        $obj = clone $this;
        $obj->latestMessageTimestamp = $latestMessageTimestamp;

        return $obj;
    }

    public function withThreadAssociations(
        PublicThreadAssociations $threadAssociations
    ): self {
        $obj = clone $this;
        $obj->threadAssociations = $threadAssociations;

        return $obj;
    }
}
